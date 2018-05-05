<?include_once("global.php");

if (isset($_GET["link"]))
{
    $id = $_GET["link"];
    $_SESSION['id'] = $id;

    ?>
    <script type="text/javascript">
window.location = "https://anomoz.com/messenger.php?link=<?echo $id?>";
</script>
    <?
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Chat with me anonymously</title>
<meta name="description" content="Chat with me anonymously! Tell me anything you wanted to ever tell me. ">
<meta name="image" content="https://anomoz.com/img/01.jpg">
<meta name="author" content="">

<meta property="og:url"           content="https://www.anomoz.com/fbshare.php" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Chat with me anonymously" />
  <meta property="og:description"   content="Chat with me anonymously! Tell me anything you wanted to ever tell me." />
  <meta property="og:image"         content="https://anomoz.com/img/01.jpg" />

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/modernizr.custom.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]
    
    <meta property="og:url"           content="https://www.anomoz.com/fbshare.php" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Chat with me anonymously" />
  <meta property="og:description"   content="Chat with me anonymously! Tell me anything you wanted to ever tell me.ok " />
  <meta property="og:image"         content="https://anomoz.com/img/01.jpg" />
  -->
  
</head>
<body>
    

</body>
</html>