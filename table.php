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
	<link rel="shortcut icon" href="img/images.png">	<!-- end: Favicon -->	
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
				<li><a href="#">Tables</a></li>
			</ul>

			
				
				
				<div class="clearfix"></div>
				
				<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white fins"></i><span class="break"></span>All Products</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  	<th>Id</th>
								  <th>products name</th>
								  <th>Date</th>
								  <th>Products Price</th>
								  <th>Discription</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php 
                          global $con;
                          $get_page="select * from home";
                          $run_page=mysqli_query($con, $get_page);
                          while ($row_page=mysqli_fetch_array($run_page)) {
                              # code...
                            $post_id =$row_page['post_id'];
                            $title =$row_page['title'];
                            $image =$row_page['img'];
                            $taka =$row_page['tk'];
                            $disc=$row_page['dis'];

                            
                       ?>
							<tr>
								<td><?php echo $post_id; ?></td>
								<td><?php echo $title; ?></td>
								<td class="center">2018/01/01</td>
								<td class="center"><?php echo $taka; ?></td>
								<td class="center"><?php echo $disc; ?></td>
								<td class="center">
									
							
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							<?php } ;?>
							<?php 
                          global $con;
                          $get_page="select * from homen";
                          $run_page=mysqli_query($con, $get_page);
                          while ($row_page=mysqli_fetch_array($run_page)) {
                              # code...
                            $post_id =$row_page['post_idn'];
                            $title =$row_page['titlen'];
                            $image =$row_page['imgn'];
                            $taka =$row_page['tkn'];
                           

                            
                       ?>
							<tr>
								<td><?php echo $post_id; ?></td>
								<td><?php echo $title; ?></td>
								<td class="center">2018/01/01</td>
								<td class="center"><?php echo $taka; ?></td>
								<td class="center">Blank</td>
								<td class="center">
									
							
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							<?php } ;?>
							<?php 
                          global $con;
                          $get_page="select * from breakfastbeefi";
                          $run_page=mysqli_query($con, $get_page);
                          while ($row_page=mysqli_fetch_array($run_page)) {
                              # code...
                            $post_id =$row_page['post_idbr'];
                            $title =$row_page['titlebr'];
                            
                            $taka =$row_page['tkbr'];
                            $disc=$row_page['disbr'];

                            
                       ?>
							<tr>
								<td><?php echo $post_id; ?></td>
								<td><?php echo $title; ?></td>
								<td class="center">2018/01/01</td>
								<td class="center"><?php echo $taka; ?></td>
								<td class="center"><?php echo $disc; ?></td>
								<td class="center">
									
							
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							<?php } ;?>
							<?php 
                          global $con;
                          $get_page="select * from  breakfasteggi";
                          $run_page=mysqli_query($con, $get_page);
                          while ($row_page=mysqli_fetch_array($run_page)) {
                              # code...
                            $post_id =$row_page['post_idbe'];
                            $title =$row_page['titlebe'];
                            
                            $taka =$row_page['tkbe'];
                            $disc=$row_page['disbe'];

                            
                       ?>
							<tr>
								<td><?php echo $post_id; ?></td>
								<td><?php echo $title; ?></td>
								<td class="center">2018/01/01</td>
								<td class="center"><?php echo $taka; ?></td>
								<td class="center"><?php echo $disc; ?></td>
								<td class="center">
									
							
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							<?php } ;?>

							
						  </tbody>
					  </table>            
					</div>

				</div><!--/span-->
			 <div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>All User info</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  	  <th>ID</th>
								  <th>Name</th>
								  <th>Email</th>
								  <th>Phone Number</th>
								  <th>Present Address</th>
								  <th>Password</th>
								    <th>Delete</th>
							  </tr>
						  </thead>   
						  <tbody>

						  	 <?php 
                          global $con;
                          $get_page="select * from signup";
                          $run_page=mysqli_query($con, $get_page);
                          while ($row_page=mysqli_fetch_array($run_page)) {
                              # code...
                          	$ID =$row_page['id'];
                            $Name =$row_page['name'];
                            $Email=$row_page['email'];
                            $Phone=$row_page['phone'];
                            $Adress=$row_page['adress'];
                            $Psw=$row_page['psw'];

                           
                        
                           

                       ?>
							<tr>
								<td><?php echo $ID; ?></td>
								<td><?php echo $Name; ?></td>
								<td class="center"><?php echo $Email; ?></td>
								<td class="center"><?php echo $Phone; ?></td>
								<td class="center"> <?php echo $Adress; ?></td>
								<td class="center"> <?php echo $Psw; ?></td>
								<td class="center">
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							<?php } ;?> 
							
						  </tbody>
					  </table>            
					</div>
			</div><!--/row-->
								
			</div><!--/row-->
			
       <div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>All Rider info</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  	  <th>name</th>
								  <th>email</th>
								  <th>phone</th>
								  <th>nid</th>
								  <th>Present Address</th>
								  <th>motor </th>
								  <th>license no</th>
								    <th>Delete</th>
							  </tr>
						  </thead>   
						  <tbody>

						  	 <?php 
                          global $con;
                          $get_page="select * from rider";
                          $run_page=mysqli_query($con, $get_page);
                          while ($row_page=mysqli_fetch_array($run_page)) {
                              # code...
                          
                            $Name =$row_page['name'];
                            $Email=$row_page['email'];
                            $Phone=$row_page['phone'];
                            $nid=$row_page['nid'];
                            $Adress=$row_page['add'];
                            $motor=$row_page['motor'];
                            $license=$row_page['licenn'];

                           
                        
                           

                       ?>
							<tr>
								
								<td><?php echo $Name; ?></td>
								<td class="center"><?php echo $Email; ?></td>
								<td class="center"><?php echo $Phone; ?></td>
								<td class="center"> <?php echo $nid; ?></td>
								<td class="center"> <?php echo $Adress; ?></td>
								<td class="center"> <?php echo $motor; ?></td>
								<td class="center"> <?php echo $license; ?></td>
							
								<td class="center">
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							<?php } ;?> 
							
						  </tbody>
					  </table>            
					</div>
			</div><!--/row-->
								
			</div><!--/row-->
			
       

	</div><!--/.fluid-container-->

	</div><!--/.fluid-co
	ntainer-->
	
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
