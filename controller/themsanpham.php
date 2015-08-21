<?php
	include("../libs/DB_Business.php");
	include("../libs/function.php");
	if(isset($_POST)){
		$name_nd=$_POST["name_nd"];///
		$email=$_POST["email"];///
		$phone=$_POST["phone"];///
		
		$khuvuc = $_POST["khuvuc"];///
		$giaca=$_POST["giaca"];///
		$mota = $_POST["mota"];///
		$name=$_POST["name"];///	
		$danhmuc=$_POST["danhmuc"];///	
		$id=date("Ymdhis");///
		$time=time();///
		
		$path="../image/upload/$id";
		mkdir( $path );
		
		function upload_image_2($hinh, $path){
			if(isset($_FILES[$hinh]['name']))
		 	{
		  		if($_FILES[$hinh]['error']==0)
		 		{			
				
					move_uploaded_file($_FILES[$hinh]['tmp_name'],$path.'/'.$_FILES[$hinh]['name']);
					$path1=substr($path,3);
					 return ($path1."/".$_FILES[$hinh]['name']);
				
				}
		 	}
		}
		$hinh1=upload_image_2('hinh1', $path);///
		$hinh2=upload_image_2('hinh2',$path);///
		$hinh3=upload_image_2('hinh3',$path);///
		$hinh4=upload_image_2('hinh4',$path);///
		 
		 class sanpham extends DB_Business{
			function __construct()
			{
				// Khai báo tên bảng
				$this->_table_name = 'sanpham';			 
				// Khai báo tên field id
				$this->_key = 'id';			 
				// Gọi hàm khởi tạo cha
				parent::__construct();
			}	
		}		
		
		$sanpham= new sanpham();	
		$sanpham->add_new(array('name'=>$name, 'phone'=>$phone,'id'=>$id,
		'hinh1'=>$hinh1, 'hinh2'=>$hinh2, 'hinh3'=>$hinh3, 'hinh4'=>$hinh4,
 		 'detail'=>$mota, 'khuvuc'=>$khuvuc, 'time'=>$time , 'giaca'=>$giaca, 
		 'email'=>$email,'ten_nd'=>$name_nd, 'danhmuc'=>$danhmuc));	
		
	}
	
	

	
?>