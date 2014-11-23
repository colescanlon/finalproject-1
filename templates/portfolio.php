
<!--Navigation Bar-->
<ul class="nav nav-tabs nav-justified" role="tablist">
    <li><a href="index.php">Home</a></li>
    <li><a href="quote.php">Your Location</a></li>   
    <li><a href="buy.php">Your Friends</a></li>
    <li><a href="sell.php"> Settings</a></li>
    <li><a href="reset.php">Reset Password</a></li>
    <li><a href="logout.php"><strong>Log Out</strong></a></li>
</ul>
     <br> </br>

<!--Welcome user-->  
<p>
    Welcome <strong><?php echo $cash[0]["username"]?></strong>! 
</p>
<br> </br>

<div>
    <a href="logout.php">Log Out</a>
</div>
