<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		include 'db_connection.php'; 
		$consult = "select * from schools";
		$result = mysqli_query($db_connection, $consult);
		while($row = mysqli_fetch_assoc($result)) {
			$url = "src='images/".$row['school_name']."/1.jpg'";
			echo "<input type='image' class='btn btn-info btn-lg' id='Btn".$row['id_school']."' ".$url." width='200' height='200' data-id=".$url.">";
		}
	?>
<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <img id="modalImage" src="" width=100%></img>
        </div>
        <div class="modal-body">
        	<h4 class="modal-title">Titulo</h4>
          	<p>Descripción.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" id="goToWarning">Votar por esta forografía</button>
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
          <button type="button" class="btn btn-default" id="yes">Sí</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
  
</div>

<script>
$(document).ready(function(){
  $("#Btn1").click(function(){
    $("#myModal").modal();
    $("#modalImage").attr("src", "images/ADMI/1.jpg");
  });
  $("#Btn2").click(function(){
    $("#myModal").modal();
    $("#modalImage").attr("src", "images/COMERCIAL/1.jpg");
  });
  $("#Btn3").click(function(){
    $("#myModal").modal();
    $("#modalImage").attr("src", "images/COMUNICACION/1.jpg");
  });
  $("#Btn4").click(function(){
    $("#myModal").modal();
    $("#modalImage").attr("src", "images/CSJ/1.jpg");
  });
  $("#Btn5").click(function(){
    $("#myModal").modal();
    $("#modalImage").attr("src", "images/DISENO/1.jpg");
  });
  $("#Btn6").click(function(){
    $("#myModal").modal();
    $("#modalImage").attr("src", "images/DTI/1.jpg");
  });
  $("#Btn7").click(function(){
    $("#myModal").modal();
    $("#modalImage").attr("src", "images/EIE/1.jpg");
  });
  $("#Btn8").click(function(){
    $("#myModal").modal();
    $("#modalImage").attr("src", "images/FINANCIERA/1.jpg");
  });
  $("#Btn9").click(function(){
    $("#myModal").modal();
    $("#modalImage").attr("src", "images/MARKETING/1.jpg");
  });
  $("#Btn10").click(function(){
    $("#myModal").modal();
    $("#modalImage").attr("src", "images/MEE/1.jpg");
  });

  $("#goToWarning").click(function(){
    $("#warning").modal();
  });
  $("#yes").click(function(){
    //Submit
  });
});
</script>

</body>
</html>
