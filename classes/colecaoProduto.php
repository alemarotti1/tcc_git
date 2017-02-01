<?php
	require_once 'produto.php';
	interface colecaoProduto{
		public function adicionarProduto(produto $produto);
		public function remover($id);
		public function editar(produto $produto);
		public function selecionarID($id);
		public function selecionarNome($nome);
		public function selecionarTudo();
	}
?>