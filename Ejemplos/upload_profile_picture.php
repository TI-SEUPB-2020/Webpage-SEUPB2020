<?php

include 'db_connection.php';

$name = $_POST["name"];
$image = $_POST["image"];
$upload_path = "res/images/'".$name."'.jpg";
$consult = "INSERT INTO images(name, image) VALUES('".$name."', '".$upload_path."')";

mysqli_query($db_connection, $consult) or die(mysqli_error());
file_put_contents($upload_path, base64_decode($image));
echo json_encode(array('response' => 'Image uploaded successfully'));

$db_connection -> close();
?>