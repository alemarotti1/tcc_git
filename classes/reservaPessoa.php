<?php
	class ReservaPessoa{
		private $nome;
		private $dataChegada;
		private $dataPrevistaSaida;
		private $nomeQuarto;
		
		function __construct( $nome = '', $dataChegada = '',$dataPrevistaSaida= '',$nomeQuarto= ''){
			$this->nome = $nome;
			$this->dataChegada = $dataChegada;
			$this->dataPrevistaSaida = $dataPrevistaSaida;
			$this->nomeQuarto = $nomeQuarto;
		}
		

		
		
		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		
		public function getdataChegada(){
			return $this->dataChegada;
		}
		public function setDataChegada($dataChegada){
			$this->dataChegada = $dataChegada;
		}
		
		public function getDataPrevistaSaida(){
			return $this->dataPrevistaSaida;
		}
		public function setDataPrevistaSaida($dataPrevistaSaida){
			$this->dataPrevistaSaida = $dataPrevistaSaida;
		}
		public function getNomeQuarto(){
			return $this->nomeQuarto;
		}
		
		public function setNomeQuarto($nomeQuarto){
			$this->nomeQuarto = $nomeQuarto;
		}
	}
?>
