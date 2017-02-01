<?php
	require_once 'classes/ColecaoTipoQuartoEmBD.php';
	$variavel = new ColecaoTipoQuartoEmBD();
	$array = $variavel->getAll();
	foreach ($array as $var){
		var_dump($var);
		echo '<br>';
	}
	
?>