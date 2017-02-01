<?php
	interface ColecaoHospede{
		public function listarTodos();
		public function listarPorHospedagem(int $idHospegagem);
		public function adicionarHospede(Hospede $hospede);
		public function buscaPorCPF($cpf);
		public function buscaPorTelefone($telefone);
		public function buscarPorNome($nome);
		public function updateInformacoes(Hospede $hospede);
	}
	
?>