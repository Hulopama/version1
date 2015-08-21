 <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Bách Khoa Shop</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">Bách Khoa Cơ sở 1</a>
                    <a href="#" class="list-group-item">Bách khoa Cơ sở 2</a>                   
                </div>
                <a class="btn btn-lg btn-warning" href="?ctr=dang-tin">Đăng tin rao vặt</a>
            </div>

            <div class="col-md-9">
				
                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="image/banner/843x403-banner-fb-02.jpg" alt="Bách khoa shop">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="image/banner/bkc1.jpg" alt="Bách khoa shop">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="image/banner/business_hands.jpg" alt="Bách khoa shop">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="">
                	<?php include("modules/search-form.php")?>
                </div>

                <div class="row" id="content">
                
	<?php 
		
	$sanpham= mysqli_query($db,"SELECT id, name, hinh1,time, giaca, danhmuc,khuvuc, phone FROM sanpham ORDER by time DESC LIMIT 0,". $limit);
		while($row=mysqli_fetch_array($sanpham))	{			
	?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo $row["hinh1"] ?>" alt="<?php echo $row["name"] ?> 
                            		tại Bách khoa shop" style="width:100%; height:200px">
                             <h4 class="giaca"><?php echo $row["giaca"] ?> VNĐ</h4>
                            <div class="caption">
                               
                                <h4><strong><a href="#"><?php echo $row["name"] ?></a></strong>
                                </h4>
                                <p style="font-family: 'Lobster', cursive;"  >
                                	<span class="glyphicon glyphicon-list-alt"></span> 
										<a href="#" data-toggle="tooltip" title="Danh mục"><?php echo $row["danhmuc"] ?></a>
                                </p>
                                <p>
                                	<span class="glyphicon glyphicon-map-marker"></span> <em>Khu vực: </em>
										<strong data-toggle="tooltip" title="Khu vực giao hàng"><?php echo $row["khuvuc"] ?></strong>
                                </p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><?php echo times_ago(($row["time"])) ?></p>
                                <p>
                                   <a class="btn btn-danger" href="?ctr=chi-tiet-tin&id=<?php echo $row["id"] ?> ">Xem chi tiết</a>
                                </p>
                            </div>
                        </div>
                    </div>

      <?php
		}
	  ?>       </div><!-- row -->
          	<nav style="margin-top:-10px;">
              <ul class="pager">
             
                <li class="previous"><a href="#" id="prev_page" onClick="return false"><span aria-hidden="true">&larr;</span> Xem cũ hơn</a></li>
               
               
                <li class="next"><a href="#" onClick="return false" id="next_page">Xem mới hơn <span aria-hidden="true">&rarr;</span></a></li>
               
              </ul>
            </nav>

            </div><!-- col-md-9 -->

        </div><!-- row -->

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->