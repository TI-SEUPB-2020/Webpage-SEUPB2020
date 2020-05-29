<html lang="en">
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
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: Arial;
    }

    .header {
      text-align: center;
      padding: 32px;
    }

    .row {
      display: -ms-flexbox; /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap; /* IE10 */
      flex-wrap: wrap;
      padding: 0 4px;
    }

    /* Create four equal columns that sits next to each other */
    .column {
      -ms-flex: 25%; /* IE10 */
      flex: 25%;
      max-width: 25%;
      padding: 0 4px;
    }

    .column img {
      margin-top: 8px;
      vertical-align: middle;
      width: 10%;
    }

    /* Responsive layout - makes a two column-layout instead of four columns */
    @media screen and (max-width: 800px) {
      .column {
        -ms-flex: 50%;
        flex: 50%;
        max-width: 50%;
      }
    }

    /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
      .column {
        -ms-flex: 100%;
        flex: 100%;
        max-width: 100%;
      }
    }
  </style>
</head>
<body>
  <script>
    var table;
    $.ajax({
          url: 'schools.php',
          type: 'get',
          dataType: 'JSON',
          success: function(response){
            var o = 0;
            table = response;
            for(var i = 0; i < response.length; i++) {
              if (o == 0) {
                $("#images").append("<div class='column'>");
                o++;
              }
              var url = "images/" + table[i].school_name + "/1.jpg";
              var index = i + 1;
              $("#images").append("<img onclick='imageClick(" + index + ")' data-toggle='modal' data-target='#myModal' src='" + url + "' style='width: 33.33%;'/>");
              o++;
              if (o == 4) {
                $("#images").append("</div>");
                o = 0;
              }
            }
          }
      });
    var currentImg = 0;
    function imageClick(index) {
      currentImg = index;
      $("#modalImage").attr("src", "images/" + table[currentImg - 1].school_name + "/1.jpg");
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
      <?php
        session_start();
      ?>
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
