<?
include_once('global.php');
if ($logged==0)
{
    ?>
            <script type="text/javascript">
            window.location = "login.php";
            </script>
            <?php
}

$sql1="DELETE FROM Notifications WHERE id_to='$session_usernumber'";
if(!mysqli_query($con,$sql1))
{
    echo"can not change";
}

?>