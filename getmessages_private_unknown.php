<?php

include_once('global.php');
$messages_amount_1 = $_SESSION['messages_amount_d'];
$id_private = $_SESSION['id_private'] ;

//updating last login

$updated_time = time();
$sql="UPDATE Users SET last_logged_in = '$updated_time' WHERE usernumber = '$session_usernumber';";
    if(!mysqli_query($con,$sql))
{
    //echo"can not change";
}
//



$message_query = "SELECT * FROM Private_messages WHERE (id_to='$id_private' AND id_from='$session_usernumber') OR (id_from='$id_private' AND id_to='$session_usernumber') AND init = '$id_private' ORDER BY no;";

$result = $con->query($message_query);


?>
<ul class="qw">
<?php
if ($result->num_rows > 0) {
    while($row= $result->fetch_assoc())
    {
        if ($row['isLink'] != 1 )
        {
        if ($row['id_from'] == $id_private)
        {
            ?><li class="him er"><?echo $row['message'];?></li><?
        }
        else
        {
            ?><li class="me er"><?echo $row['message'];?></li><?
        }
        }
        if ($row['isLink'] == 1 )
        {
            if ($row['id_from'] == $id_private)
        {
            
            ?><li class="him er"><img src="<?echo $row['link']?>" alt="Avatar" style="width:330px"></li><?
        }
        else
        {
            ?><li class="me er"><img src="<?echo $row['link']?>" alt="Avatar" style="width:330px"></li><?
        }
            
        }
    }

}
else
{
   echo"You have entered an incorrect URL. There exist no person behind this encrypted link $id_private";
}

$_SESSION['messages_amount_d'] =  $result->num_rows;

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