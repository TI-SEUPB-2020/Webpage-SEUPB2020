<?php

include 'db_connection.php';

$id_degree=$_GET['id_degree'];

$consult = "select * from degrees where id_degree = '$id_degree'";
$result = $db_connection -> query($consult);

while($row=$result->fetch_array()){
	$degree[] = array_map('utf8_encode', $row);
}

echo json_encode($degree);
$result->close();

?>