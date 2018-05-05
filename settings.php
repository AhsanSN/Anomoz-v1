<?php
include_once('global.php');

if ($logged==0)
{
    ?>
            <script type="text/javascript">
            window.location = "login.php";
            </script>
            <?php
}
?>

<!--storing information in database-->

<?
if(isset($_POST["username_update"]))
{
    $username_update = $_POST["username_update"];
    $sql="UPDATE Users SET username = '$username_update' WHERE usernumber = '$session_usernumber';";
    $session_username = $username_update;
    $_SESSION['username'] = $session_username;
    if(!mysqli_query($con,$sql))
{
    //echo"can not change";
}
}


if(isset($_POST["password_update_1"]))
{
    $password_update_1 = $_POST["password_update_1"];
    $password_update_2 = $_POST["password_update_2"];
    if ($password_update_1 == $password_update_2)
    {
        $sql="UPDATE Users SET password = '$password_update_1'
        WHERE usernumber = '$session_usernumber';";
    $session_password = $password_update_1;
    $_SESSION['password'] = $session_password;
    if(!mysqli_query($con,$sql))
{
    //echo"can not change";
}

    }

}


if(isset($_POST["school_update"]))
{
    $school_update = $_POST["school_update"];
    $sql="UPDATE Users SET school = '$school_update' WHERE usernumber = '$session_usernumber';";
    $session_school = $school_update;
    $_SESSION['school'] = $session_school;
    if(!mysqli_query($con,$sql))
{
    //echo"can not change";
}
}

if(isset($_POST["delete_update"]))
{
    $delete_update = $_POST["delete_update"];
    $sql="INSERT INTO Deleted_messages (usernumber,username, message) 
        SELECT id, '$session_username', message FROM `Messages` 
        WHERE id = '$session_usernumber';";
    
    $sql1="DELETE FROM Messages WHERE id='$session_usernumber'";

        
    if(!mysqli_query($con,$sql))
{
    //echo"can not change";
}
}

if(isset($_POST["description_update"]))
{
    $description_update = $_POST["description_update"];
    $sql="UPDATE Users SET description = '$description_update' WHERE usernumber = '$session_usernumber';";
    $session_description = $description_update;
    $_SESSION['description'] = $session_description;
    if(!mysqli_query($con,$sql))
{
    //echo"can not change";
}
?>
<script type="text/javascript">
           window.location = "home.php";
            </script>
<?
}


if(!mysqli_query($con,$sql1))
{
    //echo"can not change";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?include_once("upperhtml.php")?>
</head>

<!--body-->
<body>

<!--menu bar-->
<div>
<?php    
include('menubar.php');
?>
</div>

<!--body-->

<!--for sharing link-->
<div id="contact-section" class="text">
  <div class="container">
    <div class="section-title center">
        <h2>Settings</h2>

<form action="settings.php" method="post" enctype="multipart/form-data">
    
<h4>Profile Picture: </h4>
<div class="containerab">
  <img src="<?echo $session_pic?>" alt="Avatar" style="width:130px">
  </div>
  
  <a href="profilepic.php" align="center" class="btn btn-default" value="Upload Image">Change picture</a>
  
<h4>Name: </h4>
<input type="text" class="form-control" name="username_update" value="<? echo "$session_username"?>" >

<h4>Email: </h4>
<input type="text" class="form-control" name="email_update" value="<? echo "$session_email"?>" readonly>

<h4>Password: </h4>
<input type="password" class="form-control" name="password_update_1" value="<? echo "$session_password"?>">
<br>
<input type="password" class="form-control" name="password_update_2" value="<? echo "$session_password"?>">

<h4>Personal information: </h4>
<p>Tell us the name of institution you are currently studying/working in.</p>
<input type="text" class="form-control" name="school_update" maxlength="50" value="<? echo "$session_school"?>">
<br>
<p>Tell us the something about yourself in short words.</p>
<input type="text" class="form-control" maxlength="50" name="description_update" value="<? echo "$session_description"?>">
<br>
<p>These details help your friends find you in the member directory.</p>

<h4>Delete messages: </h4>
<p>
    Deleting messages will delete your messages only from public wall. To deletes messages, check the 'Detete messages' option and select 'Save settings'.
</p>

<input type="radio" name="delete_update" value="1"> Delete messages<br>


<a href="home.php" class="btn btn-default">Go back</a>

<button type="submit" align="center" class="btn btn-default" value="Upload Image">Save settings</button>
</form>
</div>
</div>
</div>
  <!--home button-->
<div id="mySidenav" class="sidenav_home">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div id="main_home">
  <ul class="dots">
    <li>
      <a>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-home"></i>
      <?if($no_notf>0)
      {//9776
          ?>
          <mark class="big swing"><?echo $no_notf?></mark></span>
          <?
      }
      ?>
      </a>  
    </li>                 
  </ul> 
</div>
<script>
function openNav() {
            window.location = "home.php";
}
</script>
</div>
</body>


</html>



