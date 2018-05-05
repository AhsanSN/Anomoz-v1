<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
  <br><br>

  <h2>Dashboard</h2>
  <br>
        <div class="containerab">
            <!---->
        <img src="<?echo $session_pic?>" alt="Avatar" style="width:130px">
        </div>
        <br><br>

  <a  href="members.php" class="btn btn-default">Members</a>
  <br>
  <a href="private_dashboard.php" class="btn btn-default">Private messenger</a>
  <br>
  <a href="settings.php" class="btn btn-default">Settings</a>
  <br>
  <a href='home.php?logout=true' class="btn btn-default">logout</a>
  <br>
  <a>Share your link</a>
  
   
  <ul >
        <li><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fanomoz.com%2Ffbshare.php%3Flink%3D<? echo "$session_usernumber"?>&amp;src=sdkpreparse" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
    </a></li>
        
        
        <li><a href="http://www.twitter.com/share?text=Chat with me anonymously! Tell me anything you ever wanted to tell me here. Here: &url=https://anomoz.com/messenger.php?link=<? echo "$session_usernumber"?>" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
    </a></li>
    
      </ul>
      
  <hr>
  
  <?include_once('get_notification.php')?>

</div>

<script>
var close = document.getElementsByClassName("closebtnnot");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; 
        }, 60);
    }
}
</script>

<div id="main">
  <ul class="dots">
    <li>
      <a>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;
     <!-- <a class="w3-xxxlarge"><i class="fa fa-home"></i></a>-->
      <?if($no_notf>0)
      {//9776
          ?>
          <mark class="big swing"><?echo $no_notf?></mark></span>
          <?
      }
      ?>
      </a>  
    </li>                 
  </ul> 
</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
</script>