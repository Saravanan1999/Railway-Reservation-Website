<?php include('header.php')?>
<body>
<link href=style.css rel="stylesheet" type="text/css"/>
<link href=bookstyle.css rel="stylesheet" type="text/css"/>
<link href=tablestyle.css rel="stylesheet" type="text/css"/>
<br>
</div>
<br>
<div class="main">
<center><h2>Book Your Ticket</h2><br>
<div class="select">
<form action="book.php" method="POST">
  From:&nbsp;&nbsp;<select name="from">
  <option value="Bengaluru">Bengaluru</option>
  <option value="Chennai">Chennai</option>
  <option value="Delhi">Delhi</option>
  <option value="Hyderabad">Hyderabad</option>
  <option value="Kolkata">Kolkata</option>
  <option value="Mumbai">Mumbai</option>
</select><br><br>
  To:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="to">
  <option value="Bengaluru">Bengaluru</option>
  <option value="Chennai">Chennai</option>
  <option value="Delhi">Delhi</option>
  <option value="Hyderabad">Hyderabad</option>
  <option value="Kolkata">Kolkata</option>
  <option value="Mumbai">Mumbai</option>
</select><br><br>
  Date:&nbsp;&nbsp;<input type="date" name="jd" value="2019-10-11" min="2019-10-11" max="2019-10-11" name="Date" style='border:solid 2px;width:190px'><br><br>
  &nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Find trains" style="background-color:white;color:black;width:200px;border:solid black"></center>

</div>
</div>
</center>
<br><br><br><br><br><br><br><br><br><br>
<hr>
<br>
<?php
error_reporting(0);
if(isset($_POST['submit'])){
$From=$_POST['from'];
$To=$_POST['to'];
$Date=$_POST['jd'];
if($From!=$To){
echo "<h2>Trains from $From To $To are:<h2><br>" ;
$con=Mysqli_connect('127.0.0.1',"root","","usertable");
$result=Mysqli_query($con,"SELECT * FROM train where Source='$From'and Destination='$To'")
   or die("Failed to query database".mysqli_error($con));
$arr=array();
   echo "<center>";if($result){
     echo "<table class='content-table'><thead>
     <tr><th style='text-align:center'> &nbsp;Train Number &nbsp;</th>
     <th style='text-align:center'> &nbsp;Train Name&nbsp;</th>
     <th style='text-align:center'> &nbsp;Source &nbsp;</th>
     <th style='text-align:center'> &nbsp;Destination&nbsp; </th>
     <th style='text-align:center'>&nbsp; Departure Time&nbsp; </th>
     <th style='text-align:center'>&nbsp; Arrival Time&nbsp; </th>
     <th style='text-align:center'>&nbsp; Travel Time&nbsp; </th>
     <th style='text-align:center'> &nbsp;Seats Available &nbsp;</th></tr></thead>";
     while($row=mysqli_fetch_array($result)){
      echo "<tbody><tr>";
      echo "<td style='text-align:center'>".$row['Train_Number']."</td>";
      array_push($arr,$row['Train_Number']);
      echo "<td style='text-align:center'>".$row['Train_Name']."</td>";
      echo "<td style='text-align:center'>".$row['Source']."</td>";
      echo "<td style='text-align:center'>".$row['Destination']."</td>";
      echo "<td style='text-align:center'>".$row['Departure_Time']."</td>";
      echo "<td style='text-align:center'>".$row['Arrival_Time']."</td>";
      echo "<td style='text-align:center'>".$row['Travel_Time']."</td>";
      echo "<td style='text-align:center'>".$row['Seats_Available']."</td>";
      echo "</tr></tbody>";
     }
   } 
   echo "</table>";
}
else{
  echo "<h2>Source and Destination cant be same<h2>";
}
}

?></center>

<br>&nbsp;
<?php

if($_POST['submit'] and $From!=$To){
  echo "&nbsp;&nbsp;&nbsp;Train Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No.of.Passengers:<br>&nbsp;&nbsp;&nbsp";
?>
<form action="#" method="POST">
    <select name="Booking" id="Booking">

        <?php
        foreach($arr as $item){?>
          <option value="<?php echo strtolower($item); ?>"><?php echo $item; ?></option>
          <?php
          }
          ?>
          </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <select name="Nop" id="Nop">
      <option value=1>1</option>
      <option value=2>2</option>
      <option value=3>3</option>
      <option value=4>4</option>
      <option value=5>5</option>
      <option value=6>6</option>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="Submit" name="Submit1" value="Book" style="background-color:white;color:black;width:200px;border:solid black">
  </form><br><br>

<?php }
if(isset($_POST['Submit1'])){
  
  session_start();
  $_SESSION['Booking']=$_POST['Booking'];
  $_SESSION['Nop']=$_POST['Nop'];
  $booking=$_POST['Booking'];
  $con=Mysqli_connect('127.0.0.1',"root","","usertable");
  $result3=Mysqli_query($con,"SELECT Seats_Available FROM train where Train_Number=$booking")or die(mysqli_error($con));
  $row3=$row=mysqli_fetch_array($result3);

  echo print_r($row3);
  if($_POST['Nop']<=$row3['Seats_Available'] ){
    header('Location: booking.php');
  }
  else if($_POST['Nop']>$row3['Seats_Available']){
    echo "Please Select Number of Passengers less than or equal to the Seats available";
  }
 
}
?>


          
</body>
</html>
