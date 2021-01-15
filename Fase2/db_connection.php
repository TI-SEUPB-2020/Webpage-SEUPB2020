<?php
$hostname = 'localhost';
$database = '';
$username = '';
$ = '';

$db_connection = new mysqli($hostname, $username, $password, $database);
if($db_connection->connect_errno) {
	echo "No fue posible conectarse";
}
?>
