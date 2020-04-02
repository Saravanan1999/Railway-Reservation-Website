<?php include('header.php')?>
<body >
<link href=bookstyle.css rel="stylesheet" type="text/css"/>
<?php
session_start();
$user=$_SESSION['user'];
$No=$_SESSION['Booking'];
?>
<br>
</div>
<br>
<center>
<h3><b>Your Bookings:<b></h3>
<link href=tablestyle.css rel="stylesheet" type="text/css"/>
<?php
$con=Mysqli_connect('127.0.0.1',"root","","usertable")or die('Coulnt open database'.mysqli_error($con));
$result=Mysqli_query($con,"SELECT * FROM bookings where Username='$user'")or die('Couldnt Select'.mysqli_error($con));
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
?>
Do you want to cancel any ticket?<br>
<form action="#" method="POST">
   <u> <input type='submit' name='button' value='Click Here'></u>
<form><br>
    <?php
    if(isset($_POST['button'])){
    ?><br><br>
    Select the Ticket Number you want to cancel<br><br>
    <?php
$result7=Mysqli_query($con,"SELECT * FROM bookings where Username='$user' and STATUS!='Cancelled'")or die('Couldnt Select'.mysqli_error($con));
$arr=array();
while($row7=mysqli_fetch_array($result7)){
    array_push($arr,$row7['PNR']);
}
    ?>
<form action="#" method="POST">
    <select name="Booking" id="Booking">

        <?php
        foreach($arr as $item){?>
          <option value="<?php echo strtolower($item); ?>"><?php echo $item; ?></option>
          <?php
          }
          ?>

        
        </select><br>
        <input type='submit' name='submit4' value='cancel'>
    <?php
    }
    ?><br>
    
</form>
<?php
if(isset($_POST['submit4'])){
$PNR=$_POST['Booking'];
$result3=Mysqli_query($con,"Update bookings set STATUS='Cancelled' where PNR=$PNR ")or die('couldnt connect'.mysqli_error($con));
$result5=Mysqli_query($con,"Select * from bookings where PNR=$PNR ")or die('Couldnt Select'.mysqli_error($con));
$row5=mysqli_fetch_array($result5);
$tino=$row5['Train_number'];
$result6=Mysqli_query($con,"Select * from train where Train_Number=$tino ")or die('Couldnt Select'.mysqli_error($con));
$row1=mysqli_fetch_array($result6);
$sa=$row1['Seats_Available'];
$sa=$sa+1;

$result4=Mysqli_query($con,"Update train set Seats_Available=$sa where Train_Number=$tino");
if($result3 and $result4){
    echo "Successfully cancelled";
}
}
?>
</body>
</html>
