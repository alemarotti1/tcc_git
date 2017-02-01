<?php
	interface colecaoReserva{
		public function listarTodas();
		public function listarPorNome($nome);
		public function listarPorTelefone($telefone);
		public function excluir($id);
		public function adicionarReserva(Reserva $reserva);
		public function atualizarReserva(Reserva $reserva);
	}
?>