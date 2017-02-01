<?php
	class TipoQuarto{
		private $id;
		private $nome;
		private $qtdCamas;
		private $valor;
		private $qtdMaxPessoas;
		
		//--------------------------------------------funcões do id-------------------------------------------------
		public function getId(){
			return $this->id;
		}
		public function setId($temp){
			$this->id = $temp;
		}
		
		//--------------------------------------------funcões do nome-----------------------------------------------
		public function getNome(){
			return $this->nome;
		}
		public function setNome($temp){
			$this->nome = $temp;
		}
		//--------------------------------------------funcões $qtdCamas-------------------------------------------------
		public function getQtdCamas(){
			return $this->qtdCamas;
		}
		public function setQtdCamas($temp){
			$this->qtdCamas = $temp;
		}
		
		//--------------------------------------------funcões $qtdMaxPessoas-----------------------------------------------
		public function getQtdMaxPessoas(){
			return $this->qtdMaxPessoas;
		}
		public function setQtdMaxPessoas($temp){
			$this->qtdMaxPessoas = $temp;
		}//--------------------------------------------funcões do $valor-----------------------------------------------
		public function getValor(){
			return $this->valor;
		}
		public function setValor($temp){
			$this->valor = $temp;
		}
	}
	
?>