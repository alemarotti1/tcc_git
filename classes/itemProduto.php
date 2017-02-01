<?php
	class ItemProduto{
		private $id;
		private $nome;
		private $quantidade;
		
		function __construct($id=0, $nome = '', $quantidade = ''){
			$this->id = $id;
			$this->nome = $nome;
			$this->quantidade = $quantidade;
		}
		

		public function getID(){
			return $this->id;
		}
		public function setID($id){
			$this->id = $id;
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
