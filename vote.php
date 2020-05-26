<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" type="image/png" href="res/favicon.png">
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
	<?php
		include 'db_connection.php';
		$consult = "select * from schools";
		$result = mysqli_query($db_connection, $consult);
		while($row = mysqli_fetch_assoc($result)) {
			$url = "images/".$row['school_name']."/1.jpg";
			echo "<button onclick='imageClick(".$row['id_school'].")' data-toggle='modal' data-target='#myModal'><img src='".$url."'' width='100' height='100'></button>";
		}
	?>
<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <img id='modalImage' src="" width=100%></img>
        </div>
        <div class="modal-body">
        	<h4 class="modal-title">Titulo</h4>
          	<p>Descripción.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-default" data-toggle='modal' data-target='#warning'>Votar por esta forografía</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="warning" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
        	¿Estás seguro de que quieres votar por esta forografía?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="vote()">Sí</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
  
</div>
<?php

session_start();
$idCode = $_SESSION['idCode'];
$name = $_SESSION['name'];
$lastName = $_SESSION['lastName'];

?>
<script>
  var currentImg = 0;
  function imageClick(index) {
    var name = "";
    currentImg = index;
    switch (index) {
      case 1:
        name = "ADMI";
        break;
      case 2:
        name = "COMERCIAL";
        break;
      case 3:
        name = "COMUNICACION";
        break;
      case 4:
        name = "CSJ";
        break;
      case 5:
        name = "DISENO";
        break;
      case 6:
        name = "DTI";
        break;
      case 7:
        name = "EIE";
        break;
      case 8:
        name = "FINANCIERA";
        break;
      case 9:
        name = "MARKETING";
        break;
      case 10:
        name = "MEE";
        break;
    }
    $("#modalImage").attr("src", "images/" + name + "/1.jpg");
  }

  function vote() {
    location.replace("final.php?schoolId=" + currentImg);
  }
</script>
</body>
</html>
