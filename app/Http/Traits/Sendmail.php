<?php
namespace App\Http\Traits;
use App\Models\NotificationMaster;
use Mail,DB;
use Auth;
use Exception;
trait Sendmail{

	    public static function getNotificationContent($notifiid, $notificationvar) 
		{
			$user_id=isset(Auth::user()->id)?Auth::user()->id:2;
			$getNotificationContent = Sendmail::getEmailTemp($notifiid,$user_id);

			$subjectEnroll =$bodycontent = '';
			$rsendstatus = 'no';
			
			if($getNotificationContent){
				  if($getNotificationContent->Factive==1) {
					    if(isset($notificationvar['toemailid'])){
							$notificationname=$getNotificationContent->Unotification_name!=''?$getNotificationContent->Unotification_name:$getNotificationContent->Fnotification_name;
							
							$subject = '';
							if($notifiid == 12){
								$subject = $notificationvar['username'].' - '.date('d M Y').' - ';
							}
							$subject .=$getNotificationContent->Usubject!=''?$getNotificationContent->Usubject:$getNotificationContent->Fsubject;

							$bodycontent=$getNotificationContent->Ucontent!=''?$getNotificationContent->Ucontent:$getNotificationContent->Fcontent;
							$messagetext=$notificationvar['messagetext']??'';
							if($messagetext){
								$bodycontent=$messagetext;
							}

							$username=$notificationvar['username'];
							$content = Sendmail::getNotificationContentEmail($notificationvar, $bodycontent, $username);

							// dd($content);
							$userDetail 		= Sendmail::getFromEmailId($user_id);
							
							$toemailid	= $notificationvar['toemailid'];
							
							$rsendstatus =  Sendmail::sendmailToAll($userDetail->email??'',$userDetail->first_name??'', $subject, $content, $toemailid, $username,$user_id,$notifiid);
							
						}
				  }
			}
		
		   return $rsendstatus;	
		}
		
		
		public static function getEmailTemp($notifiid,$user_id)
		{
			
			$getNotificationContent=NotificationMaster::leftjoin('notification_user_content',function($join) use ($user_id){
			           $join->on('notification_user_content.notification_id','=','notification_master.notification_id')   
					        ->where('notification_user_content.user_id','=',$user_id);
		           })
				   ->where('notification_master.notification_id','=',$notifiid)->select('notification_master.notification_name as Fnotification_name','notification_master.subject as Fsubject','notification_master.notification_content as Fcontent','notification_user_content.notification_name as Unotification_name','notification_user_content.subject as Usubject','notification_user_content.notification_content as Ucontent','notification_master.notification_id','notification_user_content.is_active as Uactive','notification_master.is_active as Factive')->first();

			return $getNotificationContent;
		}
		
		
		
		
		
