<?php
	include("../model/db.php");	
	include_once("../libs/function.php");	
	
	if(isset($_POST) )
	{			
		
		$filter  = array(
				'name'     => isset($_POST['name']) ? $_POST['name'] : false,
				'danhmuc'   => isset($_POST['danhmuc']) ? $_POST['danhmuc'] : false,
				'khuvuc'    => isset($_POST['khuvuc']) ? $_POST['khuvuc'] : false							
				);
			$where = array();

		// Nếu có chọn lọc thì thêm điều kiện vào mảng
			if ($filter['name']){
				$where[] = " name LIKE (N'%".$filter['name']."%') ";
			}						 
			if ($filter['danhmuc']){
				$where[] = " danhmuc LIKE (N'%".$filter['danhmuc']."%') ";
			}						 
			if ($filter['khuvuc']){
				$where[] = " khuvuc LIKE (N'%".$filter['khuvuc'] ."%')";
			}						 
		
			$sql1= 'SELECT id, name, hinh1, time, giaca, danhmuc, khuvuc, phone FROM sanpham';
			if ($where){
				$sql1 .= ' WHERE '.implode(' AND ', $where);
			};
			
			$sanpham=  mysqli_query($db,$sql1); 	
		
		while($row= mysqli_fetch_array($sanpham)){
			
			$result="
	
		<div class='col-sm-4 col-lg-4 col-md-4'>
		<div class='thumbnail'>
			<img src='".$row['hinh1']."' alt='".$row['name'] ."'  
					tại Bách khoa shop' style='width:100%; height:200px'>
			 <h4 class='giaca'>".$row["giaca"]."  VNĐ</h4>
			<div class='caption'>
			   
				<h4><strong><a href='#'>".$row["name"] ."</a></strong>
				</h4>
				<p style='font-family: 'Lobster', cursive;'  >
					<span class='glyphicon glyphicon-list-alt'></span> 
						<a href='#' data-toggle='tooltip' title='Danh mục'>".$row["danhmuc"]." </a>
				</p>
				<p>
					<span class='glyphicon glyphicon-map-marker'></span> <em>Khu vực: </em>
						<strong data-toggle='tooltip' title='Khu vực giao hàng'>".$row["khuvuc"] ."</strong>
				</p>
			</div>
			<div class='ratings'>
				<p class='pull-right'>".times_ago(($row["time"])) ."</p>
				<p>
				   <a class='btn btn-danger' href='?ctr=chi-tiet-tin&id=".$row["id"]."  '>Xem chi tiết</a>
				</p>
			</div>
		</div>
	</div>

			";
			echo $result;
		}
	}
?>