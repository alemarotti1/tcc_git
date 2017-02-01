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
			<div class="row" style="margin: auto;">
				<div class="col-md-5">
					<p class="tituloAgenda">Quartos Disponíveis</p>
				</div>
				<div class="col-md-2">
					
				</div>
				<div class="col-md-5">
					<p class="tituloAgenda">Quartos Ocupados</p>
				</div>
			</div>
			
			<div class="row" style="margin: auto;">
				<div class="col-md-5">
				<?php 
					require_once 'classes/quarto.php';
					require_once 'classes/colecaoQuartoEmBD.php';
						$acessoAoBanco = new colecaoQuartoEmBD();
						$estado = 'livre' ;
						$listaQuartoDisponivel=$acessoAoBanco->getEstadoQuartoPorNome($estado);
						foreach ($listaQuartoDisponivel as $quartoDisponivel){
						?>
							<table style="border: 2px solid black; background-color: white;">
								<tr><td><?php echo $quartoDisponivel->getNumeroQuarto();?></td></tr>
								<tr><td>Numero de camas:<?php echo $quartoDisponivel->getNumeroDeCamas();?></td></tr>
								<tr><td>Capacidade de pessoas: <?php echo $quartoDisponivel->getCapacidadeDePessoas();?></td></tr>
								
								<tr><td><br><br>Valor padrão: <?php echo $quartoDisponivel->getPrecoPadrao();?></td></tr>
								<tr><td><a href="checkin.php" class="btn btn-success btn-block" >Alugar</a>	</td></tr>
								
							</table>
												<br>
						<?php }?>
				</div>
				<div class="col-md-2">
					
				</div>
				<div class="col-md-5">
					<?php
						$acessoAoBanco = new colecaoQuartoEmBD();
						$estado = 'ocupado' ;
						$listaQuartoDisponivel=$acessoAoBanco->getEstadoQuartoPorNome($estado);
						foreach ($listaQuartoDisponivel as $quartoDisponivel){
						?>
							<table style="border: 2px solid black; background-color: white;">
								<tr><td><?php echo $quartoDisponivel->getNumeroQuarto();?></td></tr>
								<tr><td>Numero de camas:<?php echo $quartoDisponivel->getNumeroDeCamas();?></td></tr>
								<tr><td>Capacidade de pessoas: <?php echo $quartoDisponivel->getCapacidadeDePessoas();?></td></tr>
								
								<tr><td><br><br>Valor padrão: <?php echo $quartoDisponivel->getPrecoPadrao();?></td></tr>
							</table>
							<br>
						<?php }
					
				?>
				</div>
			</div>
		</div>
		
		
	</body>
</html>