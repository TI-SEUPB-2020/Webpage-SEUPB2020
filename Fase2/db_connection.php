<?php
$hostname = 'localhost';
$database = 'jugarte18';
$username = 'jugarte18';
$password = '030899jm';

$db_connection = new mysqli($hostname, $username, $password, $database);
if($db_connection->connect_errno) {
	echo "No fue posible conectarse";
}
?>