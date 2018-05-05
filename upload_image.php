<?php
include_once('global.php');

if (isset($_GET["window"]))
{
    //7841082642 = unknown
    //2451875482 = known
    $window =  $_GET["window"];
}

if($window ==7841082642)
{
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
}
if($window ==2451875482)
{
if (isset($_GET["encrypt"]))
{
    $id_private = $_GET["encrypt"];
    $orglink =$id_private;
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
}

$target_dir = "sendimages/";
$target_file = $target_dir . "Anomoz_"."$session_usernumber".basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    ?>
    <!--<div class="loader"></div>-->

    <?
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $message =  "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $message = "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    $message = "Sorry, your file is too large.";
    ?>
            <?php
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $message = "Sorry, your file was not uploaded.";

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $message = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been sent.";
        $sql="INSERT INTO Private_messages(id_to, id_from, message, name_to, name_from, init,isLink, link) VALUES ('$usernumber_present', '$session_usernumber','none','$username_present', '$session_username','$usernumber_present','1','$target_file')";

    
echo "redirecting from ".$window;

//

$old_filename=$target_file;

$image = imagecreatefromjpeg($old_filename);
$filename = $old_filename;
$thumb_width = 660;
$thumb_height = 660;
$width = imagesx($image);
$height = imagesy($image);
$original_aspect = $width / $height;
$thumb_aspect = $thumb_width / $thumb_height;
if ( $original_aspect >= $thumb_aspect )
{
   // If image is wider than thumbnail (in aspect ratio sense)
   $new_height = $thumb_height;
   $new_width = $width / ($height / $thumb_height);
}
else
{
   // If the thumbnail is wider than the image
   $new_width = $thumb_width;
   $new_height = $height / ($width / $thumb_width);
}
$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );
// Resize and crop
imagecopyresampled($thumb,
                   $image,
                   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                   0, 0,
                   $new_width, $new_height,
                   $width, $height);
imagejpeg($thumb, $filename, 80);
//
if($window ==7841082642)
{
    $link= $_GET['encrypt'];
    ?>
    <script type="text/javascript">
           window.location = "private_messenger_unknown.php?encrypt=<?echo $link?>";
    </script>
    <?
}
//2451875482
if($window ==2451875482)
{
    $link= $_GET['encrypt'];
    ?>
    <script type="text/javascript">
           window.location = "private_messenger.php?link=<?echo $link?>";
    </script>
    <?
}
    if(!mysqli_query($con,$sql))
{
    $message = "can not change";
}
    } else {
        $message = "Sorry, there was an error uploading your image.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<?php    
include_once('upperhtml.php');
include_once('global.php');
?>
</head>

<!--body-->
<body>
<!--menu bar-->
<?php    
include_once('menubar.php');
?>

<div id="portfolio-section" class="text-center">
  <div class="container">
    <div class="section-title center">
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
<h2><?echo $message?></h2><hr>
<h4></h4>
</div></div></div>

</body>
</html>