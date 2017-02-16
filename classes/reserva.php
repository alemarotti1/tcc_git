<?php
	class Reserva{
		private $id;
		private $id_hospede;
		private $data_chegada;
		private $data_prevista_saida;
		private $id_tipo_quarto;
		
		
		function __construct($id, $id_hospede, $data_chegada, $data_prevista_saida, $id_tipo_quarto){
			$this->id = $id;
			$this->id_hospede = $id_hospede;
			$this->data_chegada = $data_chegada;
			$this->data_prevista_saida = $data_prevista_saida;
			$this->id_tipo_quarto = $id_tipo_quarto;
			
				
		}
		
		public function getID(){
			return $this->id;
		}
		
		public function setID($id){
			$this->id = $id;
		}
		
		public function getIDHospede (){
			return $this->id_hospede;
		}
		public function setIDHospede ($id_hospede){
			$this->id_hospede = $id_hospede;
		}
			
		public function getDataChegada (){
			return $this->data_chegada;
		}
		public function setDataChegada ($data_chegada){
			$this->data_chegada = $data_chegada;
		}
		
		public function getDataPrevistaSaida (){
			return $this->data_prevista_saida;
		}
		public function setDataPravistaSaida ($data_prevista_saida){
			$this->data_prevista_saida = $data_prevista_saida;
		}
		
		public function getIDTipoQuarto (){
			return $this->id_tipo_quarto;
		}
		public function setIDTipoQuarto ($id_tipo_quarto){
			$this->id_tipo_quarto = $id_tipo_quarto;
		}
	}
?>