<?php
	interface ColecaoQuarto{
		public function getQuartoByID($id); // quarto por id
		public function getAllQuartos(); // todos os quartos
		public function getQuartoByTipo($tipo); // quartos por tipo
		public function getEstadoQuartoPorValor($numero); // quartos no estado do valor 
		public function getEstadoQuartoPorNome($estado);  //quartos no estado descrito 
		public function trocaEstado($id, $estado);
	}
?>