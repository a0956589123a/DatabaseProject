<?php

header("Content-Type:text/html; charset=utf-8");

require_once(dirname(__FILE__) . "/config.php");

$place = $_GET['place'];
$sql = "SELECT dID,name FROM device WHERE fID='$place'";//指令
$result = mysqli_query($link,$sql);//執行指令
$sql = "SELECT dID,name FROM device ";//指令
$result2 = mysqli_query($link,$sql);//執行指令
$can_used_device = array();
while($row = mysqli_fetch_row($result)){
    array_push($can_used_device,$row[0]);
}
while($row2 = mysqli_fetch_row($result2)){
    if(in_array($row2[0],$can_used_device)){
    	echo '<div class="device_checkbox">';
	    echo "<input type=\"checkbox\" id=\"".$row2[0]."\" name=\"device[]\" value=\"".$row2[0]."\">";
	    echo "<label for=\"".$row2[0]."\">".$row2[1]."</label>";
	    echo '</div>';
    }
    else{
    	echo '<div  class="device_checkbox_hidden">';
	    echo "<input type=\"checkbox\" id=\"".$row2[0]."\" name=\"device[]\" value=\"".$row2[0]."\">";
	    echo "<label for=\"".$row2[0]."\">".$row2[1]."</label>";
	    echo '</div>';
    }

}

mysqli_close($link);//最後要關起來


?>