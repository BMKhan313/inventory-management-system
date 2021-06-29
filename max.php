<?php
 //require_once('connect.php');
 	$sql = "SELECT Max($col) as max_code from $table ";
	$result = $con->query($sql) or die('failed to run query');
	$row = $result->fetch_assoc();
 	$max = $row['max_code']+1;

?>
