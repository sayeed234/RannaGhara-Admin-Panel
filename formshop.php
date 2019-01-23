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
			<?php include'mainmenu.php';?>>
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
				<li><a href="#">Add Products</a></li>
			</ul>

			
				            <br>
				            <h1>Post_id --Intiger type--</h1>
				            <br>
				
				<div class="clearfix"></div>
								<h1>Shop Home page add form</h1>
                            <form name="form30"action="" method="post" enctype="multipart/form-data"> 
                            	<table>

                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titleshop"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="disshop"></td>

                            		</tr>
                            			<tr>
                            			<td>image</td>
                            			<td><input type="file" name="imgshop"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkshop"></td>

                            		</tr>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idshop"></td>

                            		</tr>
                            	
                            		
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitshop" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			                 <?php
							if(isset($_POST["submitshop"]))
							{
							   $v1=rand(1111,9999);
							   $v2=rand(1111,9999);
							   
							   $v3=$v1.$v2;
							   
							   $v3=md5($v3);
							   
							   
							   $fnm=$_FILES["imgshop"]["name"];
							   $dst="./product_image/".$v3.$fnm;
							   $dst1="product_image/".$v3.$fnm;
							   move_uploaded_file($_FILES["imgshop"]["tmp_name"],$dst);



							mysqli_query($con,"insert into shophome values('','$_POST[titleshop]','$_POST[disshop]','$dst1',$_POST[tkshop],$_POST[post_idshop])");


							}
							?>
							<br>
    
                         	<h1>Shop Home page Fashion add Produts</h1>
                            <form name="form32"action="" method="post" enctype="multipart/form-data"> 
                            	<table>

                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titleshopf"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="disshopf"></td>

                            		</tr>
                            			<tr>
                            			<td>image</td>
                            			<td><input type="file" name="imgshopf"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkshopf"></td>

                            		</tr>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idshopf"></td>

                            		</tr>
                            	
                            		
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitshopf" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			                 <?php
							if(isset($_POST["submitshopf"]))
							{
							   $v1=rand(1111,9999);
							   $v2=rand(1111,9999);
							   
							   $v3=$v1.$v2;
							   
							   $v3=md5($v3);
							   
							   
							   $fnm=$_FILES["imgshopf"]["name"];
							   $dst="./product_image/".$v3.$fnm;
							   $dst1="product_image/".$v3.$fnm;
							   move_uploaded_file($_FILES["imgshopf"]["tmp_name"],$dst);



							mysqli_query($con,"insert into shophomef values('','$_POST[titleshopf]','$_POST[disshopf]','$dst1',$_POST[tkshopf],$_POST[post_idshopf])");


							}
							?>
							<h1>Shop Home page hand add Produts</h1>
                            <form name="form34"action="" method="post" enctype="multipart/form-data"> 
                            	<table>

                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titleshopha"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="disshopha"></td>

                            		</tr>
                            			<tr>
                            			<td>image</td>
                            			<td><input type="file" name="imgshopha"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkshopha"></td>

                            		</tr>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idshopha"></td>

                            		</tr>
                            	
                            		
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitshopha" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			                 <?php
							if(isset($_POST["submitshopha"]))
							{
							   $v1=rand(1111,9999);
							   $v2=rand(1111,9999);
							   
							   $v3=$v1.$v2;
							   
							   $v3=md5($v3);
							   
							   
							   $fnm=$_FILES["imgshopha"]["name"];
							   $dst="./product_image/".$v3.$fnm;
							   $dst1="product_image/".$v3.$fnm;
							   move_uploaded_file($_FILES["imgshopha"]["tmp_name"],$dst);



							mysqli_query($con,"insert into shophomeha values('','$_POST[titleshopha]','$_POST[disshopha]','$dst1',$_POST[tkshopha],$_POST[post_idshopha])");


							}
							?>
							<br>
							<h1>Shop Home page Kid add Produts</h1>
                            <form name="form33"action="" method="post" enctype="multipart/form-data"> 
                            	<table>

                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titleshopk"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="disshopk"></td>

                            		</tr>
                            			<tr>
                            			<td>image</td>
                            			<td><input type="file" name="imgshopk"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkshopk"></td>

                            		</tr>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idshopk"></td>

                            		</tr>
                            	
                            		
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitshopk" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			                 <?php
							if(isset($_POST["submitshopk"]))
							{
							   $v1=rand(1111,9999);
							   $v2=rand(1111,9999);
							   
							   $v3=$v1.$v2;
							   
							   $v3=md5($v3);
							   
							   
							   $fnm=$_FILES["imgshopk"]["name"];
							   $dst="./product_image/".$v3.$fnm;
							   $dst1="product_image/".$v3.$fnm;
							   move_uploaded_file($_FILES["imgshopk"]["tmp_name"],$dst);



							mysqli_query($con,"insert into shophomek values('','$_POST[titleshopk]','$_POST[disshopk]','$dst1',$_POST[tkshopk],$_POST[post_idshopk])");


							}
							?>
                      </div>
	</div><!--/.fluid-contain
                      </div>

                      er-->
	
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
