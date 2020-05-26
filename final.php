<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <?php
  	session_start();
    if (isset($_GET['schoolId']) && isset($_SESSION['idCode']) ) {
    	echo "".$_GET['schoolId']."";
      	$idCode = $_SESSION['idCode'];
      	$idSchool = $_GET['schoolId'];
		include 'db_connection.php';
		$result = mysqli_query($db_connection, "select voted from registered_students where code='$idCode';");
		echo "".$result."";
		if ($result == 0) {
			$schoolsSql = mysqli_query($db_connection, "UPDATE schools set votes=votes+1 where id_school=".$idSchool.";");
			$votesSql = mysqli_query($db_connection, 'INSERT INTO votes (id_user, id_school, date) VALUES ('.$idCode.', '.$idSchool.', NOW( ));');
			$studentsSql = mysqli_query($db_connection, "UPDATE registered_students set voted=1 where code=".$idCode.";");
		}
    }
    session_destroy();
    header("Location: http://seupblapaz.com/");
  ?>
</body>
</html>
