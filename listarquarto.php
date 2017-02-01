<!DOCTYPE html>
<html>
	<head>
		<?php include 'header.php';?>
		<link rel="stylesheet" type="text/css" href="css/paginaBasica.css">
	</head>
	
	<body><?php include 'menu.php';?>
		<script src="js/listar_quarto.js"></script>
		<div id="containerPrincipal" >
			<br>
			<div class="row" style="margin: auto;">
				<form id = 'estado' name = 'estado' method ='POST' >
					<div class="col-md-9 col-sm-9 col-xs-9">				
						<p class="tituloAgenda">Listar Quarto</p>
						<select class="form-control" id="estadoQuarto">
							<option value="todos">Todos</option>
		        			<option value="livre">Livre</option>
		        			<option value="limpando">Limpando</option>
		        			<option value="ocupado">Ocupado</option>
		        			<option value="indisponivel">Indisponivel</option>
		      			</select>
		      			
					</div>
	
					<div class="col-md-3 col-sm-3 col-xs-3 pad-adjust">
						<p class="tituloAgenda">&nbsp;</p>
						<input id="confirmar" name="confirmar" type="submit" class="btn btn-success btn-block" value="confirmar">
					</div>
				</form>
				<br>
				<div id="dados"></div>	
			</div>			
			
		</div>
		<?php include 'bootstrapjs.php';?>
	</body>
</html>
