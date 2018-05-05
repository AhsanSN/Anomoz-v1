<?php 

ini_set('session.cookie_lifetime', 60 * 60 * 24 * 100);
ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 100);
//maybe you want to precise the save path as well
ini_set('session.save_path', 'sessions');

session_start();
include_once("database.php");

//cheaking
if(isset($_SESSION['username']))
{
    $session_usernumber = $_SESSION['usernumber'];
    $session_username = $_SESSION['username'];
    $session_password = $_SESSION['password'];
    $session_email = $_SESSION['email'];
    $session_ip = $_SESSION['ip'];
    $session_school = $_SESSION['school'];
    $session_description = $_SESSION['description'];
    $session_pic = $_SESSION['pic'];
    $session_delete = $_SESSION['delete'];


//if memebr logged in
$query = "SELECT *  FROM Users WHERE username='$session_username' AND password='$session_password' ";
$result = $con->query($query);
if ($result->num_rows > 0){
    $logged=1;
    
}
else
{
    //echo"logging out";
    header("Location: logout.php");
}
}
else
{
        //echo"user logged out";
        $logged=0;
}

/*
if(isset($_COOKIE['id_cookie']))
{
    $session_id = $_COOKIE['id_cookie'];
    $session_password = $_COOKIE['password_cookie'];


//if memebr logged in
$query = "SELECT *  FROM Users WHERE id='$session_id' and password='$session_password' LIMIT 1 ";
$result = $con->query($query);
if ($result->num_rows > 0){
      $_SESSION['username'] = $session_username;
      $_SESSION['password'] = $session_password;
      $_SESSION['id'] = $session_id;
      
    $logged=1;
    echo"user logged in";
}
else
{
    header("Location: logout.php");
}
}
else
{
        echo"user logged out";
        $logged=0;
}
*/

?>