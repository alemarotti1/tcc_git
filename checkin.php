<?php 
function exibirArray($array){
	echo "<script> alert('";
	foreach ($array as $unity){
		echo $unity."\\n";
	}
	echo "');";
	echo "</script>";
}
function higienizar($item){
	$retorno = preg_replace("/[^[:alnum:]Ç-üÀ-Ä ]/", '', $item);
	return htmlspecialchars($retorno);
}
function higienizarNumero($item){
	 
	return preg_replace("/[^\d]/", '', $item);
}

?>

<!DOCTYPE html>
<html>
	<head>
		<?php include 'header.php';?>
		<?php include 'bootstrapjs.php';
			  require_once 'classes/validadoraDadosCheckin.php';
		?>
		<link rel="stylesheet" type="text/css" href="css/paginaBasica.css">
		
	</head>
	
	<body>
	<?php 
	require_once 'classes/Hospede.php';
	require_once 'classes/colecaoHospedeEmBD.php';
	require_once 'classes/Hospedagem.php';
	require_once 'classes/ColecaoHospedagemEmBD.php';
	
	if(isset($_POST['cpf'])){
		
		$erros = ValidadoraDadosCheckin::validarTodosOsDados($_POST['cpf'], $_POST['nome'], $_POST['telefone'], $_POST['profissao'], $_POST['nacionalidade'], $_POST['nascimento'], $_POST['identidade'], $_POST['cep'], $_POST['endereco'], $_POST['cidade'], $_POST['estado'], $_POST['pais'], $_POST['motivoViagem'], $_POST['transporte'], $_POST['ultimaProcedencia'], $_POST['proximoDestino'], $_POST['dataChegada'], $_POST['dataSaida']);
		if(count($erros)>0){
			exibirArray($erros);
		}else{
			$hospedagem = new Hospedagem();
			$hospede = new Hospede(0, higienizarNumero($_POST['cpf']), higienizar($_POST['nome']), higienizarNumero($_POST['telefone']), higienizarNumero($_POST['identidade']), higienizar($_POST['profissao']), higienizar($_POST['nacionalidade']), higienizar($_POST['sexo']), higienizarNumero($_POST['nascimento']), higienizar($_POST['endereco']), higienizar($_POST['cidade']), higienizar($_POST['estado']), higienizar($_POST['pais']), higienizarNumero($_POST['cep']));
			$colecaoHospede = new colecaoHospedeEmBD();
			$colecaoHospede->adicionarHospede($hospede);
			
			$hospede = $colecaoHospede->buscaPorCPF($_POST['cpf']);
			
			$hospedagem->setIdHospede($hospede->getID());
			$hospedagem->setIdQuarto(higienizar($_POST['idQuarto']));
			$hospedagem->setDataEntrada(DateTime::createFromFormat('d/m/Y G:i', $_POST['dataChegada']));
			$hospedagem->setMeioDeTransporte(higienizar($_POST['transporte']));
			$hospedagem->setMotivoDaViagem(higienizar($_POST['motivoViagem']));
			$hospedagem->setNumeroDeHospedes(higienizar($_POST['numeroDeHospedes']));
			$hospedagem->setProximoDestino(higienizar($_POST['proximoDestino']));
			$hospedagem->setUltimaProcedencia(higienizar($_POST['ultimaProcedencia']));
			$hospedagem->setValorDaDiaria(higienizar($_POST['valorDaDiaria']));
			$hospedagem->setValorPago(higienizar($_POST['valorPago']));
			
			$colecaoHospedagem = new ColecaoHospedagemEmBD();
			
			$colecaoHospedagem->realizarCheckin($hospedagem);
			
			
			
			
		}
	}
	?>
		<?php include 'menu.php';?>
		
		<div id="containerPrincipal" class="row">
			<?php include 'form_checkin.php';?>
		</div>
		
		<script src="js/validaDados.js"></script>
		<script src="js/formulario_checkin.js"></script>
		<script type="text/javascript" src="js/formulario.js"></script>
		<script type="text/javascript" src="js/ValidarEEnviarCheckIn.js"></script>
	</body>
	
</html>