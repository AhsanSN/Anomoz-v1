<?php 

include_once("global.php");

if ($logged==1)
{
    ?>
            <script type="text/javascript">
            window.location = "home.php";
            </script>
            <?php
}
if(isset($_POST["email"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    //error handling
    if((!$email)||(!$password)){
    $message = "Please insert both fields.";}
    else{
        //secure data
        //$email = mysql_real_escape_string($email);
        //$password = sha1($password);
        $sql = "SELECT email, password FROM Users WHERE email lIKE '$mail1'";
        $result = $con->query($sql);
        
     //AND password=$password"  or die("could not check member")
        $query = "SELECT *  FROM Users WHERE email LIKE '$email' AND password='$password' ";
        $result = $con->query($query);
        if ($result->num_rows > 0){
        }
        else
        {
            ?>
            <!DOCTYPE html>
<html lang="en">
<head>
<?php    
include_once('upperhtml.php');
include_once('global.php');
?>
</head>

<!--body-->
<body>
<!--menu bar-->
<?php    
include_once('menubar.php');
?>

<div id="portfolio-section" class="text-center">
  <div class="container">
    <div class="section-title center">
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
<h2>Entered information was incorrect.</h2><hr>
<h4></h4>
</div></div></div>
</body>
</html>
            <?php
            
            exit();
        }
        //$count_query = mysql_num_rows($query);
        if($result ==0) {
            $message="Information was incorrect";
            ?>
            <!DOCTYPE html>
<html lang="en">
<head>
<?php    
include_once('upperhtml.php');
include_once('global.php');
?>
</head>

<!--body-->
<body>
<!--menu bar-->
<?php    
include_once('menubar.php');
?>

<div id="portfolio-section" class="text-center">
  <div class="container">
    <div class="section-title center">
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
<h2>Entered information was incorrect.</h2><hr>
<h4></h4>
</div></div></div>

</body>
</html>
            <?php
        }
        else
        {
            //start session
            
            while($row = $result->fetch_assoc())
            {
                $username = $row['username'];
                $usernumber = $row['usernumber'];
                $email = $row['email'];
                $school = $row['school'];
                $description = $row['description'];
                $delete = $row['delete'];
                $pic = $row['pic'];
            }
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['usernumber'] = $usernumber;
            $_SESSION['email'] = $email;
            $_SESSION['school'] = $school;
            $_SESSION['description'] = $description;
            $_SESSION['delete'] = $delete;
            $_SESSION['pic'] = $pic;
            ?>
            <script type="text/javascript">
            window.location = "home.php";
            </script>
            <?php
        }
    }
}
?>

            
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login - Chat</title>
<meta name="description" content="">
<meta name="author" content="">
</head>
<body>
<?php
include"menubar.php";
include"database.php";

?>

<!--Contact Section-->
<div id="contact-section" class="text-center">
  <div class="container">
    <div class="section-title center col-md-8 col-md-offset-2">
      <h2>Login</h2>
      <h3>Connect to your friends</h3>
      <form action="login.php" method="post">
            <div class="center">
                
              <input  autofocus="autofocus" name="email" type="email"  class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
              
              <input name="password" type="password"  class="form-control" placeholder="Password" required="required">
              <p class="help-block text-danger"></p>
              
            
        <button type="submit" class="btn btn-default" value="Submit">Login</button>
        </div>
      </form>
      <h3>If you don't have an account, <a href="signin.php" > signup here.</a></h3>
    </div>
  </div>
</div>

</body>
</html>


