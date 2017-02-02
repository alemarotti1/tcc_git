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
					require_once 'classes/colecaoTipoQuartoEmBD.php';
						$acessoAoBanco = new colecaoQuartoEmBD();
						$acesso = new ColecaoTipoQuartoEmBD();
						$estado = 'livre' ;
						$listaQuartoDisponivel=$acessoAoBanco->getEstadoQuartoPorNome($estado);
						foreach ($listaQuartoDisponivel as $quartoDisponivel){
							$idQuarto = $quartoDisponivel->getIdTipoQuarto();
							$tipoQuarto = new ColecaoTipoQuartoEmBD();
							$tipoQuart=$tipoQuarto->byId($idQuarto);
							foreach ($tipoQuart as $q){
							?>
							<table style="border: 2px solid black; background-color: white;">
								<tr><td><?php echo $quartoDisponivel->getNumeroQuarto();?></td></tr>
								
								<tr><td>Numero de camas:<?php echo $q->getQtdCamas();?></td></tr>
								
								<tr><td>Capacidade De Pessoas :<?php echo $q->getQtdMaxPessoas();?></td></tr>
								<tr><td><br><br>Valor padrão: <?php echo $q->getValor();?></td></tr>
								
								<tr><td><a href="checkin.php" class="btn btn-success btn-block" >Alugar</a>	</td></tr>
								
							</table>
												<br>
						<?php }}?>
				</div>
				<div class="col-md-2">
					
				</div>
				<div class="col-md-5">
					<?php
						$acessoAoBanco = new colecaoQuartoEmBD();
						$acesso = new ColecaoTipoQuartoEmBD();
						$estado = 'ocupado' ;
						$listaQuartoOcupado=$acessoAoBanco->getEstadoQuartoPorNome($estado);
						foreach ($listaQuartoOcupado as $quartoOcupado){
							$idOcupado = $quartoOcupado->getIdTipoQuarto();
							$tipoOcupado = new ColecaoTipoQuartoEmBD();
							$tipoQuartOcupado=$tipoOcupado->byId($idOcupado);
							foreach ($tipoQuartOcupado as $qOcupado){
						?>
							<table style="border: 2px solid black; background-color: white;">
								<tr><td><?php echo $quartoOcupado->getNumeroQuarto();?></td></tr>
								
								<tr><td>Numero de camas:<?php echo $qOcupado->getQtdCamas();?></td></tr>
								<tr><td>Capacidade De Pessoas :<?php echo $qOcupado->getQtdMaxPessoas();?></td></tr>
								<tr><td><br><br>Valor padrão: <?php echo $qOcupado->getValor();?></td></tr>
							</table>
							<br>
						<?php }}
					
				?>
				</div>
			</div>
		</div>
		
		
	</body>
</html>