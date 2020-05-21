<?php

include 'db_connection.php';

$consult = "select * from degrees";
$result = mysqli_query($db_connection, $consult);
$listOfDegrees = array();
$counter = 0;

echo '{"listOfDegrees":[';
while($row = mysqli_fetch_assoc($result)) {
	echo '{"id_degree":"'.$row['id_degree'].'",';
	echo '"degree_name":"'.$row['degree_name'].'",';
	echo '"id_school":"'.$row['id_school'].'"';
	++$counter;
	
	if ($counter == mysqli_num_rows($result)) {
		echo "}";
	} else {
		echo "},";
	}
}
echo ']}';

$result->close();
?>