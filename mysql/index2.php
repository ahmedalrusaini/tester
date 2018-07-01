<?php 
include_once 'connectdb.php';
?>
<?php
$target = 1;
$match = 10;
if (isset($_REQUEST["target"])){
    $target = $_REQUEST["target"];
}
if (isset($_REQUEST["match"])){
    $match = $_REQUEST["match"];
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
<div>
<a href="index2.php?target=<?php echo $target + $match;?>&match=<?php echo $match;?>" class="btn">N</a>
<a href="index2.php?target=<?php echo $target - $match;?>&match=<?php echo $match;?>" class="btn">P</a>
<form action="index2.php">
<input id="match" name="match" max="50" min="5" step="5" type="range" value="5" class="slider" />
<input type="text" name="target" />
<input type="submit" value="Enter" />
</form>
<div id="viewMatch"></div>
<script type="text/javascript">
var slider = document.getElementById("match");
var output = document.getElementById("viewMatch");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
    output.innerHTML = this.value;
}
</script>

</div>
<?php 
include_once 'footerConnectdb.php';
?>