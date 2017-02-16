<!DOCTYPE html>
<html>
	<head>
		<?php include 'header.php';?>
		<?php if(!($_SESSION['usuario']->getAdministrador())){
			header("location: index.php");
		}?>
		<link rel="stylesheet" type="text/css" href="css/paginaBasica.css">
	</head>
	
	<body>
	<?php include 'menu.php';?>
	<div id="containerPrincipal" >
	

	<?php
		
		require_once 'classes/RelatorioDeOcupacao.php';
		require_once 'classes/RelatorioProduto.php';
		require_once 'classes/RelatorioPerfilDoHospede.php';
		
		if(isset($_POST['confirmar'])){
			
				$relatorio = htmlspecialchars(trim($_POST['tipoRelatorio']));
			
				
			if($relatorio == 'relatorioProdutos'){
				echo '<form method="post">';
				echo'<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-4">
							<span class="help-block text-muted small-font">Data Inicio</span>
							<input type="text" class="form-control calendario" id="dataInicio" name="dataInicio">
						</div>';
				echo'<div class="col-md-4 col-sm-4 col-xs-4">
							<span class="help-block text-muted small-font calendario">Data Fim</span>
							<input type="text" class="form-control calendario" id="dataFim" name="dataFim">
						</div>';
				echo'<div class="col-md-4 col-sm-4 col-xs-4">
					
							<input type="submit" class="btn btn-success btn-block" name="pesquisar" id="pesquisar" value="Confirmar">
						</div>';
				echo'</form>';
				if(isset($_POST['pesquisar'])){
					$dataInicio = htmlspecialchars($_POST['dataInicio']);
					$dataFim = htmlspecialchars($_POST['dataFim']);
					$produto = new GerarRelatorioProduto();
				$produto->gerarRelatorio();
				}
				
			}
			else{
				if($relatorio == 'relatorioOcupacao'){
					echo '<form method="post">';
					echo'<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-4">
							<span class="help-block text-muted small-font">Data Inicio</span>
							<input type="text" class="form-control calendario" id="dataInicio" name="dataInicio">
						</div>';
					echo'<div class="col-md-4 col-sm-4 col-xs-4">
							<span class="help-block text-muted small-font calendario">Data Fim</span>
							<input type="text" class="form-control calendario" id="dataFim" name="dataFim">
						</div>';
					echo'<div class="col-md-4 col-sm-4 col-xs-4">
									
							<input type="submit" class="btn btn-success btn-block" name="pesquisar" id="pesquisar" value="Confirmar">
						</div>';
					echo'</form>';
					if(isset($_POST['pesquisar'])){
					$dataInicio = htmlspecialchars($_POST['dataInicio']);
					$dataFim = htmlspecialchars($_POST['dataFim']);
					$ocupacao = new GerarRelatorioDeOcupacao();
					$ocupacao->gerarRelatorioOcupacao($dataInicio, $dataFim);
					}
				}
				else{
					echo '<form method="post">';
					echo'<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-4">
							<span class="help-block text-muted small-font">Data Inicio</span>
							<input type="text" class="form-control calendario" id="dataInicio" name="dataInicio">
						</div>';
					echo'<div class="col-md-4 col-sm-4 col-xs-4">
							<span class="help-block text-muted small-font calendario">Data Fim</span>
							<input type="text" class="form-control calendario" id="dataFim" name="dataFim">
						</div>';
					echo'<div class="col-md-4 col-sm-4 col-xs-4">
					
							<input type="submit" class="btn btn-success btn-block" name="pesquisar" id="pesquisar" value="Confirmar">
						</div>';
					echo'</form>';
					if(isset($_POST['pesquisar'])){
						$dataInicio = htmlspecialchars($_POST['dataInicio']);
						$dataFim = htmlspecialchars($_POST['dataFim']);
					$perfil = new GerarRelatorioPerfilDoHospede();
					$perfil->gerarRelatorio();
				}
			}
			
	}
		}
?>
<?php include 'bootstrapjs.php';?>

</body>
</html>