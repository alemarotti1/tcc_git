<?php
	class ItemConsumo{
		private $nome;
		private $quantidade;
		
		function __construct( $nome = '', $quantidade = ''){
			$this->nome = $nome;
			$this->quantidade = $quantidade;
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
	}
?>
