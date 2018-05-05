<?php

include_once('global.php');

$messages_amount_1 = $_SESSION['messages_amount'];

$message_query="SELECT * FROM Messages Where id='$session_usernumber' ORDER BY no";
$result = $con->query($message_query);

//updating last login

$updated_time = time();
$sql="UPDATE Users SET last_logged_in = '$updated_time' WHERE usernumber = '$session_usernumber';";
    if(!mysqli_query($con,$sql))
{
    //echo"can not change";
}
//

?>
<ul class="qw">
<?php
if ($result->num_rows > 0) {
    while($row= $result->fetch_assoc())
    {
        if ($row['me'] ==1)
        {
            ?><li class="me er"><?echo $row['message'];?></li><?
            
        }
        else
        {
            ?><li class="him er" style="background-color: <?echo $row['color']?>"><?echo $row['message'];?></li><?
        }
    }

}
else
{
    echo"Oops! You don't have any messages.";
}

$_SESSION['messages_amount'] =  $result->num_rows;

$messages_amount = $result->num_rows;
if( $result->num_rows > $messages_amount_1)
{
    ?>
    <audio id="myAudio" controls autoplay hidden>
  <source src="audio/notf_sound.ogg" type="audio/ogg">
</audio>
    <?
}
?>
</ul>


