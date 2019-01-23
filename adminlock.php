<?php
   include("function/function.php");
   session_start();
   $error = "Your Login Name or Password is invalid";
   $con=mysqli_connect("localhost","root","","rannaghara");
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($con,$_POST['username']);
      $mypassword = mysqli_real_escape_string($con,$_POST['password']); 
      //$active = mysqli_real_escape_string($con,$_POST['active']); 
      
      $sql = "SELECT id FROM adminlock WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         $_SESSION['admin'] = $myusername;
         if ($con) {
           $active_sql = "UPDATE adminlock SET active='1' WHERE username='$myusername'";
           if ($con->query($active_sql) === TRUE) {
            echo "Record updated successfully";
            header("location: index.php");
           } else {
            echo "Error updating record: " . $conn->error;
          }
         }
         
      }
      else {
         $error = "Your Login Name or Password is invalid";

      }
   }
?>
<html>
   
   <head>
      <title>Only admin User</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
  
      <div align = "center">
         <div style = "width:300px; border: solid 5px green; " align = "left">
            <div style = "background-color:green; font-size: 25px;text-align: center; color:#FFFFFF; padding:3px;"><b>Only Admin User</b></div>
        
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
          
            </div>
        
         </div>
      
      </div>

   </body>
</html>