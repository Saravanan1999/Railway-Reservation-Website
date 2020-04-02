<?php include('header.php')?>
<link href=styleb.css rel="stylesheet" type="text/css"/>
<body>
<link href=style1.css rel="stylesheet" type="text/css"/>
  

  <br>
</div><center>
<?php
session_start();
$book=$_SESSION['Booking'];
$No=$_SESSION['Nop'];
$user=$_SESSION['user'];
?>
<h2>Passenger Details</h2><br>
<?php for($i=1;$i<$No+1;$i++){
?>
<div class="form">
<form action="#" method="POST">
Passenger:</b><?php echo $i?><br>
Name:&nbsp;&nbsp;&nbsp;<input type="text" name="name<?php echo$i?>"><br>
Age:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="Number" name="age<?php echo$i?>"><br>
Gender:&nbsp;<input type="text" name="gender<?php echo$i?>"><br><br><br>
</div><br>
<?php
}
?>
<input type="submit" value="Book" style="border:solid" name="submit2"><br><br>
</form>
<?php
$arr2=array();
if(isset($_POST['submit2'])){
  echo "Successfully booked your train ticket";
$con=Mysqli_connect('127.0.0.1',"root","","usertable")or die("couldnt connect to databse".mysqli_error($con));
$result=mysqli_query($con,"Select * from train where Train_Number=$book") or die("Could not select".mysqli_error($con)) ;
$row=mysqli_fetch_array($result);
$seat=$row['Seats_Available'];
$seat=$seat-$No;
$result3=Mysqli_query($con,"Update train set Seats_Available=$seat where Train_Number=$book")or die(mysqli_error($con));
$source=$row['Source'];
$dest=$row['Destination'];
if(isset($_POST['name1'])){
  $name=$_POST['name1'];
  $age=$_POST['age1'];
  $gender=$_POST['gender1'];
  $result1=mysqli_query($con,"Select max(PNR) from bookings");
  $row1=mysqli_fetch_array($result1);
    $n=$row1['max(PNR)'];
    $n1=$n+1;
    array_push($arr2,$n1);
    $result2=mysqli_query($con,"Insert into bookings values($n1,'$name','$age','$gender','$user','$book','$source','$dest','confirmed')")or die(mysqli_error($con));
}
if(isset($_POST['name2'])){
  $name=$_POST['name2'];
  $age=$_POST['age2'];
  $gender=$_POST['gender2'];
  $result1=mysqli_query($con,"Select max(PNR) from bookings");
  $row1=mysqli_fetch_array($result1);
    $n=$row1['max(PNR)'];
    $n1=$n+1;
    array_push($arr2,$n1);
    $result2=mysqli_query($con,"Insert into bookings values($n1,'$name','$age','$gender','$user','$book','$source','$dest','confirmed')");
}
if(isset($_POST['name3'])){
  $name=$_POST['name3'];
  $age=$_POST['age3'];
  $gender=$_POST['gender3'];
  $result1=mysqli_query($con,"Select max(PNR) from bookings");
  $row1=mysqli_fetch_array($result1);
    $n=$row1['max(PNR)'];
    $n1=$n+1;
    array_push($arr2,$n1);
    $result2=mysqli_query($con,"Insert into bookings values($n1,'$name','$age','$gender','$user','$book','$source','$dest','confirmed')");
}
if(isset($_POST['name4'])){
  $name=$_POST['name4'];
  $age=$_POST['age4'];
  $gender=$_POST['gender4'];
  $result1=mysqli_query($con,"Select max(PNR) from bookings");
  $row1=mysqli_fetch_array($result1);
    $n=$row1['max(PNR)'];
    $n1=$n+1;
    array_push($arr2,$n1);
    $result2=mysqli_query($con,"Insert into bookings values($n1,'$name','$age','$gender','$user','$book','$source','$dest','confirmed')");
}
if(isset($_POST['name5'])){
  $name=$_POST['name5'];
  $age=$_POST['age5'];
  $gender=$_POST['gender5'];
  $result1=mysqli_query($con,"Select max(PNR) from bookings");
  $row1=mysqli_fetch_array($result1);
    $n=$row1['max(PNR)'];
    $n1=$n+1;
    array_push($arr2,$n1);
    $result2=mysqli_query($con,"Insert into bookings values($n1,'$name','$age','$gender','$user','$book','$source','$dest','confirmed')");
}
if(isset($_POST['name6'])){
  $name=$_POST['name6'];
  $age=$_POST['age6'];
  $gender=$_POST['gender6'];
  $result1=mysqli_query($con,"Select max(PNR) from bookings");
  $row1=mysqli_fetch_array($result1);
    $n=$row1['max(PNR)'];
    $n1=$n+1;
    array_push($arr2,$n1);
    $result2=mysqli_query($con,"Insert into bookings values($n1,'$name','$age','$gender','$user','$book','$source','$dest','confirmed')");
}
$_SESSION['arr']=$arr2;
header('location:books.php');
}
foreach ($arr2 as $k => $value) {
  unset($array[$k]);
}
?>
</body>
</html>
