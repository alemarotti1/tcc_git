<?php
	class ItemConsumo{
		private $nome;
		private $quantidade;
		private $data;
		
		function __construct( $nome = '', $quantidade = '', $data=''){
			$this->nome = $nome;
			$this->quantidade = $quantidade;
			$this->data = $data;
		}
		

		
		
		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		
		public function getQuantidade(){
			return $this->quantidade;
		}
		public function setQuantidade($quantidade){
			$this->quantidade = $quantidade;
		}
		
		public function getData(){
			return $this->data;
		}
		public function setData($data){
			$this->data = $data;
		}
	}
?>
