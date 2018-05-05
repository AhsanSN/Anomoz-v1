<?
/**
pmus = An unknown has started a chat with you
pmur = An unknown has replied to their chat
pmkr = A known has replied to the chat with you.

md = An unknown has messaged on ur public wall

**/

include_once('global.php');
$no_notf = 0;
$notf_query="SELECT * FROM Notifications Where id_to='$session_usernumber'";
$result = $con->query($notf_query);

if ($result->num_rows > 0) {
    while($row= $result->fetch_assoc())
    {
        $no_notf = $no_notf + 1;
        //pmus
        if ($row['notf'] == 'pmus')
        {
            ?>
            <div class="alert info">
            <span class="closebtnnot" >&times;</span>  
            An anonymous person has started a private chat with you. Head to private messenger to find the chat.
            </div>
        <?
        }
        //pmur
        if ($row['notf'] == 'pmur')
        {
            ?>
            <div class="alert info">
            <span class="closebtnnot" >&times;</span>  
            An uknown person has replied to their private chat.
            </div>
        <?
        }
        //pmkr
        if ($row['notf'] == 'pmkr')
        {
            ?>
            <div class="alert info">
            <span class="closebtnnot" >&times;</span>  
             <?echo $row['name_from']?> has replied to your private chat.
            </div>
        <?
        }
        //md
        if ($row['notf'] == 'md')
        {
            ?>
            <div class="alert info">
            <span class="closebtnnot" >&times;</span>  
             An unknown person has messaged on your public wall.
            </div>
        <?
        }
    }
}
   

?>


<script>
var close = document.getElementsByClassName("closebtnnot");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; 

        <?include_once('delete_notf.php')?>
            
        }, 500,);
    }
    
}
</script>
