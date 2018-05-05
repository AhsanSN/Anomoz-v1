<?php
include_once('global.php');

if ($logged==0)
{
    ?>
            <script type="text/javascript">
            window.location = "login.php";
            </script>
            <?php
}

if (isset($_GET["window"]))
{
    //7841082642 = unknown
    //2451875482 = known
    $window =  $_GET["window"];
}


if (isset($_GET["encrypt"]))
{
    $id_private = $_GET["encrypt"];
    $orglink = ($id_private/2)-14647290726572;
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

if (isset($_GET["link"]))
{
    $id_private = $_GET["link"];
    $orglink = $id_private;
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
?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php    
include_once('upperhtml.php');
?>
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
<div id="contact-section" class="text">
  <div class="container">
    <div class="section-title center">
        <h2>Send a picture</h2>

<?
?>
<form action="upload_image.php?encrypt=<?echo $id_private?>&window=<?echo $window?>" method="post" enctype="multipart/form-data">
    
    <h3>Select image to upload:</h3>
    <input type="file" name="fileToUpload" id="fileToUpload"  class="btn btn-default">
    
<button type="submit" align="center" class="btn btn-default" value="Upload Image"  name="submit">Send Picture</button>
</form>
</div>
</div>
</div>
</body>


</html>
<span id="_"></span>

