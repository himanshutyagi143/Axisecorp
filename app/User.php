<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
/*use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;*/
use Auth;
use DB;
class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    //use Billable;

    protected $dates = ['trial_ends_at', 'subscription_ends_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password', 'phone', 'role','is_active','created_by','company_id','user_type_id', 'company_type_id','confirmed'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
	
	/**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['company_type_id','parent_id','project_id','user_name','user_company_id'];
	
	/**
     * Get the company_type_id for the user.
     *
     * @return int
     */
   
	
	/**
     * Get the parent_id for the user.
     *
     * @return int
     */
    public function getparentIdAttribute()
    {
		$company_data=DB::table('assign_project')->where('user_id','=',Auth::user()->id)->select('parent_id')->first();
		return !empty($company_data->parent_id)?$company_data->parent_id:0;
    }
	
	/**
     * Get the company_id for the user.
     *
     * @return int
     */
   
	
	/**
     * Get the project_id for the user.
     *
     * @return int
     */
    public function getprojectIdAttribute()
    {
		$company_data=DB::table('vendor_project')->where('user_id','=',Auth::user()->id)->select('project_id')->first();
		return !empty($company_data->project_id)?$company_data->project_id:0;
    }
	
	/**
     * Get the first_name for the user.
     *
     * @return string
     */
	
	 public function getfirstNameAttribute()
    {
		$first_name=DB::table('user_details')->where('user_id','=',Auth::user()->id)->select('first_name')->first();
		return !empty($first_name->first_name)?$first_name->first_name:'';
    }
	/**
     * Get the last_name for the user.
     *
     * @return string
     */
	
	 public function getlastNameAttribute()
    {
		$last_name=DB::table('user_details')->where('user_id','=',Auth::user()->id)->select('last_name')->first();
		return !empty($last_name->last_name)?$last_name->last_name:'';
    }
	
	/**
     * Get the image for the user.
     *
     * @return string
     */
	
	
	 public function getimageAttribute()
    {
		$user_image=DB::table('user_details')->where('user_id','=',Auth::user()->id)->select('user_image')->first();
		return !empty($user_image->user_image)?$user_image->user_image:'';
    }
	
	
	/**
     * Get the user_name for the user.
     *
     * @return string
     */
	
	 public function getuserNameAttribute()
    {
		$first_name=DB::table('user_details')->where('user_id','=',Auth::user()->id)->select('first_name','last_name')->first();
		return ((!empty($first_name->first_name)?$first_name->first_name:'')." ".(!empty($first_name->last_name)?$first_name->last_name:''));
    }
	
	
	
}
