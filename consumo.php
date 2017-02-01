<!DOCTYPE html>
<html>
	<head>
		<?php include 'header.php';?>
		<?php include 'bootstrapjs.php';?>
		<link rel="stylesheet" type="text/css" href="css/paginaBasica.css">
		
	</head>
	
	<body><?php include 'menu.php';?>
		<div id="containerPrincipal" >
			<br>
			
			<table class="table table-bordered table-striped" id="lista_consumo">
				<thead>
					<tr style="background-color: white;">
						<th>Produto</th>
						<th>Quantidade</th>
						<th>Valor</th>
						<th style="width: 10%;">ADD</th>
					</tr>
					
					<form>
						<tr>
							<th><input type="text" class="form-control" id="produto"></th>
							<th><input type="number" class="form-control" id="quantidade"></th>
							<th><input type="text" class="form-control" id="valor" placeholder="Valor"></th>
							<th style="width: 5%;"><button type="button" class="btn btn-primary" id="add">+</button></th>
						</tr>
					</form>
				</thead>
				
				<tbody>
				
				</tbody>
				
				<tfoot>
					<tr>
						<td> </td>
						<td><button type="button" class="btn btn-primary" id="CalcularConsumo">Calcular Consumo</button> </td>
						<td colspan="2"><input type="number" class="form-control" disabled="disabled"> </td>
					</tr>
				</tfoot>
			</table>
		</div>
		
		
		
	</body>
	<script> $('#valor').mask('99.99', {placeholder:"00,00"}); </script>
	<script type="text/javascript" src="js/consumo.js" ></script>
</html>