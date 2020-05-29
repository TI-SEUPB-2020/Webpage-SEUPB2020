<?php

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

require 'db_connection.php';
session_start();
$message = '';

if (!empty($_POST['idCode']) && !empty($_POST['name']) && !empty($_POST['lastName'])) {
  $idCode = $_POST['idCode'];
  $name = $_POST['name'];
  $lastName = $_POST['lastName'];

  $query = "SELECT COUNT(*) as count from registered_students where code = '$idCode' and full_name = '$lastName $name' and voted = 'false'";
  $consulta = mysqli_query($db_connection, $query);
  $results = mysqli_fetch_array($consulta);

  if ($results['count'] == 1) {
    $_SESSION['idCode'] = $idCode;

    header('location: vote.php');
  } else {
    $message = 'La información es incorrecta o el usuario ya votó';
  }

} else if (!empty($_POST['idCode']) || !empty($_POST['name']) || !empty($_POST['lastName'])) {
  $message = 'Datos incompletos';
}

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#9932cc" />
    <title>Verificación</title>
    <link rel="icon" type="image/png" href="res/favicon.png">
    <link rel="stylesheet" href="stylesheet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
		body {
			background-image: url('res/authentication.jpg');
			background-position: center center;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
			background-color: #464646;
		}
		.center_div{
		    margin: 0 auto;
		    width:80%;
		    height: auto;
		    background-color: #8906FF;
		    padding: 20px;
		    border-radius: 10px;
		}
		label {
		    cursor: pointer;
		    color: #ffffff;
		    display: block;
		    padding: 5px;
		    margin: 3px;
		}
		.center {
		  display: block;
		  margin-left: auto;
		  margin-right: auto;
		  width: 50%;
		  height: auto;
		}
    </style>
  </head>
  <body>
    <div class="overlay bg-rgba-black-light text-white flex-center">
	    <div class="container">
	    	<img src="res/logo.png" class="center">
	    </div>
	    <div class="container">
	    	<img src="res/titulo.png" class="center" style="margin-bottom: 10%;">
	    </div>
	    <div class="container center_div">
		    <form action="authentication.php" method="post">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Código</label>
			    <input type="text" class="form-control" name="idCode" placeholder="Ingresa tu código">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nombres</label>
			    <input type="text" class="form-control" name="name" placeholder="Ingresa tu o tus nombres">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Apellidos</label>
			    <input type="text" class="form-control" name="lastName" placeholder="Ingresa tus dos apellidos">
			  </div>
			  <input type="submit" class="btn btn-warning" value="Verificar"></input>
			</form>
				<?php
		    		if (!empty($message)) {
		      			echo "<div class='alert alert-danger' role='alert'>$message</div>";
		       		}
		    	?>
		</div>
	</div>
  </body>
</html>
