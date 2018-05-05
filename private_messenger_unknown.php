<?php

include_once('global.php');

if (isset($_GET["encrypt"]))
{
    $id_private = $_GET["encrypt"];
    $orglink = 1//removed;
    $_SESSION['id_private'] = $orglink ;
    $query = "SELECT * FROM Users WHERE usernumber='$orglink' ";
    $result = $con->query($query);
    if ($result->num_rows > 0)
    {
        while($row= $result->fetch_assoc())
        {
        $email_present = $row['email'];
        $usernumber_present = $row['usernumber'];
        $username_present = $row['username'];
        $pic_present = $row['pic'];
        }
    }
}


if($usernumber_present == $session_usernumber)
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
    $sql_mes="INSERT INTO Private_messages(id_to, id_from, message, name_to, name_from, init) VALUES ('$usernumber_present', '$session_usernumber','$new_private_message','$username_present', '$session_username','$usernumber_present')";
    
    if(!mysqli_query($con,$sql_mes))
{
    //echo"can not";
}
    //adding notificatioin
    $notf_query = "SELECT * FROM Notifications WHERE id_to='$usernumber_present' AND id_from = '$session_usernumber' AND notf='pmkr'";
    $result = $con->query($notf_query);
    if ($result->num_rows == 0)
    {
        $notf_query_a="INSERT INTO Notifications(id_to, id_from, name_from ,notf) VALUES ('$usernumber_present', '$session_usernumber','$session_username', 'pmkr')";
    
        if(!mysqli_query($con,$notf_query_a))
        {
            echo"cannot";
        }
        
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
$query = "SELECT * FROM Users WHERE usernumber='$usernumber_present' ";
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
            url: 'private_messenger_unknown.php',
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

  <br> <br>
  <h4>Name?</h4>
<h4>The person is anonymous to you. In other words, this chat was started by that person and he/she chooses to keep themselve hidden.</h4>

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
    return $dtF->diff($dtT)->format('Was online %a days, and %h hours %s seconds ago.');
}
$time_now = time();
$diff = $time_now - $last_login_present;
$status=secondsToTime($diff);
?>
<hr>
<h4>Online status:</h4>
<h4><?echo $status;
?></h4>
<br><br><br><br><br><br><br>

  </div>



<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript">
    
    $(document).ready( function(){
$('#auto').load('getmessages_private_unknown.php');
refresh();

});
 
function refresh()
{
	setTimeout( function() {
	  $('#auto').load('getmessages_private_unknown.php');
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
      <input type="hidden" value="<?echo $id_private?>" name="encrypt" />
  <input  id='comment' autocomplete="off" autofocus="autofocus" type="text" name="new_private_message"  placeholder="Type your message here.." required="required" class="textbox">
  
  <a class="button" href='sendImage.php?encrypt=<?echo $id_private?>&window=7841082642'> Send image</a>
</form>
You are not anonymous to this person.
<?    include_once('navbar.php');?>

</div>

</html>











