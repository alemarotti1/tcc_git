

<!DOCTYPE html>
<html>
	<head>
		<?php include 'header.php';?>
		<?php if(!($_SESSION['usuario']->getAdministrador())){
			header("location: index.php");
		}?>
		<link rel="stylesheet" type="text/css" href="css/paginaBasica.css">
	</head>
	
	<body><?php include 'menu.php';?>
	<form method="post" action="relatorios.php" >
		<div id="containerPrincipal" >
			<br>
			<div class="row" style="margin: auto;">
				<div class="col-md-9 col-sm-9 col-xs-9">
					<p class="tituloAgenda">Gerar relatórios</p>
					<select class="form-control" id="tipoRelatorio" name="tipoRelatorio">
	        			<option value="relatorioProdutos">Produtos vendidos</option>
	        			<option value="relatorioOcupacao">Porcentagem de ocupação por período</option>
	        			<option value="relatorioPerfil">Perfil de hóspedes</option>
	      			</select>
				</div>

				<div class="col-md-3 col-sm-3 col-xs-3 pad-adjust">
					<p class="tituloAgenda">&nbsp;</p>
					<input type="submit" class="btn btn-success btn-block" name="confirmar" id="confirmar" value="Confirmar">
				</div>
				<br>	
			</div>			
			
		</div>
		</form>
		
		
		<?php include 'bootstrapjs.php';?>
		
	
		
	</body>
</html>
