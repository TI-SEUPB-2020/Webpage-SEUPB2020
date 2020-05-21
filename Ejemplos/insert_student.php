<?php
include 'db_connection.php';

$id_code = $_POST['id_code'];
$names = $_POST['names'];
$last_names = $_POST['last_names'];
$id_degree = $_POST['id_degree'];
$id_school = $_POST['id_school'];
$email = $_POST['email'];
$password = $_POST['password'];
$profile_picture = $_POST['profile_picture'];

$consult = "INSERT INTO students VALUES ('".$id_code."','".$names."', '".$last_names."', '".$id_degree."', '".$id_school."', '".$email."', '".$password."', '".$profile_picture."')";

mysqli_query($db_connection, $consult) or die(mysqli_error($db_connection));
mysqli_close($db_connection);
?> 	