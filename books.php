<html>
<link href=tablestyle.css rel="stylesheet" type="text/css"/>
<?php include('header.php')?>
<body><br><br>
   <center> <h3>Your ticket has been booked Successfully</h3><br>
    Ticket Details:
<?php
Session_start();
$arr2=$_SESSION['arr'];
$user=$_SESSION['user'];
$con=Mysqli_connect('127.0.0.1',"root","","usertable")or die('Coulnt open database'.mysqli_error($con));
foreach ($arr2 as $k => $value) {
$result=Mysqli_query($con,"SELECT * FROM bookings where Username='$user' and PNR=$value")or die('Couldnt Select'.mysqli_error($con));
if($result){
    echo "<table class='content-table'><thead>
    <tr><th> &nbsp;Ticket Number &nbsp;</th>
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
        $result1=Mysqli_query($con,"Select Train_Name from train where Train_Number=$tno ")or die('Couldnt Select'.mysqli_error($con));
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
        echo "<td style='text-align:center'>".$row['STATUS']."</td>";
        echo "</tr></tbody>";
        $i=$i+1;
    }
    echo "</table>";
}
}
?>
Go back <a href='home1.php'><u>Home</u></a>
</body>
</html>