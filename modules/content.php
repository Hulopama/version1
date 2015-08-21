<?php
	$ctr = isset($_GET["ctr"])? $_GET["ctr"] : "";
	if($ctr=="chi-tiet-tin")
		include("view/chi-tiet-tin.php");
	else if($ctr=="dang-tin")
		include("view/trang-dang-tin.html");
	
	else 
		include("view/home.php");
		
?>