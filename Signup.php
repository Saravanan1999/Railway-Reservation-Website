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
<center><div class="signup">

<form action="Signup.php" method="POST">
  <p align=left><img src="logo.jpg" width=30>&nbsp;&nbsp;<font size="5"><b>Myrail</b></font></p>
  <h2><b>Create an account</b></h2>
  &nbsp;First Name: &nbsp;<input type="text" name="fname"><br><br>
  &nbsp;Last Name: &nbsp;<input type="text" name="lname"><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;Gender:&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Male">Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Female">Female&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Other">Other&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
  Username:&nbsp;&nbsp;<input type="text" name="username"><br><br>
  Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="email"><br><br>
  Phone: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="phno"><br><br>
  Password:&nbsp;&nbsp; <input type="Password" name="password"><br><br>
  <input type="Submit" name="submit">
  <input type="reset" name="reset"><br><br><br>
Have an account?&nbsp;<a style="color:DeepSkyBlue" href="Login.php"><b>Log In</b></a>
<?php
if(isset($_POST['submit'])){
  error_reporting(0);
$FName=$_POST["fname"];
$LName=$_POST["lname"];
$Gender=$_POST["gender"];
$username=$_POST["username"];
$Email=$_POST["email"];
$Phone=$_POST["phno"];
$Password=$_POST["password"];
$con=Mysqli_connect('127.0.0.1',"root","","usertable");
$result1=mysqli_query($con,"SELECT * FROM users where Username='$username'");
$row=mysqli_fetch_array($result1);
if($row['Username']==$username){
  
  echo "<br><b>Username already taken<b>";
}
else{
  $result1=mysqli_query($con,"SELECT * FROM users where Email='$Email'");
  $row=mysqli_fetch_array($result1);
  if($row['Email']==$Email){
    echo "<br><b>This email is already registered<b>";
  }
  else{
$result2=mysqli_query($con,"Insert into users values('$FName','$LName','$Gender','$username','$Email',$Phone,'$Password')")
   or die("Failed to query database".mysqli_error($con));
echo "<br><b>Successfully registered<b>";
header('Location: login.php');
  }
}
}

?>
</body>
</html>
