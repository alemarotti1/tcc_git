<?php require_once 'classes/colecaoQuartoEmBD.php';?>
<!DOCTYPE html>
<html>
	<head>
		<?php include 'header.php';?>
		<link rel="stylesheet" type="text/css" href="css/paginaBasica.css">
		<link rel="stylesheet" type="text/css" href="css/formulario.css">
	</head>
	
	<body>
		<?php include 'menu.php';?>
		<div id="containerPrincipal" >
			<br>
			<div class="row" style="margin: auto;">
				<div class="col-md-5">
					<label for="quartosOcupados">Quartos Ocupados:</label>
     					 <select class="form-control" id="quartosOcupados">
        					<?php 
        						$colecaoQuarto = new colecaoQuartoEmBD();
        						$quartos = $colecaoQuarto->getEstadoQuartoPorNome("ocupado");
        						foreach($quartos as $quarto){
        							echo "<option>".$quarto->getNumeroQuarto()."</option>";
        						}
        					?>
      					</select>
				</div>
				<div class="col-md-2">
					<div class="row">
						
						<div class="col-md-6 col-sm-6 col-xs-6">
							<span class="help-block text-muted small-font">&nbsp;</span>
							<button class="btn btn-success"
								id="pesquisar"
								>Pesquisar
							</button>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					
					<label for="consumo">Consumo:</label>
					      <select multiple class="form-control corCaixaSelect" disabled="disabled" id="consumo">
					      		
					      </select>
				
				</div>
			</div>
			<br>
			<div class="row" style="margin: auto;">
				<div class="col-md-5">
				<label for="formaPagamento">Forma de pagamento:</label>
					<select class="form-control" id="formaDePagar">
	        			<option value="dinheiro">Dinheiro</option>
	        			<option value="credito">Cartao de Credito </option>
	        			<option value="debito">Cartao de débito</option>
	      			</select>
			</div>
				<div class="col-md-2">
					
				</div>
			<div class="col-md-5">
				
			</div>
			<div id="dados"></div>
			</div>
			<br>

			<div class="row btn-submit">
					<div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
						<input type="reset" class="btn btn-danger btn-block" value="Cancelar">
					</div>
					
					<div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
						<input type="submit" class="btn btn-success btn-block" value="Confirmar">
					</div>
			</div>
		</div>
		
		
		<?php include 'bootstrapjs.php';?>
		
		
	</body>
	
</html>

