<?php
	require_once '../validadoraDadosCheckin.php';
	$erros = ValidadoraDadosCheckin::validarTodosOsDados("89963032753", "ale", "22998474849", "puto", "24/02/1964", "272174251", "28610000", "rua caralho", "iputinga", "mato grosso de janeiro", "estados unidos do Brasil", "lazer_ferias", "aviao", "maternidade", "cova", "24/10/1964 12:00", "24/10/1964 22:55");
	echo var_dump($erros);
	
?>