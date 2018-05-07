<?php
global $math, $english,$kiswahili,$total,$average;
//The code below will capture data from the user form and stor
	$name=$_GET['name'];
	$math=$_GET['math'];
    $english=$_GET['english'];
    $kiswahili=$_GET['kiswahili'];
    $total= $math+$english+$kiswahili;
    $average= $total/3;
    echo '<div class="alert alert-success">';
    echo"<p>";
    echo "Average>".$group.".."."Score is=>".$average;
    echo"</p>";
    echo"<p>";
    echo "The Total Score is:".$total;
    echo"</p>";
    
    echo "</div>";


?>
