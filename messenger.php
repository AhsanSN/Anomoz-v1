<?php

include_once('global.php');

if(!isset($_SESSION['my_color']))
{
    $a = (mt_rand(1,256));
    $b = (mt_rand(1,256));
    $c = (mt_rand(1,256));
    $ip=$_SERVER['REMOTE_ADDR'];
   $my_color = sprintf("#%02x%02x%02x", $a,$b,$c); // #0d00ff
   $_SESSION['my_color'] = $my_color;
}


if (isset($_GET["link"]))
{
    $user_ip=$_SERVER['REMOTE_ADDR'];
    $id_public = $_GET["link"];
    session_start();
    $_SESSION['id_public'] = $id_public ;
    $query = "SELECT * FROM Users WHERE usernumber='$id_public' ";
    $result = $con->query($query);
    if ($result->num_rows > 0){
        while($row= $result->fetch_assoc())
        {
        $email_present = $row['email'];
        $username_present = $row['username'];
        $pic_present = $row['pic'];
        $last_login_present = $row['last_logged_in'];
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

if(isset($_GET["new_message"]))
{
    $new_message = $_GET["new_message"];
    $id_public = $_GET["link"];
    $my_color = $_SESSION['my_color'];
    $sql="INSERT INTO Messages (id, message, time, me,color) 
        VALUES ('$id_public', '$new_message',now(),'0','$my_color')";
    if(!mysqli_query($con,$sql))
{
    //echo"can not";
}

    //adding notificatioin
    $notf_query = "SELECT * FROM Notifications WHERE id_to='$id_public' AND name_from ='$user_ip' AND notf='md'";
    $result = $con->query($notf_query);
    if ($result->num_rows == 0)
    {
        $notf_query_a="INSERT INTO Notifications(id_to, id_from, name_from ,notf) VALUES ('$id_public', '0','$user_ip', 'md')";
    
        if(!mysqli_query($con,$notf_query_a))
        {
            echo"cannot";
        }
    }
}

if ($logged==0)
{
    $end_message= "Messages here will be public. For private message, please ".
    "<a href='login.php'>Login</a>";
}
if ($logged==1)
{
    $end_message= "Messages here will be public. For private message, go ".
    "<a href='private_messenger.php?link=$id_public'>here</a>";
}
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
            url: 'messenger.php',
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

<h2>Public Wall</h2><hr>



 <div class="containerab">
        <img src="<?echo $pic_present?>" alt="Avatar" style="width:130px">
        </div>
  
  <br> <br>
  <h4>Name:</h4>
<h4><?echo $username_present?></h4>
<?
//showing last login
function secondsToTime($seconds) {
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$seconds");
    if (($seconds < 0))
    {
        $seconds = -1 * $seconds;
    }
    if (($seconds <= 20))
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
$('#auto').load('getmessages_messenger.php');
refresh();

});
 
function refresh()
{
	setTimeout( function() {
	  $('#auto').load('getmessages_messenger.php');
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
      <input type="hidden" value="<?echo $id_public?>" name="link" />
  <input  id='comment' autocomplete="off" autofocus="autofocus" type="text" name="new_message"  placeholder="Type your message here.." required="required" class="textbox">

</form>
<?echo $end_message?>
</div>

<?php 
if ($logged==1)
{
    ?>
     <div class="footer">
    <?include_once("navbar.php");?>
    </div>
    <?
}
?>
</html>











