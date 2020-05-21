<?php

include 'db_connection.php';
$id_code=$_GET['id_code'];

$consult = "select * from students where id_code = '$id_code'";
$result = $db_connection -> query($consult);

while($row=$result->fetch_array()){
	$product[] = array_map('utf8_encode', $row);
}

echo json_encode($product);
$result->close();

?>