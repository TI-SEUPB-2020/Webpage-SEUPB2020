<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
  margin: 0;
  font-family: Arial;
  background-image:url('res/exitimg.jpg');
  background-attachment: fixed
  background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
}
.content {
  position: fixed;
  top: 0;
  background-image: linear-gradient(to bottom, rgba(153, 50, 204,2), rgba(0,0,0,0));
  color: #f1f1f1;
  width: 100%;
  height: 100%;

}
</style>
</head>
<body>
  <?php
    session_start();
    if (isset($_GET['imageId']) && isset($_SESSION['idCode']) && isset($_SESSION['id_school'])) {
      $idCode = $_SESSION['idCode'];
      $idImage = $_GET['imageId'];
      $idSchool = $_SESSION['id_school'];
      include 'db_connection.php';
      $query = "SELECT * from registered_students where code='".$idCode."' and voted='0';";
      $consult = mysqli_query($db_connection, $query);
      $result = mysqli_num_rows($consult);
      if ($result == 1) {
        $query1 = mysqli_query($db_connection, "UPDATE images set votes=votes+1 where id_image='".$idImage."';");
        $query2 = mysqli_query($db_connection, "INSERT INTO votes (id_user, id_image, id_school, date) VALUES ('".$idCode."', '".$idImage."', '".$idSchool."', NOW( ));");
        $query3 = mysqli_query($db_connection, "UPDATE registered_students set voted=1 where code=".$idCode.";");
      }
    }
    session_destroy();
  ?>
<div class="content"align="center">
  <br><br><br><br><br><br>
<h1 align="center">¡Gracias por participar!</h1>
<img src="res/seupb.png"style="max-width:30%; height:auto;">
</div>
</div>
</body>
</html>
