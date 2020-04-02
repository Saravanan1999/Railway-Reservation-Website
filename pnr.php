<?php include('header.php')?>
<?php
session_start();
$user=$_SESSION['user'];
$No=$_SESSION['Booking'];
?>
<link href=tablestyle.css rel="stylesheet" type="text/css"/>
<link href=bookstyle.css rel="stylesheet" type="text/css"/>
<body>

  

<br>

<br>


<center><p><b><h2>Ticket Current Status Enquiry</h2></p></p></center><br>
  <center><h4>Enter the Ticket Number for your booking below to get the current status<h4><br>
<form action="pnr.php" method="POST">
Enter Ticket Number.&nbsp;&nbsp;<input type="text" name="pnr"><br></center><br>
<center><input type="submit"style="background-color:white;color:black;width:200px;border:solid" value="Check Status">
&nbsp;&nbsp;&nbsp;<input type="reset"style="background-color:white;color:black;width:200px;border:solid"></center><br><br>

<center><?php
error_reporting(0);
$PNR=$_POST['pnr'];
$con=Mysqli_connect('127.0.0.1',"root","","usertable")or die('Coulnt open database'.mysqli_error($con));
$result=Mysqli_query($con,"SELECT * FROM bookings where Username='$user'and PNR=$PNR");
if($result){
    echo "<table class='content-table'><thead>
    <tr><th> &nbsp;PNR Number &nbsp;</th>
    <th style='text-align:center'> &nbsp;Name&nbsp;</th>
    <th style='text-align:center'> &nbsp;Age &nbsp;</th>
    <th style='text-align:center'> &nbsp;Gender&nbsp; </th>
    <th style='text-align:center'>&nbsp; Train Number&nbsp; </th>
    <th style='text-align:center'>&nbsp; Train Name&nbsp; </th>
    <th style='text-align:center'>&nbsp; Source&nbsp; </th>
    <th style='text-align:center'>&nbsp; Destination&nbsp; </th>
    <th style='text-align:center'>&nbsp; Status&nbsp; </th>
    </tr></thead>";
$i=0;
    while($row=mysqli_fetch_array($result)){
      
        $tno=$row['Train_number'];
        
        $result1=Mysqli_query($con,"Select Train_Name from train where Train_Number=$tno ")or die('Couldnt Select');
        $row1=mysqli_fetch_array($result1);
        
        echo "<tbody><tr>";
        echo "<td style='text-align:center'>".$row['PNR']."</td>";
        echo "<td style='text-align:center'>".$row['Name']."</td>";
        echo "<td style='text-align:center'>".$row['Age']."</td>";
        echo "<td style='text-align:center'>".$row['Gender']."</td>";
        echo "<td style='text-align:center'>".$row['Train_number']."</td>";
        echo "<td style='text-align:center'>".$row1['Train_Name']."</td>";
        echo "<td style='text-align:center'>".$row['Source']."</td>";
        echo "<td style='text-align:center'>".$row['Destination']."</td>";
        echo "<td style='text-align:center;background-color:#0086b3;color:white'>".$row['STATUS']."</td>";
        echo "</tr></tbody>";
        $i=$i+1;
    }
    echo "</table>";
}
?>

</body>
</html>
