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
	
					
				</form>
				<br>
				<div id="dados"></div>	
			</div>			
			
		</div>
		<?php include 'bootstrapjs.php';?>
	</body>
</html>
<?php
		require_once 'classes/colecaoQuartoEmBD.php';
		
		$acessoAoBanco = new colecaoQuartoEmBD();
		$estado = htmlspecialchars($_POST['estadoQuarto']) ;
		
		$pd = $acessoAoBanco->getAllQuartos(); 
		
		 if($estado == 'todos' ){
			$pd = $acessoAoBanco->getAllQuartos();
		}
		else {
			$pd = $acessoAoBanco->getEstadoQuartoPorNome($estado);
		}
		
		echo "<table border=2>";
		echo "<tr>
					<th>Numero</th>
					<th>Estado</th>
					</tr>";
		foreach($pd as $obj){
			echo"<tr>";
			echo '<tr>',
			'<td>', $obj->getNumero(), '</td>',
			'<td>', $obj->getEstado(), '</td>',
			'</tr>';
		}
?>