 <script src="js/app.js"></script> 
<?php
/**
$current_timestamp = time();
echo $current_timestamp;

function secondsToTime($seconds) {
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
}

echo"   ";
echo secondsToTime($current_timestamp);
**/
?>

<!doctype html>
<html>
<head>
    <title>Web notifications</title>
    <script>
        if ("Notification" in window)
        {
            let ask = Notification.requestPermission();
            ask.then(permission =>
            {
                let msg = new Notification("Title",
                {
                    body: "hello",
                    
                });
                msg.addEventListener("click", event => 
                {
                   alert("recived"); 
                });
            }
            );
        }
    </script>
</head>
</html>

