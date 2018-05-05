<?php
include_once('global.php');

if ($logged==0)
{
    ?>
            <script type="text/javascript">
           // window.location = "login.php";
            </script>
            <?php
}

$show=true;
$message_query="SELECT * FROM Users ORDER BY username";
    //ORDER BY username
    $result = $con->query($message_query);
    
    
if(isset($_GET["search_members"]))
{
    $show=true;
    $search_members = $_GET["search_members"];
    $message_query="SELECT * FROM Users WHERE username LIKE '%$search_members%'  ORDER BY username";
    //ORDER BY username
    $result = $con->query($message_query);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
<?include_once("upperhtml.php")?>
</head>

<!--menu bar-->
<div>
<?php    
include('menubar.php');
?>
</div>

<body>

<br><br><br>
<form>
<div class="container_members">
  <div class="field-input_members">
    <input autofocus="autofocus" name="search_members" type="text" placeholder="Search members"/><span> </span>
  </div>
</div>
</form>

 <?php

?>


<?php
if ($show==true)
{
if ($result->num_rows > 0) {
    while($row= $result->fetch_assoc())
    {
        ?>
        <br>
        <div class="members_center">
<figure class="snip1578">
  <img src="<?echo $row['pic']?>" alt="profile-sample6" />
    <h3><?echo $row['username'];?></h3>
    <h5><?echo $row['school'];?></h5>
    <h4><?echo $row['description'];?></h4>
    <br>
    <div class="icons">
        <a  href='messenger.php?link=<?echo $row['usernumber'];?>' align="center"  >Public message</a>
        |
        <a  href='private_messenger.php?link=<?echo $row['usernumber'];?>' align="center" >Private message</a>
    </div>
</figure>
<div>
        <?
    }

}
else
{
    if(!isset($_GET["search_members"]))
    {
        echo"<h3>"."Type a name in the search bar to search."."</h3>";
    }
    else
    {
    echo"<h3>"."Oops! can't find any members. Searching a short name might help."."<h3>";
    }
}
}
?>
 
  <br>
  
  
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