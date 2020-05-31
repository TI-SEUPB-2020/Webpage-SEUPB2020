<?php
  session_start();
  echo "<p id='school'>".$_SESSION['id_school']."</p>";
?>
<html lang="es">
<head>
  <title>Vota por tu favorito</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" type="image/png" href="res/favicon.png">
  <link rel="stylesheet" href="stylesheet.css">
  <style>
      
  </style>
</head>
<body>
  <script>
    var table;
    $.ajax({
          url: 'images.php?id_school=' + $("#school").text(),
          type: 'get',
          dataType: 'JSON',
          success: function(response){
            table = response;
            for(var i = 0; i < response.length; i++) {
              var index = i + 1;
              var url = "images/" + table[i].location + "/" + index + ".jpg";
              $("#images").append("<img onclick='imageClick(" + index + ")' data-toggle='modal' data-target='#myModal' src='" + url + "' style='width: 33.33%;'/>");
            }
          }
      });
    var currentImg = 0;
    function imageClick(index) {
      currentImg = index;
      console.log(currentImg);
      $("#modalImage").attr("src", "images/" + table[currentImg - 1].location + "/" + currentImg + ".jpg");
      $("#title").html(table[currentImg - 1].title);
      $("#description").html(table[currentImg - 1].description);
    }

    function vote() {
      location.replace("final.php?schoolId=" + currentImg);
    }

  </script>
  <div class="header">
    <h1>Vota por tu favorita</h1>
    <p>Selecciona la imágen y vota por ella a continuación de ver su título y su descripción</p>
  </div>

  <div class="container" style="height: 100%; width: 80%;">
    <div class="row" id="images"> 
    </div>
  </div>
<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <img id='modalImage' src="" width=100%></img>
        </div>
        <div class="modal-body">
        	<h4 class="modal-title"id="title">Hola</h4>
          	<p style="color: black;" id="description"></p>
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
  <lol></lol>
</div>
</body>
</html>
