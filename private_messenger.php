<?php

include_once('global.php');

if (isset($_GET["link"]))
{
    $id_private = $_GET["link"];
    $_SESSION['id_private'] = $id_private ;
    $query = "SELECT * FROM Users WHERE usernumber='$id_private' ";
    $result = $con->query($query);
    if ($result->num_rows > 0){
        while($row= $result->fetch_assoc())
        {
        $email_present = $row['email'];
        $username_present = $row['username'];
        $pic_present = $row['pic'];
        }
    }
    else
    {
        ?>
            <script type="text/javascript">
            window.location = "messenger_error.php";
            </script>
            <?php
    }
}
else
{
    ?>
            <script type="text/javascript">
            window.location = "messenger_error.php";
            </script>
            <?php
}

if($id_private == $session_usernumber)
{
    ?>
    <script type="text/javascript">
    window.location = "own_private_message_error.php";
    </script><?
    Exit();
}

if(isset($_GET["new_private_message"]))
{
    $new_private_message = $_GET["new_private_message"];
    $id_private = $_GET["link"];
    
    $sql_mes="INSERT INTO Private_messages(id_to, id_from, message, name_to, name_from, init) VALUES ('$id_private', '$session_usernumber','$new_private_message','$username_present', '$session_username','$session_usernumber')";
    
    if(!mysqli_query($con,$sql_mes))
{
    //echo"can not";
}
    //adding notificatioin
    $notf_query = "SELECT * FROM Notifications WHERE id_to='$id_private' AND id_from ='$session_usernumber' AND notf='pmus'";
    $result_pmus = $con->query($notf_query);
    if ($result_pmus->num_rows == 0)
    {
        $notf_query_a="INSERT INTO Notifications(id_to, id_from, name_from ,notf) VALUES ('$id_private', '$session_usernumber','$session_username', 'pmus')";
    
        if(!mysqli_query($con,$notf_query_a))
        {
            echo"cannot";
        }
        
    }
    
    //adding notificatioin
    $notf_query_pmur = "SELECT * FROM Notifications WHERE id_to='$id_private' AND id_from ='$session_usernumber' AND notf='pmur'";
    $result_pmur = $con->query($notf_query_pmur);
    if (($result_pmur->num_rows == 0) && ($result_pmus->num_rows>0))
    {
        $notf_query_b="INSERT INTO Notifications(id_to, id_from, name_from ,notf) VALUES ('$id_private', '$session_usernumber','$session_username', 'pmur')";
    
        if(!mysqli_query($con,$notf_query_b))
        {
            echo"cannot";
        }
        
    }

}

$start_chat = "SELECT * FROM Private_chats WHERE started_by = '$session_usernumber' AND message_for = '$id_private' ";
    $start_chat_result = $con->query($start_chat);
    
    if ($start_chat_result->num_rows == 0) 
    {
        $sql_new_chat="INSERT INTO Private_chats(started_by, message_for, name_by, name_for) VALUES ('$session_usernumber', '$id_private', '$session_username', '$username_present' )";
         $sql_new_chat_result = $con->query($sql_new_chat);
        if(!mysqli_query($con,$sql_new_chat_result))
        {
             //echo "can not";
        }
    }


if ($logged==0)
{
    ?>
            <script type="text/javascript">
            window.location = "login.php";
            </script>
            <?php
}

//showing last login 2
$query = "SELECT * FROM Users WHERE usernumber='$id_private' ";
    $result = $con->query($query);
    if ($result->num_rows > 0){
        while($row= $result->fetch_assoc())
        {
        $last_login_present = $row['last_logged_in'];
        }
    }



//

?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php    
include_once('upperhtml.php');
?>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'get',
            url: 'private_messenger.php',
            data: $('form').serialize(),
            success: function () {
                $('#comment').val('');
            }
          });

        });

      });
    </script>
</head>

<!--body-->
<body>
<!--menu bar-->
<?php    
include_once('menubar.php');
?>


<div class="columnsContainer">
    <br><br><br><br><br>
  <div class="leftColumn">
    
<div id="auto"></div>

</div>
<br><br>

<br>
<div class="rightColumn">
    <br><br><br><br><br>

<h2>Private message</h2><hr>



 <div class="containerab">
        <img src="<?echo $pic_present?>" alt="Avatar" style="width:130px">
        </div>
  
  <br> <br>
  <h4>Name:</h4>
<h4><?echo $username_present?></h4>
<br>

<?
//showing last login
function secondsToTime($seconds) {
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$seconds");
    if (($seconds < 0))
    {
        $seconds = -1 * $seconds;
    }
    if ($seconds <= 20)
    {
        return $dtF->diff($dtT)->format('Online.');
    }
    if ($seconds/3600 <= 1)
    {
        return $dtF->diff($dtT)->format('Was online %i minutes ago.');
    }
    if ($seconds/86400 <= 24)
    {
        return $dtF->diff($dtT)->format('Was online %h hours, and %i minutes ago.');
    }
    return $dtF->diff($dtT)->format('Was online %a days, and %h hours ago.');
}
$time_now = time();
$diff = $time_now - $last_login_present;
$status=secondsToTime($diff);
?>
<hr>
<h4>Online status:</h4>
<h4><?echo $status?></h4>
<br><br><br><br><br><br><br>


  </div>



<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript">
    
    $(document).ready( function(){
$('#auto').load('getmessages_private_them.php');
refresh();

});
 
function refresh()
{
	setTimeout( function() {
	  $('#auto').load('getmessages_private_them.php');
	  refresh();
	}, 500);
}
</script>

</body>
<!--message box-->
</div>


</div>
    </div>

</body>


<div class="footer">
  <form method="get" class="search_footer" name="sentMessage" id="contactForm" novalidate >
      <input type="hidden" value="<?echo $id_private?>" name="link" />
  <input  id='comment' autocomplete="off" autofocus="autofocus" type="text" name="new_private_message"  placeholder="Type your message here.." required="required" class="textbox">
  <a class="button" href='sendImage.php?link=<?echo $id_private?>&window=2451875482'> Send image</a>
</form>
You are sending a private anonymous message.
<?    include_once('navbar.php');?>

</div>
</html>











