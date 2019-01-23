<!DOCTYPE html>
<html lang="en">

<?php include("function/function.php");

	session_start();
	$myusername = '';
	if (!empty($_SESSION['admin'])) {
		$myusername =$_SESSION['admin'];
		$con=mysqli_connect("localhost","root","","rannaghara");
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

	if ($myusername == 'admin' && $active == 1) {
		
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
				<li><a href="#">Dashboard</a></li>
			</ul>

			<div class="row-fluid">
				
				<div class="span6 statbox-sp purple" onTablet="span12" onDesktop="span6">
					<div class="boxchart">15,6,7,42,0,34,2,34,8,32,3,33,2</div>
					<div class="number">
						<a href="http://www.reliablecounter.com" target="_blank"><img src="https://www.reliablecounter.com/count.php?page=localhost/rannaghara/index.php&digit=style/plain/16/&reloads=0" alt="web page hit counter" title="web page hit counter" border="0"></a><br /><a href="http://" target="_blank" style="font-family: Geneva, Arial; font-size: 9px; color: #330010; text-decoration: none;"></a>

						<i class="icon-arrow-up"></i></div>
					<div class="title">visits</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>	
				</div>
				<div class="span6 statbox-sp green" onTablet="span12" onDesktop="span6">
					<div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>
					<div class="number">123<i class="icon-arrow-up"></i></div>
					<div class="title">sales</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>
				</div>
						

			<div class="row-fluid">
				
				<div class="span12 widget blue" onTablet="span12" onDesktop="span12">
					
					<div id="stats-chart2"  style="height:400px" ></div>
					
				</div>		
			</div>
			<div class="row-fluid">	

				<a href="table.php" class="quick-button metro yellow span2">
					<i class="icon-group"></i>
					<p>Users</p>
					<span class="badge"></span>

				</a>
				
				<a href="order.php"  class="quick-button metro blue span2">
					<i class="icon-shopping-cart"></i>
					<p>Orders</p>
					<span class="badge"></span>
				</a>
				<a href="table.php"  class="quick-button metro green span2">
					<i class="icon-barcode"></i>
					<p>Products</p>
				</a>
				
				
				<div class="clearfix"></div>
								
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

/*	else{
		session_destroy();
		if ($con) {
           $active_sql = "UPDATE adminlock SET active='0' WHERE username='$myusername'";
           if ($con->query($active_sql) === TRUE) {
            echo "Record updated successfully";
            header("location: adminlock.php");
           } else {
            echo "Error updating record: " . $conn->error;
          }
		
		}
	}*/
 ?>
</html>