<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bách Khoa Shop</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<span id="page" style="display:none">1</span>
	<?php
	
		include_once("model/db.php");
		include_once("libs/function.php");	
		
		$limit=3;
		
		$sanpham= mysqli_query($db,"SELECT id FROM sanpham");
		$num = mysqli_num_rows($sanpham);
		$max= ceil($num/$limit);
	
	?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://kupball.com">Hulopama</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

   <?php include ("modules/content.php")?>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
   	<script type="text/javascript">
		
    </script>
    <script type="text/javascript" >
	 $(document).ready(function() {	
	 		 var page= document.getElementById("page");
	 	 	if(page.innerHTML === '<?php echo $max ?>'){
							$("#next_page").hide("fast");
						}
			else 	$("#next_page").show("fast");		
			 if(page.innerHTML ==="1"){
							$("#prev_page").hide("fast");
					}
			else 	$("#prev_page").show("fast");	
			 
			$('#next_page').on('click', function(){ 
			  				
			   post_data = {'page':page.innerHTML, 'action': 'next'};
				
				//send our data to "vote_process.php" using jQuery $.post()
				$.post('controller/pagination.php', post_data, function(data){
						$("#content").html(data);
						page.innerHTML = (parseInt(page.innerHTML)+1); 
						if(page.innerHTML === '<?php echo $max ?>'){
							$("#next_page").hide("fast");
						}
						else 	$("#next_page").show("fast");		
						 if(page.innerHTML ==="1"){
										$("#prev_page").hide("fast");
								}
						else 	$("#prev_page").show("fast");
					})
					.fail(function(jqXHR, textStatus, errorThrown) 
					{
						alert(textStatus);
					});
			});
			$('#prev_page').on('click', function(){ 
			   var page= document.getElementById("page");	
			   
			   post_data = {'page':page.innerHTML, 'action': 'prev'};
				
				//send our data to "vote_process.php" using jQuery $.post()
				$.post('controller/pagination.php', post_data, function(data){
					$("#content").html(data);
					page.innerHTML = (page.innerHTML-1);
					if(page.innerHTML === '<?php echo $max ?>'){
						$("#next_page").hide("fast");
					}
					else 	$("#next_page").show("fast");		
					 if(page.innerHTML ==="1"){
						$("#prev_page").hide("fast");
					}
					else 	$("#prev_page").show("fast");
					})
					.fail(function(jqXHR, textStatus, errorThrown) 
					{
						alert(textStatus);
					});
			});
		   }); 
	</script>
    <script type="text/javascript">
		$(document).ready(function()
	{
		 $(document).on('submit', '#ajaxForm', function()
		 {
		  
		  //var fn = $("#fname").val();
		  //var ln = $("#lname").val();
		 
		  //var data = 'fname='+fn+'&lname='+ln;
		
		  var data = $("#ajaxForm").serialize();
		  
		  
		  $.ajax({
		  
		  type : 'POST',
		  url  : 'controller/themsanpham.php',
		  data : data,
		  success :  function()
			   {
					alert("Đăng tin thành công");
			  
			   }
		  });
		  return false;
		 });
	 
	});
</script>
    <script>
		$("#myContact").click(function(){
       		 $("#myContactModal").modal("toggle");
   		 });
		$("#search-sp").on("click",function(){
			var name = $("#name").val(); 
			var danhmuc = $("#danhmuc").val();
			var khuvuc = $("#khuvuc").val();
			if(name=="" && danhmuc=="" && khuvuc==""){
				$("#reset").hide("fast");
				window.location.reload();
				
			}
			else{
				 post_data = {'name':name, 'danhmuc': danhmuc, 'khuvuc': khuvuc };
				 
				 $.post('controller/search.php', post_data, function(data){
						$("#content").html(data);
						$("#reset").show("slow");
						$("#next_page").hide("fast");
						$("#prev_page").hide("fast");
						
				 })
				.fail(function(jqXHR, textStatus, errorThrown) 
				{
					alert(textStatus);
					
				});	
			}
		});
		
		$("#reset").on("click", function(){
			$("#reset").hide("fast");
			window.location.reload();
			
		})
    </script>
    <script>
		$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
		});
	</script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
