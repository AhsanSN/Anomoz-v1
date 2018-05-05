<?php
//home.php
include_once('global.php');

function runMyFunction() {
    echo 'Logging out...';
  }

  if (isset($_GET['logout'])) {
    runMyFunction();
    $logged=0;
  }
  
if ($logged==0)
{
    ?>
            <script type="text/javascript">
            window.location = "login.php";
            </script>
            <?php
}

$message_query_p_s="SELECT * FROM Private_chats Where started_by='$session_usernumber'";
$result_s = $con->query($message_query_p_s);

$message_query_p_r="SELECT * FROM Private_chats Where message_for='$session_usernumber'";
$result_r = $con->query($message_query_p_r);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("upperhtml.php");?>
</head>

<!--body-->
<body>

<!--menu bar-->

<?php    
include('menubar.php');
?>
<!--body-->

<br><br><br><br><br>
<div class="row_p">
<div class="column_p">
<div class="vertical-menu_p">
  <a href="#" class="active">Started chats</a>
<?php
if ($result_s->num_rows > 0) {
    while($row_s= $result_s->fetch_assoc())
    {
        echo "<a href='https://anomoz.com/private_messenger.php?link=". $row_s['message_for']."'>".$row_s['name_for']."</a>";
    }
}
else
{
    echo"Oops! You have not yet messaged anyone. Why not find your friends in the member directory and message them."."<hr><a href='members.php'>Member directory</a>";
}
?>

</div>
</div>

<div class="column_p">
<div class="vertical-menu_p">
  <a href="#" class="active">Received chats</a>
  <?php 
  //
if ($result_r->num_rows > 0) {
    while($row_r= $result_r->fetch_assoc())
    {
        $number = 1//hidden;
        echo "<a href='private_messenger_unknown.php?encrypt=".$number."'>"."Uknown: ". $row_r['no']."</a>";
    }
}
else
{
    echo"Oops! No one has started a conversation with you yet!";
}
?>

</div>
</div>
</div>

 <br><br><br>
<!--home button-->
<div id="mySidenav" class="sidenav_home">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div id="main_home">
  <ul class="dots">
    <li>
      <a>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-home"></i>
      <?if($no_notf>0)
      {//9776
          ?>
          <mark class="big swing"><?echo $no_notf?></mark></span>
          <?
      }
      ?>
      </a>  
    </li>                 
  </ul> 
</div>
<script>
function openNav() {
            window.location = "home.php";
}
</script>
</div>
</body>

</html>

