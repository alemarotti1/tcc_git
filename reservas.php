<?php 
	require_once 'classes/reserva.php';
	require_once 'classes/ValidadoraDadosHospede.php';
	require_once 'classes/colecaoReservaEmBD.php';
	
	if(isset($_POST['enviar'])){
		$erros=array();
		if(!(ValidadoraDadosHospede::validaTelefone($_POST['telefone']))){array_push($erros, "O telefone está incorreto");	}
		if(!(ValidadoraDadosHospede::validaData($_POST['dataChegada'])|ValidadoraDadosHospede::validaData($_POST['dataSaida']))){array_push($erros, "A data está incorreta ou em branco");}
		if (count($erros)>0){
			foreach ($erros as $erro){
				echo '<script> alert("'.$erro.'"); </script>';
			}
		}else{
			$reserva = new Reserva(0, 0, $_POST['dataChegada'], $_POST['dataSaida'],$_POST['tipoDeQuarto']);
			$conexaoAoBanco = new colecaoReservaEmBD();
			//$conexaoAoBanco->
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<?php include 'header.php';?>
		<link rel="stylesheet" type="text/css" href="css/paginaBasica.css">
		<link rel="stylesheet" type="text/css" href="css/formulario.css">
	</head>
	
	<body><?php include 'menu.php';?>
	
		<div id="containerPrincipal" class="row" >
			
			<?php include 'form_reservas.php';?>	
			
		</div>
		
		
		<?php include 'bootstrapjs.php';?>
		<script> $('.telefone').mask('(99)09999-9999', {placeholder:"(__)_____-____"})</script>
		<script>
		$.datetimepicker.setLocale('pt');
		$('.calendario').datetimepicker({
			  format:'d/m/Y H:i',
			  inline:false,
			  lang:'pt'
			});</script>
	</body>
</html>

