<?
include"database.php";

if(isset($_POST["name"]))
{
    $name=$_POST['name'];

    $sql="INSERT INTO Messages(id, message, time, me) VALUES ('1', '$name',now(),'1')";
    if(!mysqli_query($con,$sql))
    {
    echo"can not";
    }
}



?>