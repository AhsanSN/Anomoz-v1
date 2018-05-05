<?php
include_once('global.php');

$target_dir = "profiles/";
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
        $message = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $sql="UPDATE Users SET pic = '$target_file' WHERE usernumber = '$session_usernumber';";
    $session_pic = $target_file;
    $_SESSION['pic'] = $session_pic;
    
    ?>
<script type="text/javascript">
           window.location = "home.php";
            </script>
    <?
    if(!mysqli_query($con,$sql))
{
    $message = "can not change";
}


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
    } else {
        $message = "Sorry, there was an error uploading your file.";
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