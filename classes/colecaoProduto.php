<?php
	require_once 'produto.php';
	interface colecaoQuarto{
		public function adicionarProduto(produto $produto);
		public function remover($id);
		public function editar(produto $produto);
		public function selecionar($id);
		public function selecionar($nome);
		public function selecionarTudo();
	}
?>