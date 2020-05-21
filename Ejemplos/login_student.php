<?php

include 'db_connection.php';

$user_code = $_POST['user_code'];
$user_password=$_POST['user_password'];

$sentence = $db_connection -> prepare("SELECT * FROM students WHERE id_code=? AND password=?");
$sentence->bind_param('is', $user_code, $user_password);
$sentence->execute();

$result = $sentence -> get_result();
if ($fila = $result -> fetch_assoc()) {
         echo "CORRECTO";     
} else {
        echo "ERROR";
}
$sentence -> close();
$db_connection -> close();

?>