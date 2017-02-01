<?php
	class quarto {
		private $id;
		private $idHotel;
		private $numeroQuarto;
		private $estadoDoQuarto;
		private $tipoQuarto;
		
		function __construct($id, $idHotel, $numeroQuarto, $estadoDoQuarto, $idTipoQuarto){
			$this->id = $id;
			$this->idHotel = $idHotel;
			$this->numeroQuarto = $numeroQuarto;
			$this->estadoDoQuarto = $estadoDoQuarto;
			$this->tipoQuarto = $idTipoQuarto;
			
		}
		
		public function getID(){
			return $this->id;
		}
		
		public function setID($id){
			$this->id = $id;
		}
		
		public function getIDHotel(){
			return $this->idHotel;
		}
		
		public function setIDHotel($idHotel){
			$this->idHotel = $idHotel;
		}
		
		public function getNumeroQuarto(){
			return $this->numeroQuarto;
		}
		
		public function setNumeroQuarto($numeroQuarto){
			$this->numeroQuarto = $numeroQuarto;
		}
		
		public function getEstadoDoQuarto(){
			return $this->estadoDoQuarto;
		}
		
		public function setEstadoDoQuarto($estadoDoQuarto){
			$this->estadoDoQuarto = $estadoDoQuarto;
		}
		
		public function getTipoQuarto(){
			return $this->tipoQuarto;
		}
		
		public function setTipoQuarto($tipoQuarto){
			$this->tipoQuarto = $tipoQuarto;
		}
	}
	
?>