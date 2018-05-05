<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sign in - Chat</title>
<meta name="description" content="">
<meta name="author" content="">
</head>
<body>
<?php
include"menubar.php";
include"database.php";

?>

<!--Contact Section-->
<div id="contact-section" class="text-center">
  <div class="container">
    <div class="section-title center col-md-8 col-md-offset-2">
      <h2>Signup</h2>
      <h3>Create an account in no time.</h3>
      <form action="user_signin.php" method="post">
            <div class="center">
                
              <input  autofocus="autofocus" name ="username" type="text" class="form-control" placeholder="Name" required="required">
              <p class="help-block text-danger"></p>
            
              <input name="email" type="email"  class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
              
              <input name="password" type="password"  class="form-control" placeholder="Password" required="required">
              <p class="help-block text-danger"></p>
              
            </div>

        <button type="submit" class="btn btn-default" value="Insert">Signup </button>
      </form>
    </div>
  </div>
</div>

</body>
</html>


