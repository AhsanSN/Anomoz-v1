<?php
//home.php
include_once('global.php');

if(isset($_POST["new_message"]))
{
    $new_message = $_POST["new_message"];
    $sql="INSERT INTO Messages(id, message, time, me) VALUES ('$session_usernumber', '$new_message',now(),'1')";
    if(!mysqli_query($con,$sql))
{
    echo"can not";
}

}

function runMyFunction() {
    echo 'Logging out...';
    session_destroy();
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("upperhtml.php");?>

  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'home.php',
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
<div>
<?php    
include('menubar.php');
?>
</div>

<!--body-->

<!--for sharing link-->
<div id="contact-section" class="text-center">
  <div class="container">
    <div class="section-title center">
        <h2><? echo"Public Wall";?></h2>
<h4><? echo"Name: "."$session_username";?></h4><hr>


<div id="auto"></div>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript">
    
    $(document).ready( function(){
$('#auto').load('getmessages_home.php');
refresh();

});
 
function refresh()
{
	setTimeout( function() {
	  $('#auto').load('getmessages_home.php');
	  refresh();
	}, 500);
}
</script>

 </div>
 </div>
 </div>
<br><br><br>

</body>

<div class="footer">
  <form  method="get" class="search_footer" name="sentMessage" id="contactForm" novalidate >
  <input  id='comment' autocomplete="off" autofocus="autofocus" type="text" name="new_message"  placeholder="Type your message here.." required="required" class="textbox">
</form>

<?php include_once("navbar.php")?>

  

This is your public wall i.e. messages here can be seen by everyone.
</div>

</html>

