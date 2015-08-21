<script src="js/jquery.min.js"></script>
<?php
	include_once("libs/function.php");
	include_once("model/db.php");
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$chitietsanpham= mysqli_query($db,"SELECT * FROM sanpham WHERE id='$id' ");
	
	$slider=array();
	$row=mysqli_fetch_array($chitietsanpham);
	if($row["hinh1"]!="") $slider[]=$row["hinh1"];
	if($row["hinh2"]!="") $slider[]=$row["hinh2"];
	if($row["hinh3"]!="") $slider[]=$row["hinh3"];
	if($row["hinh4"]!="") $slider[]=$row["hinh4"];	

?>
<style>
	body{
		background:#f1f1f1;
	}
</style>
<div class="container">
<section class="wrapper">
	<div class="panel panel-default">
      <div class="content-panel">
    
	  <div class="row" style="padding:10px 20px;">
    	<div class="col-md-6 col-xs-12">
            <h3 class="page-header" style="padding:  5px 20px;margin-top:-10px"><a href="http://bachkhoa.esy.es/">BachKhoaBanHang </a>> Chi tiết tin</h3>
             <div class="panel panel-default">
                <div class="content-panel" style="padding: 15px; box-shadow:2px 2px 3px #9f9f9f">
					<div id="myCarousel" class="carousel slide" data -ride="carousel">
					  <!-- Indicators -->
					  <ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<?php for ($i=1; $i < sizeof($slider); $i++ ) { ?>
						<li data-target="#myCarousel" data-slide-to="<?php echo $i ?>"></li>
					  
						<?php } ?>
					  </ol>
					
					  <!-- Wrapper for slides -->
					  <div class="carousel-inner" role="listbox">
						<div class="item active">
						  <img src="<?php echo $slider[0] ?>" alt="kupball" class="slider-images" style="height:420px;">
						</div>
						<?php for ($i=1; $i < sizeof($slider); $i++ ){ ?>
						<div class="item">
						  <img src="<?php echo $slider[$i] ?>" alt="kupball" class="slider-images" style="height:420px;" >
						</div>
					
						<?php } ?>
					  </div>
					
					  <!-- Left and right controls -->
					  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					  </a>
					</div>
					
				</div>	
			</div>          
        </div>
          
        <div class="col-md-6 col-xs-12">        	
              
                    		<h2 style="background:#9D00A8; padding: 5px 10px; color: #fff;margin-bottom:30px;"><?php echo $row["name"] ?></h2>
                        	<p style="font-size:18px">
                            	<span>Giá bán: </span><strong style="color:red"><?php echo $row["giaca"] ?> đồng</strong>
                            </p>
                            <div class="detail" style=" font-family: 'Lobster', cursive; ">
                                <p><?php echo $row["detail"] ?></p>
                            </div>  
                            <table  class="table">
                           		 <tr>
                                    <th scope="row"><span class="glyphicon glyphicon-barcode"></span> Mã tin: </th>
                                    <td><?php echo substr(md5($id),0,6) ?></td>                                    
                                  </tr>
                                  <tr>
                                    <th width="40%" scope="row"><span class="glyphicon glyphicon-th-list "></span> Danh mục:</th>
                                    <td width="60%"><?php echo $row["danhmuc"] ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row"> <span class="glyphicon glyphicon-user"></span> Người đăng: </th>
                                    <td><?php echo $row["ten_nd"] ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row"><span class="glyphicon glyphicon-map-marker"></span> Địa điểm giao dịch:</th>
                                    <td><?php echo ($row["khuvuc"]) ?></td>
                                    
                                  </tr>
                                   <tr>
                                    <th scope="row"><span class="glyphicon glyphicon-time"></span> Thời gian đăng: </th>
                                    <td style="color:#c3c3c3"><?php echo times_ago(($row["time"])) ?></td>
                                    
                                 
                                  </tr>
                                   
                                </table>
							<div style="height:150px;  text-align:center; " class="contact">
                            	<img src="image/icon/contacticon.png"  class="img-rounded"  height="90%" />
                                <button class="btn btn-primary" id="myContact"> Liên lạc với <?php echo $row["ten_nd"] ?></button>
                            </div>
                            
                            <div class="modal fade" id="myContactModal">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Thông tin liên lạc</h4>
                                  </div>
                                  <div class="modal-body" style="font-size:18px; text-align:center">
                                    <p><span class="glyphicon glyphicon-phone"></span> Số điện thoại:
                                    	 <strong><?php echo $row["phone"] ?></strong></p>
                                     <p>
                                     	<span class="glyphicon glyphicon-envelope"></span> Địa chỉ email:
                                    	 <strong><?php echo $row["email"] ?></strong></p>
                                         </p>
                                         
                                     
  
                                  </div>
                                  <div class="modal-footer">                                 
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    
                                  </div>
                                </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            
                                                  
             
            </div>        
        </div>
    
      </div>
	
   </div> 
</section>
</div>