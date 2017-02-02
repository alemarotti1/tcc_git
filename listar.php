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

require_once 'classes/reserva.php';
require_once 'classes/colecaoReservaEmBD.php';
require_once 'classes/reservaPessoa.php';

	try{
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=admhotel','root','');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		throw PDOException;
		die($e->getMessage());
	}
	

	$ps = $pdo->prepare('SELECT h.nome , r.data_chegada, r.data_prevista_saida , t.nome AS nome_tipo 
						FROM reservas AS r INNER JOIN hospede AS h ON r.id_hospede = h.id INNER JOIN tipo_quarto AS t
						ON r.id_tipo_quarto = t.id
				WHERE estadoReserva = 1');
	$ps->execute();

	$objetos = array();
	foreach ( $ps as $linha ) {
			
			
		$obj = new ReservaPessoa(
				$linha['nome'], $linha[ 'data_chegada' ], $linha[ 'data_prevista_saida' ],$linha['nome_tipo']  );
			
		$objetos []= $obj;
			
	}
	echo' <table border=2>';

	echo"<tr>
				<th>Nome do Hospede</th>
				<th>Data de Chegada</th>
				<th>Data Prevista de Saida</th>
				<th>Tipo de Quarto</th>
			</tr>";
	foreach($objetos as $reservas){
		echo'<tr>',
		'<td>',$reservas->getNome(),'</td>',
		'<td>',$reservas->getdataChegada(),'</td>',
		'<td>',$reservas->getDataPrevistaSaida(),'</td>',
		'<td>',$reservas->getNomeQuarto(),'</td>',
		'</tr>'	;
	}
		
	echo"</div></table>";


?>
<?php include 'bootstrapjs.php';?>

</body>
</html>