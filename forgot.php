<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/jpg" href="logo.jpg"/>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="style.css" rel="stylesheet" type="text/css"/>
  <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
<title>Myrail</title>
</head>
<body style="margin:0;padding:0;background:url(bluetrain.jpg);background-size:cover;center;font-family:sans-serif">
<center><div class="signin">
<form action="forgot.php" method="Post">
    <p align=left><img src="logo.jpg" width=30>&nbsp;&nbsp;<font size="5"><b>Myrail</b></font></p>
    <h2 style="color:white;font-family:sans-serif">Reset Password</h2>
    Username<br><input type="text" name="user" ><br>
    <br>Old Password:<br><input type="password" id="opass" name="opass" ><br>
    <br>New Password<br><input type="password" id="npass" name="npass" ><br>
    <br>  <input type="submit" name="submit" value="Reset Password" ><br>
    <br>
    <div id="container">
   <b>Or&nbsp;<a href="Login.php" style="color:DeepSkyBlue;font-size:25px">Login</a></b>
  </div><br>
</div>
</center>
<?php
if(isset($_POST['submit'])){
    $con=Mysqli_connect('127.0.0.1',"root","","usertable");
    $username=$_POST['user'];
    $result=mysqli_query($con,"SELECT * FROM users where Username='$username'")
    or die("Failed to query database".mysqli_error($con));
    $row=mysqli_fetch_array($result);
    if($row['Username']==$username){
    $opass=$_POST['opass'];
    $npass=$_POST['npass'];
    if($opass!=$npass){
    
    $result1=mysqli_query($con,"Update users set Password='$npass' where Username='$username'")or die("Failed to query database".mysqli_error($con)); 
}
    else{
        echo "Old password cannot be same as new password";
    }
    }
    else{
        echo "Username doesn't exist";
    }
}
?>
</body>
</html>