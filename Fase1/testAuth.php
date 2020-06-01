<?php
session_start();
$idCode = $_SESSION['idCode'];
$school = $_SESSION['id_school'];

echo 'El id es:' . $idCode . '</br>';
echo 'La escuela es:' . $school . '</br>';

?>
