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
				<li><a href="#">Add Products</a></li>
			</ul>

			
				            <br>
				            <h1>Post_id --Intiger type--</h1>
				            <br>
				
				<div class="clearfix"></div>
								<h1>Home page crollbar products form</h1>
                            <form name="form1"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="dis"></td>

                            		</tr>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_id"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="title"></td>

                            		</tr>
                            		<tr>
                            			<td>image</td>
                            			<td><input type="file" name="img"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tk"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submit" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			                 <?php
							if(isset($_POST["submit"]))
							{
							   $v1=rand(1111,9999);
							   $v2=rand(1111,9999);
							   
							   $v3=$v1.$v2;
							   
							   $v3=md5($v3);
							   
							   
							   $fnm=$_FILES["img"]["name"];
							   $dst="./product_image/".$v3.$fnm;
							   $dst1="product_image/".$v3.$fnm;
							   move_uploaded_file($_FILES["img"]["tmp_name"],$dst);



							mysqli_query($con,"insert into home values('$_POST[dis]',$_POST[post_id],'$_POST[title]','$dst1',$_POST[tk])");


							}
							?>
    
                                        
                          <br><br>
                        <h1>Home page home shop products form</h1>
                            <form name="form2"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idn"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titlen"></td>

                            		</tr>
                            		<tr>
                            			<td>image</td>
                            			<td><input type="file" name="imgn"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkn"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitn" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
                                <?php
							if(isset($_POST["submitn"]))
							{
							   $v1=rand(1111,9999);
							   $v2=rand(1111,9999);
							   
							   $v3=$v1.$v2;
							   
							   $v3=md5($v3);
							   
							   
							   $fnm=$_FILES["imgn"]["name"];
							   $dst="./product_image/".$v3.$fnm;
							   $dst1="product_image/".$v3.$fnm;
							   move_uploaded_file($_FILES["imgn"]["tmp_name"],$dst);



							mysqli_query($con,"insert into homen values($_POST[post_idn],'$_POST[titlen]','$dst1',$_POST[tkn])");


							}
							?>
                           <br><br>
                        <h1> breakfast new recipices </h1>
                            <form name="formnr"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idnr"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titlenr"></td>

                            		</tr>
                            		<tr>
                            			<td>image</td>
                            			<td><input type="file" name="imgnr"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tknr"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitnr" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
    
                                <?php 
                               if(isset($_POST["submitnr"]))
                               {

							   $fnmnr = $_FILES["imgnr"]["name"];
							   $dstnr = "./upload/".$fnmnr;
							   $dst1nr = "upload/".$fnmnr;
							  move_uploaded_file($_FILES["imgnr"]["tmp_name"],$dstnr);

                             mysqli_query($con,"insert into  breakfastnr values ($_POST[post_idnr],'$_POST[titlenr]','$dst1nr',$_POST[tknr] )");
                         }
                          ?>

                           <br><br>
                           <h1>breakfast beef item</h1>
                            <form name="form3"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idbr"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titlebr"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="disbr"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkbr"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitbr" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
    
                                <?php 
                               if(isset($_POST["submitbr"]))
                               {

                             mysqli_query($con,"insert into breakfastbeefi values ($_POST[post_idbr],'$_POST[titlebr]','$_POST[disbr]',$_POST[tkbr] )");
                         }
                          ?>
                          	
                          	 <br><br>
                           <h1>breakfast egg item</h1>
                            <form name="form4"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idbe"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titlebe"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="disbe"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkbe"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitbe" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
    
                                <?php 
                               if(isset($_POST["submitbe"]))
                               {

                             mysqli_query($con,"insert into breakfasteggi values ($_POST[post_idbe],'$_POST[titlebe]','$_POST[disbe]',$_POST[tkbe] )");
                         }
                          ?>
                           <br><br>
                           <h1>breakfast vegetable item</h1>
                            <form name="form5"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idbv"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titlebv"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="disbv"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkbv"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitbv" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
    
                                <?php 
                               if(isset($_POST["submitbv"]))
                               {

                             mysqli_query($con,"insert into breakfastvgi values ($_POST[post_idbv],'$_POST[titlebv]','$_POST[disbv]',$_POST[tkbv] )");
                         }
                          ?>
                            <br><br>
                           <h1>breakfast Others  item</h1>
                            <form name="form6"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idbot"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titlebot"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="disbot"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkbot"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitbot" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
    
                                <?php 
                               if(isset($_POST["submitbot"]))
                               {

                             mysqli_query($con,"insert into breakfastoti values ($_POST[post_idbot],'$_POST[titlebot]','$_POST[disbot]',$_POST[tkbot] )");
                         }
                          ?>

                           <br><br>
                           <div>
                        <h1> Lunch fvrt recipices </h1>
                            <form name="formlf"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idlf"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titlelf"></td>

                            		</tr>
                            		<tr>
                            			<td>image</td>
                            			<td><input type="file" name="imglf"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tklf"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitlf" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
							   <?php
							if(isset($_POST["submitlf"]))
							{
							   $v1=rand(1111,9999);
							   $v2=rand(1111,9999);
							   
							   $v3=$v1.$v2;
							   
							   $v3=md5($v3);
							   
							   
							   $fnm=$_FILES["imglf"]["name"];
							   $dst="./product_image/".$v3.$fnm;
							   $dst1="product_image/".$v3.$fnm;
							   move_uploaded_file($_FILES["imglf"]["tmp_name"],$dst);



							mysqli_query($con,"insert into lunchlf values($_POST[post_idlf],'$_POST[titlelf]','$dst1',$_POST[tklf])");


							}
							?>
						</div>
							                           <br><br>
                           <h1>Lunch beef  item</h1>


                            <form name="form8"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idlb"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titlelb"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="dislb"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tklb"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitlb" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
    
                                <?php 
                               if(isset($_POST["submitlb"]))
                               {

                             mysqli_query($con,"insert into lunchlb values ($_POST[post_idlb],'$_POST[titlelb]','$_POST[dislb]',$_POST[tklb] )");
                         }
                          ?>

 <br><br>
                           <h1>lunch Fish item</h1>
                            <form name="form9"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idlfi"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titlelfi"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="dislfi"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tklfi"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitlfi" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
    
                                <?php 
                               if(isset($_POST["submitlfi"]))
                               {

                             mysqli_query($con,"insert into lunchfi values ($_POST[post_idlfi],'$_POST[titlelfi]','$_POST[dislfi]',$_POST[tklfi] )");
                         }
                          ?>

 <br><br>
                           <h1>lunch Chicken item</h1>
                            <form name="form10"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idle"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titlele"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="disle"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkle"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitle" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
    
                                <?php 
                               if(isset($_POST["submitle"]))
                               {

                             mysqli_query($con,"insert into lunchle values ($_POST[post_idle],'$_POST[titlele]','$_POST[disle]',$_POST[tkle] )");
                         }
                          ?>


                           <br><br>
                           <h1>lunch Vegetable item</h1>
                            <form name="form11"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idlv"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titlelv"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="dislv"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tklv"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitlv" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
    
                                <?php 
                               if(isset($_POST["submitlv"]))
                               {

                             mysqli_query($con,"insert into lunchlv values ($_POST[post_idlv],'$_POST[titlelv]','$_POST[dislv]',$_POST[tklv] )");
                         }
                          ?>
                           <br><br>
                        <h1> dinner fvrt recipices </h1>
                            <form name="form12"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_iddf"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titledf"></td>

                            		</tr>
                            		<tr>
                            			<td>image</td>
                            			<td><input type="file" name="imgdf"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkdf"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitdf" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
                                  <?php
							if(isset($_POST["submitdf"]))
							{
							   $v1=rand(1111,9999);
							   $v2=rand(1111,9999);
							   
							   $v3=$v1.$v2;
							   
							   $v3=md5($v3);
							   
							   
							   $fnm=$_FILES["imgdf"]["name"];
							   $dst="./product_image/".$v3.$fnm;
							   $dst1="product_image/".$v3.$fnm;
							   move_uploaded_file($_FILES["imgdf"]["tmp_name"],$dst);



							mysqli_query($con,"insert into dinnerdf values($_POST[post_iddf],'$_POST[titledf]','$dst1',$_POST[tkdf])");


							}
							?>
                               
                           <br><br>
                           <h1>dinner beef  item</h1>


                            <form name="form13"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_iddb"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titledb"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="disdb"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkdb"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitdb" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
    
                                <?php 
                               if(isset($_POST["submitdb"]))
                               {

                             mysqli_query($con,"insert into dinnerdb values ($_POST[post_iddb],'$_POST[titledb]','$_POST[disdb]',$_POST[tkdb] )");
                         }
                          ?>

 <br><br>
                           <h1>dinner Fish item</h1>
                            <form name="form14"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_iddfi"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titledfi"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="disdfi"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkdfi"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitdfi" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
    
                                <?php 
                               if(isset($_POST["submitdfi"]))
                               {

                             mysqli_query($con,"insert into dinnerdfi values ($_POST[post_iddfi],'$_POST[titledfi]','$_POST[disdfi]',$_POST[tkdfi] )");
                         }
                          ?>

 <br><br>
                           <h1>dinner egg/vegetable item</h1>
                            <form name="form15"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idde"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titlede"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="disde"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkde"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitde" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
    
                                <?php 
                               if(isset($_POST["submitde"]))
                               {

                             mysqli_query($con,"insert into dinnerde values ($_POST[post_idde],'$_POST[titlede]','$_POST[disde]',$_POST[tkde] )");
                         }
                          ?>


                           <br><br>
                           <h1>Dinner mixed item</h1>
                            <form name="form16"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_iddv"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titledv"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="disdv"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkdv"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitdv" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
    
                                <?php 
                               if(isset($_POST["submitdv"]))
                               {

                             mysqli_query($con,"insert into dinnerdv values ($_POST[post_iddv],'$_POST[titledv]','$_POST[disdv]',$_POST[tkdv] )");
                         }
                          ?>
                             <br><br>
                           <h1>Birthday Party</h1>
                            <form name="form20"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idpbe"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titlepb"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="dispb"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkpb"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitpb" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
    
                                <?php 
                               if(isset($_POST["submitpb"]))
                               {

                             mysqli_query($con,"insert into pakagepb values ($_POST[post_idpbe],'$_POST[titlepb]','$_POST[dispb]',$_POST[tkpb] )");
                         }
                          ?>
                             <br><br>
                           <h1>Wedding Anniversary Party</h1>
                            <form name="form21"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idpw"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titlepw"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="dispw"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkpw"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitpw" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
    
                                <?php 
                               if(isset($_POST["submitpw"]))
                               {

                             mysqli_query($con,"insert into pakagepw values ($_POST[post_idpw],'$_POST[titlepw]','$_POST[dispw]',$_POST[tkpw] )");
                         }
                          ?>
                             <br><br>
                           <h1>Class Party</h1>
                            <form name="form24"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idpc"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titlepc"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="dispc"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkpc"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitpc" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
    
                                <?php 
                               if(isset($_POST["submitpc"]))
                               {

                             mysqli_query($con,"insert into pakagepc values ($_POST[post_idpc],'$_POST[titlepc]','$_POST[dispc]',$_POST[tkpc] )");
                         }
                          ?>
                             <br><br>
                           <h1>Buy Party Supplies</h1>
                            <form name="form25"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idps"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titleps"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="disps"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkps"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitps" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
    
                                <?php 
                               if(isset($_POST["submitps"]))
                               {

                             mysqli_query($con,"insert into pakageps values ($_POST[post_idps],'$_POST[titleps]','$_POST[disps]',$_POST[tkps] )");
                         }
                          ?>
                             <br><br>
                           <h1>Set Menu for Party</h1>
                            <form name="form26"action="" method="post" enctype="multipart/form-data"> 
                            	<table>
                            		<tr>
                            			<td>Products Id</td>
                            			<td><input type="text" name="post_idpset"></td>

                            		</tr>
                            		<tr>
                            			<td>Products name</td>
                            			<td><input type="text" name="titlepset"></td>

                            		</tr>
                            		<tr>
                            			<td>Discrption</td>
                            			<td><input type="text" name="dispset"></td>

                            		</tr>
                            		<tr>
                            			<td>taka</td>
                            			<td><input type="text" name="tkpset"></td>

                            		</tr>
                            		<tr>
                            			<td>submit</td>
                            			<td><input type="submit" name="submitpset" value="upload"></td>

                            		</tr>

                            	</table>
							

                          </form>
     
			
    
                                <?php 
                               if(isset($_POST["submitpset"]))
                               {

                             mysqli_query($con,"insert into pakagepset values ($_POST[post_idpset],'$_POST[titlepset]','$_POST[dispset]',$_POST[tkpset] )");
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
