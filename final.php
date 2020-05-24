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
    $_GET['schoolId'];

    session_start();
    $idCode = $_SESSION['idCode'];
    $name = $_SESSION['name'];
    $lastName = $_SESSION['lastName'];
    session_destroy();

    echo 'El id es:' . $idCode . '</br>';
    echo 'El nombre es:' . $name . '</br>';
    echo 'El apellido es:' . $lastName . '</br>';

    if (isset($_GET['schoolId'])) {
      $schoolId = $_GET['schoolId'];
      $imagesSql = "INSERT INTO images (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
      $votesSql = "INSERT INTO registered_students (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
      $studentsSql = "INSERT INTO registered_students (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
    }
  ?>
</body>
</html>