		public static function getNotificationContentEmail($notificationvar, $bodycontent, $username)
			{
				//dd($notificationvar);
				if(substr($notificationvar['unit_name'],-3, 1)==0) {
	                $villa_type = "A";
	            } elseif(substr($notificationvar['unit_name'],-3, 1)==1){
	                $villa_type = "B";
	            }elseif(substr($notificationvar['unit_name'],-3, 1)==2){
	                $villa_type = "C";
	            }
	            
				$bodycontent=stripslashes($bodycontent);
				
				$content = str_replace("%#USER NAME#%",$username,$bodycontent);
				
				$content = str_replace("{unsubscribelink}",$notificationvar['unsubscribelink'],$content);
				$content = str_replace("%#TASK CODE#%",$notificationvar['task_code'],$content);
				$content = str_replace("%#OLD ASSIGNEE NAME#%",$notificationvar['oldassigneename'],$content);
				$content = str_replace("%#NEW ASSIGNEE NAME#%",$notificationvar['newassigneename'],$content);

				$content = str_replace("%#TASK ASSIGNEE NAME#%",$notificationvar['taskassignee'],$content);
				$content = str_replace("%#TITLE NAME#%",$notificationvar['titlename'],$content);
				  
				$content = str_replace("%#DATE#%",$notificationvar['date'],$content);
				$content = str_replace("%#START TIME#%",$notificationvar['start_time'],$content);
				$content = str_replace("%# END TIME#%",$notificationvar['end_time'],$content);
				$content = str_replace("%#LOCATION NAME#%",$notificationvar['location'],$content);
				
				$content = str_replace("%#STATUS NAME#%",$notificationvar['status_name'],$content);
				$content = str_replace("%#PROJECT NAME#%",$notificationvar['project_name'],$content);
				$content = str_replace("%#BLOCK NAME#%",$notificationvar['block_name'],$content);
				$content = str_replace("%#UNIT NAME#%",$notificationvar['unit_name'],$content);
				$content = str_replace("%#UNIT VAL#%",substr($notificationvar['unit_name'],-2),$content);
				$content = str_replace("%#FLOOR NAME#%",$notificationvar['floor_name'],$content);
				$content = str_replace("%#VILLA TYPE#%",$villa_type,$content);
				$content = str_replace("%#BOOKING AMOUNT#%",$notificationvar['booking_amount'],$content);
				
				$content = str_replace("{link}",$notificationvar['link'],$content);
				$content = str_replace("{{message_activity}}",$notificationvar['message_activity'],$content);
		
				return $content;
	
			}
	
		public static function getFromEmailId($user_id){
			$userDetail=DB::table('users')->join('user_details','user_details.user_id','=','users.id')->where('users.id','=',$user_id)->select('users.email','user_details.first_name')->first();
			return $userDetail;
		}
	
		public static function sendmailToAll($from,$fromname, $subject,$content,$toemailid,$emailname='',$user_id,$notifiid) 
		{ 
		   	 //$toemailid='siddharth.kushwah@innverse.com';
		try{
			
			$cc=array(); 
			if($notifiid==12){
				$valueConfig=DB::table('tbl_config')->where('config_key','=','admin_email')->first()->value;
				if($valueConfig != "")
				{
					$cc=explode(",",$valueConfig);
				}
				else
				{
					$valueConfig=DB::table('tbl_config')->where('config_key','=','company_email')->first();
					$cc=array($valueConfig->value);
					// $cc=array("testjob@mailinator.com");
				}
			}
			
			
			if(empty($from) && empty($fromname)){
				$from=DB::table('tbl_config')->where('config_key','=','from_email')->first()->value;
			    $fromname=DB::table('tbl_config')->where('config_key','=','from_name')->first()->value;
			}
			//echo "$toemailid, $emailname,$subject,$from, $fromname,$content"; exit;
		 	$mail=Mail::send([], [], function ($message) use($toemailid, $emailname,$subject,$from, $fromname,$content,$cc){
				 
				    $message->from($from, $fromname);
				    $message->to($toemailid, $emailname);
					$message->subject($subject);
					if(count($cc)>0){
					$message->cc($cc);
					}  
					$message->setBody($content, 'text/html'); // for HTML rich messages
				});	
			
				if($mail){
					if(count($cc) > 0){
						foreach ($cc as $temp) {
							$emailData = array();
							$emailData['send_to']   = $temp;
							$emailData['send_by']   = $from;
							$emailData['sender_id'] = isset(Auth::user()->id)?Auth::user()->id:2;
							$emailData['subject']   = $subject;
							$emailData['body']      =  $content;
							$emailData['send_date'] = date('Y-m-d');	
							DB::table('send_mail')->insert($emailData);
						}
					}

					$emailData=array();
					$emailData['send_to']   = $toemailid;
					$emailData['send_by']   = $from;
					$emailData['sender_id'] = isset(Auth::user()->id)?Auth::user()->id:2;
					$emailData['subject']   = $subject;
					$emailData['body']      =  $content;
					$emailData['send_date'] = date('Y-m-d');	
					
					 DB::table('send_mail')->insert($emailData);
					return 'yes';
				}
					
				
				
		 }catch(Exception $e){
			return $e->getMessage();
		}	 
	}
	
}