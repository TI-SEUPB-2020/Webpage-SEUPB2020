<?php

session_start();
$idCode = $_SESSION['idCode'];
$name = $_SESSION['name'];
$lastName = $_SESSION['lastName'];

echo 'El id es:' . $idCode . '</br>';
echo 'El nombre es:' . $name . '</br>';
echo 'El apellido es:' . $lastName . '</br>';

?>
