<?php
	header( "Content-Type: application/json" );
	require_once 'classes/Quarto.php';
	require_once 'classes/colecaoQuartoEmBD.php';
	$conexaoComBD = new colecaoQuartoEmBD();
	
	$resultadoFinal = null;
	
	if($_GET['tipoQuarto']=='todos'){
		$resultado = $conexaoComBD->getAllQuartos();
		$resultadoFinal = array();
		foreach ($resultado as $quarto){
			array_push($resultadoFinal, $quarto);
		}
	}
	else {
		$resultado = $conexaoComBD->getQuartoByTipo($_GET['tipoQuarto']);
		
		
	}
	
	
	if(!($_GET['estado']=='todos')){
		$resultadoFinal = array();
		foreach ($resultado as $quarto){
			if ($quarto->getEstadoDoQuarto()==$_GET['estado']){array_push($resultadoFinal, $quarto);}
		}
	}
	$primeiro=false;
	$string = '[';
	foreach ($resultadoFinal as $dado){
		if ($primeiro){
			$string = $string.',';
	
		}
		$primeiro=true;
		$string = $string.'{"id": "'. $dado->getID().'", "numeroQuarto": "'.$dado->getNumeroQuarto().'", "estado": "'.$dado->getEstadoDoQuarto().'", "tipoQuarto": "'.$dado->getTipoQuarto().'"}';
	}
	$string = $string.']';
	
	header( "Content-Type: application/json" );
	
	echo $string;
	
	
?>