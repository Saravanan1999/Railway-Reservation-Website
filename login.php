<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/jpg" href="logo.jpg"/>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href=style.css rel="stylesheet" type="text/css"/>
  <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
<title>Myrail</title>


</head>

<body style="margin:0;padding:0;background:url(bluetrain.jpg);background-size:cover;font-family:sans-serif">
<center><div class="signin">
  <form action="login.php" method="Post">
    <p align=left><img src="logo.jpg" width=30>&nbsp;&nbsp;<font size="5"><b>Myrail</b></font></p>
    <h1 style="color:white;font-family:sans-serif">Log In</h1>
    Username<br><input type="text" name="user" ><br>
    <br>Password<br><input type="password" id="pass" name="pass" ><br>
  <br>  <input type="submit" name="submit" value="Log In" ><br>
    <br>
    <div id="container">
   <b> <a href="forgot.php" style="color:DeepSkyBlue;font-size:15px">Reset Password</a></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div><br>

  Don't have account?<a href="Signup.php" style="color:DeepSkyBlue">&nbsp;<b>Sign Up</b></a>
</div>
  </form>
</div>
</center>

</form>
<?php
if(isset($_POST['submit'])){
   error_reporting(0);
   $user=$_POST["user"];
   session_start();
   $_SESSION['user']=$user;
   $pass=$_POST["pass"];
   $con=Mysqli_connect('127.0.0.1',"root","","usertable");
   $result=mysqli_query($con,"SELECT * FROM users where Username='$user'")
   or die("Failed to query database".mysqli_error($con));
   $row=mysqli_fetch_array($result);
   if($row['Password']==$pass){
    header('Location: home1.php');
   }
   else{
     echo "Wrong username or password";
   }
  }

?>
</body>
</html>
