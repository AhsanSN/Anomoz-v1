<?

  if (isset($_GET['redirectlink'])) {
      $orglink_e = $_GET['redirectlink'];
      $orglink = 1//removed;
      
      session_start();
      $_SESSION['private_link'] = $orglink;
      header("location: private_messenger_unknown.php");
      Exit();
  }
  
?>