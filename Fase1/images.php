<?php
	include 'db_connection.php';
	$idSchool = $_GET['id_school'];
	$consult = "select id_image, title, description from images where id_school = '$idSchool'";
	$result = mysqli_query($db_connection, $consult);
	$rows = array();
	while($row = mysqli_fetch_assoc($result)) {
	    $rows[] = $row;
	}
	print json_encode($rows);
?>