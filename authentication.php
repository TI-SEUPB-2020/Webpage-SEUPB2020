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

  $query = "SELECT COUNT(*) as count from registered_students where code = '$idCode' and names = '$name' and last_names = '$lastName'";
  $consulta = mysqli_query($db_connection, $query);
  $results = mysqli_fetch_array($consulta);

  debug_to_console($results);

  if ($results['count'] > 0) {
    $_SESSION['idCode'] = $idCode;
    $_SESSION['name'] = $name;
    $_SESSION['lastName'] = $lastName;

    header('location: vote.php');
    //header('location: testAuth.php');
  } else {
    $message = 'La información es incorrecta';
  }

}

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verificación</title>
  </head>
  <body>

    <?php
    if (!empty($message)) {
      echo "<h1>$message</h1>";
    }
    ?>

    <form action="authentication.php" method="post">
      <input type="text" name="idCode" value="" placeholder="Código">
      <input type="text" name="name" value="" placeholder="Nombre">
      <input type="text" name="lastName" value="" placeholder="Apellido">
      <button type="submit" name="button">Login</button>
    </form>
  </body>
</html>
