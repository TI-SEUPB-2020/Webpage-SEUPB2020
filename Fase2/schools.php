<?php
	include 'db_connection.php';
	$consult = "select school_name, title, description from schools";
	$result = mysqli_query($db_connection, $consult);
	$rows = array();
	while($row = mysqli_fetch_assoc($result)) {
	    $rows[] = $row;
	}
	print json_encode($rows);
?>