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
	<form method="get" action="administracao.php" >
		<div id="containerPrincipal" >
			<br>
			<div class="row" style="margin: auto;">
					<p class="tituloAgenda">Gerar relatórios</p>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<span class="help-block text-muted small-font">Data de Inicio</span>
						<input type="text" class="form-control dataInicio" id="dataInicio" name="dataInicio">
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<span class="help-block text-muted small-font calendario">Data de Fim</span>
						<input type="text" class="form-control dataFim" id="dataFim" name="dataFim">
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 pad-adjust">
					<p class="tituloAgenda">&nbsp;</p>
					<input type="submit" class="btn btn-success " name="confirmar" id="confirmar" value="Confirmar">
					<input type="reset" class="btn btn-danger " value="CANCELAR">
				</div>
			<br>	
			</div>	
			<div class="row" style="margin: auto;">					
				<div class="col-md-8 col-sm-8 col-xs-8">					
					<select class="form-control" id="tipoRelatorio" name="tipoRelatorio">
	        			<option value="relatorioProdutos">Produtos vendidos</option>
	        			<option value="relatorioOcupacao">Porcentagem de ocupação por período</option>
	        			<option value="relatorioPerfil">Perfil de hóspedes</option>
	      			</select>
				</div>								
			</div>		
				
			
		</div>
		</form>
		
		
		<?php include 'bootstrapjs.php';?>
		
	<script> $('.dataInicio').mask('99/99/9999', {placeholder:" __/__/____"})</script>
		<script>
		$.datetimepicker.setLocale('pt');
		$('.dataInicio').datetimepicker({
			  format:'d/m/Y H:i',
			  inline:false,
			  lang:'pt'
			});</script>
		
		<script> $('.dataFim').mask('99/99/9999', {placeholder:" __/__/____"})</script>
		<script>
		$.datetimepicker.setLocale('pt');
		$('.dataFim').datetimepicker({
			  format:'d/m/Y H:i',
			  inline:false,
			  lang:'pt'
			});</script>
		
</body>
</html>


<?php 
	require_once 'classes/RelatorioProduto.php';
	require_once 'classes/RelatorioDeOcupacao.php';
	require_once 'classes/RelatorioPerfilDoHospede.php';
	
	
	if(isset($_GET['confirmar'])){
		$produto = new RelatorioProduto();
		$ocupacao = new RelatorioDeOcupacao(); 
		$perfil = new RelatorioPerfilDoHospede();
		$tipoRelatorio = htmlspecialchars($_GET['tipoRelatorio']);
		
		$dataInicio = htmlspecialchars($_GET['dataInicio']);
		$dataFim = htmlspecialchars($_GET['dataFim']);
		
		
		if($tipoRelatorio == 'relatorioProdutos'){	
			$dataIni = explode( ' ', $dataInicio );
			$dataIni = explode( '/', $dataIni[ 0 ] );
			$dataIni = $dataIni[ 2 ] . '/' . $dataIni[ 1 ] . '/' . $dataIni[ 0 ];
			
			$fim = explode( ' ', $dataFim );
			$fim = explode( '/', $fim[ 0 ] );
			$fim = $fim[ 2 ] . '/' . $fim[ 1 ] . '/' . $fim[ 0 ];
			
			$dataInicio = ( new DateTime( $dataIni ) )->format( 'Y-m-d' );
			$dataFim = ( new DateTime( $fim ) )->format( 'Y-m-d' );
			$pd= $produto->gerarRelatorio($dataInicio, $dataFim);
		}
		//aqui tem q ajeitar ainda
		else {
			$dataIni = explode( ' ', $dataInicio );
			$dataIni = explode( '/', $dataIni[ 0 ] );
			$horaIni = $dataIni[1];
			$dataIni = $dataIni[ 2 ] . '/' . $dataIni[ 1 ] . '/' . $dataIni[ 0 ];
				
			$fim = explode( ' ', $dataFim );
			$fim = explode( '/', $fim[ 0 ] );
			$fim = $fim[ 2 ] . '/' . $fim[ 1 ] . '/' . $fim[ 0 ] ;
				
			$dataInicio = ( new DateTime( $dataIni ) )->format( 'Y-m-d' );
			$dataFim = ( new DateTime( $fim ) )->format( 'Y-m-d' );
			
			
		
			if($tipoRelatorio == 'relatorioOcupacao'){
				$pd = $ocupacao->gerarRelatorio($dataInicio, $dataFim);
			}
			else if($tipoRelatorio == 'relatorioPerfil'){
				$pd = $perfil->gerarRelatorio($dataInicio, $dataFim);
			}
		}
	}
?>
	