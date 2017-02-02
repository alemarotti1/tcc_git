<!DOCTYPE html>
<html>
	<head>
		<?php include 'header.php';?>
		<link rel="stylesheet" type="text/css" href="css/paginaBasica.css">
	</head>
	
	<body><?php include 'menu.php';?>
		<div id="containerPrincipal" >
			<br>
			<div class="row" style="margin: auto;">
			<form id = 'reserva' name = 'reserva' method =' post' action = 'listar.php'>
				<div class="col-md-9 col-sm-9 col-xs-9">				
					<p class="tituloAgenda">Listar Reservas</p>
					
				<div class="col-md-3 col-sm-3 col-xs-3 pad-adjust">
					<p class="tituloAgenda">&nbsp;</p>
					<input type="submit" class="btn btn-success btn-block" value="confirmar">
				</div>
				</form>
				<br>	
			</div>			
			
		</div>
		<?php include 'bootstrapjs.php';?>
	</body>
</html>

