<!DOCTYPE html>
<html lang="en">
    <?php
    $con=mysqli_connect("localhost","root","","rannaghara");
    session_start();
    $myusername = '';
    if (!empty($_SESSION['admin'])) {
        $myusername =$_SESSION['admin'];
        if ($con) {
            $check_activation = "SELECT active FROM adminlock WHERE username = '$myusername'";
            $result = $con->query($check_activation);

            if ($result->num_rows == 1) {

                while($row = $result->fetch_assoc()) {         
                    $active =$row['active'];
                }
            }
        }
    }

    else{
        header("location: adminlock.php");
    }
    
    if ($myusername == 'admin' && $active == '1') {


?>
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Rannaghara admin</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link rel="stylesheet" type="text/css" href="indexcss.css">
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
		
	<!-- start: Favicon -->
<link rel="shortcut icon" href="img/images.png">
	<!-- end: Favicon -->	
</head>

<body>
		<!-- start: Header -->
	<?php include'menu.php';?>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<?php include'mainmenu.php';?>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Gallery</a></li>
			</ul>

			 
                     <img src="../rannaghara/admin/<?php echo $row_page["img"]; ?>" alt="" width="300" height="370" />
                  
				
				
				<div class="clearfix"></div>
				
								 <div class="box-content">
						<div class="masonry-gallery">
							 <?php 
                          global $con;
                          $get_page="select * from home";
                          $run_page=mysqli_query($con, $get_page);
                          while ($row_page=mysqli_fetch_array($run_page)) {
                              # code...
             
                            $image =$row_page['img'];
                            $title=$row_page['title'];
                            
                       ?>
														<div id="image-1" class="masonry-thumb">
								<a style="background:url(<?php echo $row_page["img"]; ?>)" title="<?php echo $row_page["title"]; ?>" href="<?php echo $row_page["img"]; ?>"><img src="<?php echo $row_page["img"]; ?>" alt="" width="300" height="370" /></a>
							</div>
						 <?php } ;?>
						  <?php 
                          global $con;
                          $get_page="select * from homen";
                          $run_page=mysqli_query($con, $get_page);
                          while ($row_page=mysqli_fetch_array($run_page)) {
                              # code...
             
                            $image =$row_page['imgn'];
                             $title=$row_page['titlen'];
                            
                       ?>
														<div id="image-1" class="masonry-thumb">
								<a style="background:url(<?php echo $row_page["imgn"]; ?>)" title="<?php echo $row_page["titlen"]; ?>" href="<?php echo $row_page["imgn"]; ?>"><img src="<?php echo $row_page["imgn"]; ?>" alt="" width="300" height="370" /></a>
							</div>
						 <?php } ;?>	
						  <?php 
                          global $con;
                          $get_page="select * from shophome";
                          $run_page=mysqli_query($con, $get_page);
                          while ($row_page=mysqli_fetch_array($run_page)) {
                              # code...
             
                            $image =$row_page['imgshop'];
                             $title=$row_page['titleshop'];
                            
                       ?>
														<div id="image-1" class="masonry-thumb">
								<a style="background:url(<?php echo $row_page["imgshop"]; ?>)" title="<?php echo $row_page["titleshop"]; ?>" href="<?php echo $row_page["imgshop"]; ?>"><img src="<?php echo $row_page["imgshop"]; ?>" alt="" width="300" height="370" /></a>
							</div>
						 <?php } ;?>				
			</div><!--/row-->
			
       

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	
	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
<?php }

 ?>
</html>
