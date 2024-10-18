var app = angular.module('myApp', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

app.service('fileUpload', ['$http', function ($http) {
    this.uploadFileToUrl = function(file, uploadUrl){
        var fd = new FormData();
        fd.append('file', file);
        $http.post(uploadUrl, fd, {
		
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).then(function(success) {
			
		return success;
        })
    }
}]); 
 
app.controller('myCntrl',function($scope,$http,fileUpload,$window){
	$scope.documentList=[];
	$scope.fileid={};
	
	
	var int1=0;
	 $scope.addItem=function(){
		  int1= int1+1;
		$scope.documentList.push({id:int1});
		
		console.log($scope.fileid);
		
	}	

	
	
	
	 
	var i=0;
	
	$scope.filesData=[];	 
	$scope.filesData1=[];	 
		 
	$scope.fileData=[];
	$scope.fileData1=[];
	
	
   
    $scope.uploads=[];
    $scope.uploads1=[];
    
	
    $scope.brochurePath=[];
    $scope.brochurePath1=[];
    
   $scope.imageId=[];
   $scope.galaryId=[];
    
	
	var init=function()
	{
		$http({
			method:"GET",
			url: "/administrator/plans",
		}).success(function(response){
			//alert(JSON.stringify(response));
			$scope.projectPlans=response;
		})
	}
	
	
	$scope.setFile = function(element,$project_id)
	{   
	    for(var i=0;i< element.files.length; i++)
		{
        
		$scope.fileToUpload = element.files[i];
		$scope.fileToUpload['project_id']=$project_id;
		$scope.name=$scope.fileToUpload.name;
		$scope.size=$scope.fileToUpload.size/1000;
		$scope.types=$scope.fileToUpload.type;
		var file=$scope.fileToUpload;
		$scope.brochurePath.push($scope.fileToUpload);
		$scope.fileData.push($scope.fileToUpload);
		$scope.filesData.push({ name:$scope.name, size: $scope.size+"kb", types: $scope.types });
		var uploadUrl = "/administrator/uploadfile";
		  //fileUpload.uploadFileToUrl(file, uploadUrl);
		  
		  
		  
		  
        var fd = new FormData();
        fd.append('file', file);
        $http.post(uploadUrl, fd, {
		
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).then(function(success) {
		    $scope.imageId.push(success.data);
			 console.log($scope.imageId); 
			$scope.imageIdlist=JSON.stringify($scope.imageId); 
			 
        })
		  
		} 
		  
		
		
		
	}
	
	
	
	$scope.init = function(a)
	{ 
	 var fd = new FormData();
        fd.append('file',a);
        $http.post('/administrator/getfile', fd, {
		
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).then(function(success) {
		    
			 $scope.imagevideo =success.data; 
			
			 
        })
	}
	$scope.deleteimage = function(id,index,type_id)
	{ 
	
	  var fd = new FormData();
        fd.append('id',id);
        $http.post('/administrator/deleteimagefile', fd, {
		
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).then(function(success) {
		    
			if(type_id==0)
			{
			$scope.imagevideo.imagelist.splice(index,1);
	        }else
			{
			 $scope.imagevideo.videolist.splice(index,1);
			}
	      
			 
        })
	
	
	
	
	}
	
	$scope.setFile1 = function(element,$project_id)
	{ 
		 for(var i=0;i< element.files.length; i++)
			{

					$scope.fileToUpload1 = element.files[i];
					$scope.fileToUpload1['project_id']=$project_id;
					$scope.name=$scope.fileToUpload1.name;
					$scope.size=$scope.fileToUpload1.size/1000;
					$scope.types=$scope.fileToUpload1.type;
					var file1=$scope.fileToUpload1;
					$scope.brochurePath1.push($scope.fileToUpload1);
					$scope.fileData1.push($scope.fileToUpload1);
					$scope.filesData1.push({ name:$scope.name, size: $scope.size+"kb", types: $scope.types });
					var uploadUrl = "/administrator/uploadfile";
					//fileUpload.uploadFileToUrl(file, uploadUrl);
					
					
					
					
					
					 var fd = new FormData();
						fd.append('file', file1);
						$http.post(uploadUrl, fd, {
						
							transformRequest: angular.identity,
							headers: {'Content-Type': undefined}
						}).then(function(success) {
							$scope.galaryId.push(success.data);
							 console.log($scope.galaryId); 
							$scope.galaryIdlist=JSON.stringify($scope.galaryId); 
							 
						})
	
			}			
					
			
		  
	}
	
$scope.deleteFile=function(index)
{
	
	 var deleteUser = confirm('Are you absolutely sure you want to delete?');
    if (deleteUser) {
	$scope.filesData.splice(index,1);
	$scope.brochurePath.splice(index,1);
	$scope.imageId.splice(index,1);
	$scope.imageIdlist=JSON.stringify($scope.imageId); 
    } 
}
$scope.deleteFile1=function(index)
{
	
	 var deleteUser1 = confirm('Are you absolutely sure you want to delete?');
		   if (deleteUser1) {
	$scope.filesData1.splice(index,1);
	$scope.brochurePath1.splice(index,1);
	$scope.galaryId.splice(index,1);
	$scope.galaryIdlist=JSON.stringify($scope.galaryId); 
	
	
} 
}




$scope.deleteUploadFile=function(index,$project_id,$customer_id)
{
	 var deleteUser = confirm('Are you absolutely sure you want to delete?');
		   if (deleteUser) {
	var url="/administrator/deleteuploadfile/"+$project_id+"/"+$customer_id;
	$http({
		method: "POST",
		url: url,
		data: $.param($scope.uploads[index]),
		headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	});
	$scope.uploads.splice(index,1);
}
}


$scope.deleteUploadFile1=function(index,$project_id,$customer_id)
{
	 var deleteUser1 = confirm('Are you absolutely sure you want to delete?');
		   if (deleteUser1) {
	var url="/administrator/deleteuploadfile/"+$project_id+"/"+$customer_id;
	$http({
		method: "POST",
		url: url,
		data: $.param($scope.uploads1[index]),
		headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	});
	$scope.uploads1.splice(index,1);
}
}

//$scope.init();


$scope.removecurrent=function(index)
{
      if(confirm("Are You Sure To Delete ?."))
	  {
		$scope.documentList.splice(index,1);
		  
	 } 
      
}

$scope.deleteelement=function(id)
{
      if(confirm("Are You Sure To Delete ?."))
	  {

		var uploadUrl="/administrator/deleteprojectdoc";
		  var fd = new FormData();
        fd.append('id', id);
        $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).then(function(success) {
		    $('#'+id).remove();
			 
        })
		  
	 } 
      
}

});
