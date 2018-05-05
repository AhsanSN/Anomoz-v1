
<?include_once("global.php");
//updating last login

$updated_time = time();
$sql="UPDATE Users SET last_logged_in = '$updated_time' WHERE usernumber = '$session_usernumber';";
    if(!mysqli_query($con,$sql))
{
    //echo"can not change";
}
//

$chat_query="SELECT * FROM Private_chats Where (message_for='$session_usernumber' OR started_by='$session_usernumber')";
$result_chat = $con->query($chat_query);

if ($result_chat->num_rows > 0) 
{
    while($row= $result_chat->fetch_assoc())
    {
         echo $row['message_for'];
         echo "<a target='_blank' href='#' class='btn btn-default'>asdasd</a>";

    }
}

echo "<a target='_blank' href='#' class='btn btn-default'>asdasd</a>";
?>


<div> <!-- class="vertical-menu"-->

<?php

if ($result_chat->num_rows > 0) {
    while($row= $result->fetch_assoc())
    {
        ?>
        <div class="containera">
        jnlkasd
        </div>
        <?
    }

}

?>
 
  <br>
</div>

