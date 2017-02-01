<?php
	class Hospedagem{
		private $id;
		private $idQuarto;
		private $idHospede;
		private $dataEntrada;
		private $dataSaida;
		private $ultimaProcedencia;
		private $proximoDestino;
		private $motivoDaViagem;
		private $meioDeTransporte;
		private $numeroDeHospedes;
		private $estadoHospedagem;
		
		private $valorDaDiaria;
		private $valorPago;
		
		
		
		//------------------------------------------------GETTER----------------------------------------------
		public function getID(){
			return $this->id;
		}
		
		public function getIdQuarto(){
			return $this->idQuarto;
		}
		
		public function getIdHospede(){
			return $this->idHospede;
		}
		
		public function getDataEntrada(){
			return $this->dataEntrada;
		}
		
		public function getDataSaida(){
			return $this->dataSaida;
		}
		
		public function getValor(){
			return $this->valor;
		}
		
		public function getUltimaProcedencia(){
			return $this->ultimaProcedencia;
		}
		
		public function getProximoDestino(){
			return $this->proximoDestino;
		}
		
		public function getMotivoDaViagem(){
			return $this->motivoDaViagem;
		}
		
		public function getMeioDeTransporte(){
			return $this->meioDeTransporte;
		}
		
		public function getNumeroDeHospedes(){
			return $this->numeroDeHospedes;
		}
		
		public function getEstadoHospedagem(){
			return $this->estadoHospedagem;
		}
		public function getValorDaDiaria(){
			return $this->valorDaDiaria;
		}
		
		public function getValorPago(){
			return $this->valorPago;
		}
		//------------------------------------------------SETTER----------------------------------------------
		public function setID($temp){
			$this->id = $temp;
		}	
		
		public function setIdQuarto($temp){
			$this->idQuarto = $temp;
		}
		
		public function setIdHospede($temp){
			$this->idHospede = $temp;
		}
		
		public function setDataEntrada(DateTime $temp){
			$this->dataEntrada = $temp;
		}
		
		public function setDataSaida(DateTime $temp){
			$this->dataSaida = $temp;
		}
		
		public function setValorDaDiaria($temp){
			$this->valorDaDiaria = $temp;
		}
		public function setValorPago($temp){
			$this->valorPago = $temp;
		}
		
		public function setUltimaProcedencia($temp){
			$this->ultimaProcedencia = $temp;
		}
		
		public function setProximoDestino($temp){
			$this->proximoDestino = $temp;
		}
		
		public function setMotivoDaViagem($temp){
			$this->motivoDaViagem = $temp;
		}
		
		public function setMeioDeTransporte($temp){
			$this->meioDeTransporte = $temp;
		}
		
		public function setNumeroDeHospedes($temp){
			$this->numeroDeHospedes = $temp;
		}
		
		public function setEstadoHospedagem($temp){
			$this->estadoHospedagem = $temp;
		}
	}
	
?>