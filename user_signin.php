<!DOCTYPE html>
<html lang="en">
<head>
<?php    
include_once('upperhtml.php');
?>
</head>

<!--body-->
<body>
<!--menu bar-->
<div>
<?php    
include_once('menubar.php');
?>
</div>

<?php 

include_once"global.php";


$new_usernumber = strtotime(date_default_timezone_get()) + (mt_rand(1049100000000,999749108474230));
$new_username=$_POST['username'];
$new_email=$_POST["email"];
$new_password=$_POST["password"];
$new_ip=$_SERVER['REMOTE_ADDR'];

$email_query="SELECT email FROM Users Where email='$new_email' LIMIT 1" or die("not found username");
$result = $con->query($email_query);
if ($result->num_rows > 0) {
    ?>
    <div id="contact-section" class="text-center">
  <div class="container">
      <br><br><br><br><br><br><br>
    <div class="section-title center">
      <h2><?
    echo"Your email is already in use.";?></h2>
    
    <h4><?
    echo"Login now and connect to the world.";?></h4>
    <a  href="login.php" class="btn btn-default btn-lg page-scroll">login</a>
    </div>
    </div>
    <br><br><br><br><br><br>
    </div>
    <?
    exit();
}
if (isset($new_email))
{
//turning off for now
$sql="INSERT INTO Users(usernumber,username, email, password,ip,last_logged_in,school, description, pic) VALUES ('$new_usernumber','$new_username', '$new_email','$new_password','$new_ip',now(),' ',' ','profiles/p1.jpg')";

if(!mysqli_query($con,$sql))
{
    
    ?>
    <div id="contact-section" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2><?
    echo"$session_username, we were unable you setup your account :(";?></h2>
    
    <h4><?
    echo"Please sign up again. .";?></h4>
    <a  href="signin.php" class="btn btn-default btn-lg page-scroll">Signup</a>
    </div>
    </div>

    <br><br><br><br><br><br><br><br><br>
    </div>
    <?
}
else
{
    ?>
    <div id="contact-section" class="text-center">
  <div class="container">
      <br><br><br><br><br><br><br>
    <div class="section-title center">
      <h2><?
    echo"Your Account has been successfully created.";?></h2>
    
    <h4><?
    echo"Login now and connect to the world.";
    
    $intro_message = "Thanks for creating an account. Head up to your dashboard in the lower left corner to share you link to public. You can also find other options in the dashboard, including private messenger. Good luck!";
$sql_intro="INSERT INTO Messages (id, message, time, me,color) 
        VALUES ('$new_usernumber', '$intro_message',now(),'0','#9b1dd6')";
    if(!mysqli_query($con,$sql_intro))
{
    echo"can not";
}
    
    ?>
    </h4>
    <a  href="login.php" class="btn btn-default btn-lg page-scroll">login</a>
    </div>
    </div>

    <br><br><br><br><br><br><br><br><br>
    </div>
    <?
}
}
else
{
    ?>
    <div id="contact-section" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2><?
    echo"$session_username, we are happy you are here.";?></h2>
    
    <h4><?
    echo"Login now and connect to the world.";?></h4>
    <a  href="login.php" class="btn btn-default btn-lg page-scroll">login</a>
    </div>
    </div>
    <br><br><br><br><br><br><br><br><br>
    </div>
    <?
}

//$result= $mysqli->query($sql);
?>


</body>
</html>














