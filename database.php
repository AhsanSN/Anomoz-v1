<!--database connection-->
<?php
    
$host='localhost';
$username='username';
$user_pass='password';
$database_in_use='anomoz_chat';

$con = mysqli_connect($host,$username,$user_pass,$database_in_use);
if (!$con)
{
    echo"not connected";
}
if (!mysqli_select_db($con,$database_in_use))
{
    echo"database not selected";
}
?>