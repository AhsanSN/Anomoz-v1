<?
include_once("database.php");

if(isset($_GET["license"])){
    $key = $_GET["license"];
    $query = "SELECT * FROM licenses WHERE keyVal = $key AND available=1 ";
        $result = $con->query($query);
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc())
            {
               
                ?>
                <h1>Your confirmation key is: <? echo $row['confirmation'];?></h1>
                <?
            }
            $sql="UPDATE licenses SET available = 0 WHERE keyVal = $key;";
            if(!mysqli_query($con,$sql))
             {
             //echo"can not change";
         }
        }
        else
        {
            ?>
                <h1>Your license key is either invalid or is already in use</h1>
                <?
        }
}

?>