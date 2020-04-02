<?php include('header.php')?>

<body>
<?php
session_start();
$user=$_SESSION['user'];
?>
<br>
<div class="wel">
<h4 align="right">Welcome <?php echo $user?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>
</div>
<br>
<hr>
<br>
<br>
<br>
<br>

<br>
<div class="slidershow middle">

    <div class="slides">
        <input type="radio" name="r" id="r1" checked>
        <input type="radio" name="r" id="r2" >
        <input type="radio" name="r" id="r3" >
        <input type="radio" name="r" id="r4" >
        <input type="radio" name="r" id="r5" >
        <input type="radio" name="r" id="r6" >
        <input type="radio" name="r" id="r7" >
        <div class="slide s1">
            <img src="adventure.jpg" width="700" height="400" alt=" ">
</div>
<div class="slide">
            <img src="bengaluru.jpg" width="700" height="400" alt=" ">
</div>
        <div class="slide">
            <img src="chennai.jpg" width="700" height="400" alt=" ">
</div>
        <div class="slide">
            <img src="delhi.jpg" width="700" height="400"alt="">
</div>
        <div class="slide">
            <img src="hyderabad.jpg"width="700"height="400"  alt=" ">
</div>
        <div class="slide">
            <img src="kolkata.jpg"width="700" height="400" alt=" ">
</div>
        <div class="slide">
            <img src="mumbai.jpg" width="700"height="400" alt=" ">
</div>
</div>
<div class="navigation">
    <label for="r1" class="bar"></label>
    <label for="r2" class="bar"></label>
    <label for="r3" class="bar"></label>
    <label for="r4" class="bar"></label>
    <label for="r5" class="bar"></label>
    <label for="r6" class="bar"></label>
    <label for="r7" class="bar"></label>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="flex-wrapper">
  <div class="container">
      <div id="footer-section-about">
          <h3 style="letter-spacing:5px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MYRAIL</h3><br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-home" style="font-size:24px"></i>&nbsp;&nbsp;Myrail Corporation Ltd.,,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9/6a, Mc Nichols Road,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chetpet, Chennai 600031<br><br>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-phone" style="font-size:24px;color:white"></i>&nbsp;&nbsp;9573096497<br><br>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-envelope-o" style="font-size:24px"></i>&nbsp;&nbsp;care@myrail.com<br>
        </div>
      <div id="footer-section-contact">
     <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Leave us a Message:</h3><br>
          <form action="home1.php" method="POST">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="message" rows="4" cols="45"></textarea><br><br>
          &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" >
</form>

      </div>
      <div id="footer-social-icons">
          <ul>
              <h3 style="color:white"><br><br>Follow us on:</h3><br>&nbsp;&nbsp;
              <li><a href="#" target="blank"><i class="fa fa-facebook"></i></a></li>&nbsp;&nbsp;&nbsp;
              <li><a href="#" target="blank"><i class="fa fa-twitter"></i></a></li>&nbsp;&nbsp;&nbsp;
              <li><a href="#" target="blank"><i class="fa fa-google-plus"></i></a></li>&nbsp;&nbsp;&nbsp;
              <li><a href="#" target="blank"><i class="fa fa-instagram"></i></a></li>&nbsp;&nbsp;&nbsp;
      </div>
      <div style="clear:both;"></div>
      <div class="div.footer-section contact-form"></div>
    </div>
</div>
    <div class="footer">
      &copy;Myrail.com | Designed by Saravanan H&nbsp;&nbsp;
      
    </div>
<?php
error_reporting(0);
$message=$_POST['message'];
$con=Mysqli_connect('127.0.0.1',"root","","usertable");
$result3=Mysqli_query($con,'Select max(Message_Number) from message');
$row3=mysqli_fetch_array($result3);
$n3=$row3['max(Message_Number)'];
$n3=$n3+1;
$result4=Mysqli_query($con,"Insert into message values($n3,'$user','$message')")or die(Mysqli_error($con));


?>
</body>
</html>
