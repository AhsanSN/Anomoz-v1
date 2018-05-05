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
        <h2>Upload Profile Picture.</h2>

<form action="upload_pic.php" method="post" enctype="multipart/form-data">
    
    <h3>Select image to upload:</h3>
    <input type="file" name="fileToUpload" id="fileToUpload"  class="btn btn-default">
    
<a href="settings.php" class="btn btn-default">Go back</a>

<button type="submit" align="center" class="btn btn-default" value="Upload Image"  name="submit">Upload picture</button>
</form>
</div>
</div>
</div>
</body>


</html>
<span id="_"></span>


