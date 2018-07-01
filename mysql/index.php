<?php 
include_once 'connectdb.php';
?>
<?php
$target = 1;
$match = 10;
if (isset($_REQUEST["target"])){
    $target = $_REQUEST["target"];
}
$query="SELECT *"
      ." FROM `tbl`"
      ." WHERE ID BETWEEN $target AND ($target + ($match - 1) )";
$result=mysqli_query($conn, $query);
if (mysqli_num_rows($result)>0) {
    while ($row= mysqli_fetch_array($result)){
        echo "<br>" . $row["ID"] . " " . $row["NAME"] . " " . $row["EMAIL"];
    }
}else {
    echo "No rows";
}
?>
<br>
<a href="index.php?target=<?php echo $target + $match;?>" class="btn">next</a>
<?php 
include_once 'footerConnectdb.php';
?>