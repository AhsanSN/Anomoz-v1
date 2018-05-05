<?php

/**
#a100ff
#c056ff
#dd15ef
#af54b7
#af1c8d
#894d7b
#8c518c
 
 
 **/
include_once('global.php');

//updating last login

if($logged==1)
{
$updated_time = time();
$sql="UPDATE Users SET last_logged_in = '$updated_time' WHERE usernumber = '$session_usernumber';";
    if(!mysqli_query($con,$sql))
{
    //echo"can not change";
}
}
//showing last login 2
$query = "SELECT * FROM Users WHERE usernumber='$id_public' ";
    $result = $con->query($query);
    if ($result->num_rows > 0){
        while($row= $result->fetch_assoc())
        {
        $last_login_present = $row['last_logged_in'];
        }
    }



//
$messages_amount_1 = $_SESSION['messages_amount'];
$id_public = $_SESSION['id_public'] ;


if (isset($_GET["link"]))
{
    $id_public = $_GET["link"];
}


$message_query="SELECT * FROM Messages Where id='$id_public' ORDER BY no";
$result = $con->query($message_query);


?>
<ul class="qw">
<?php
if ($result->num_rows > 0) {
    while($row= $result->fetch_assoc())
    {
        if ($row['me'] ==0)
        {
            ?><li class="me er" style="background-color: <?echo $row['color']?>"><?echo $row['message'];?></li><?
        }
        else
        {
            ?><li class="him er"  style="color:purple "><?echo $row['message'];?></li><?
        }
    }

}
else
{
    echo"Oops! The person doesn't have any messages";
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
