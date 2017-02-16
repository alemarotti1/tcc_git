<!DOCTYPE html>
<html>
	<head>
		<?php include 'header.php';?>
		<link rel="stylesheet" type="text/css" href="css/paginaBasica.css">
	</head>
	
	<body><?php include 'menu.php';?>
		<div id="containerPrincipal" >
			<br>
			<div class="row" style="margin: auto;">
			<form id = 'reserva' name = 'reserva' method =' post' action = 'listarreserva.php'>
				<div class="col-md-9 col-sm-9 col-xs-9">				
					<p class="tituloAgenda">Listar Reservas</p>
					<select class="form-control" id="listarReserva">
						<option value="todos">Todos</option>
	        			<option value="Nome">Nome</option>
	        			<option value="cpf">CPF</option>
	        			<option value="telefone">Telefone</option>
	      			</select>
	      			
				</div>

				<div class="col-md-3 col-sm-3 col-xs-3 pad-adjust">
					<p class="tituloAgenda">&nbsp;</p>
					<input type="submit" class="btn btn-success btn-block" value="confirmar">
				</div>
				</form>
				<br>	
			</div>			
			
		</div>
		<?php include 'bootstrapjs.php';?>
	</body>
</html>

<?php
	require_once 'classes/reserva.php';
	require_once 'classes/colecaoReservaEmBD.php';
	if(isset($_POST['confirmar'])){
		$acessoAoBanco = new colecaoHospedeEmBD();
		$opçao = htmlspecialchars($_POST['listarReserva']) ;
		if($opção == 'todos'){
			$acessoAoBanco->listarTodos();
		}
		else if($opçao == 'nome' ){
			//opção pra informar o id
			$acessoAoBanco->listarPorHospedagem($idHospegagem);
		}
		else if($opçao == 'cpf' ){
			//opção pra informar o cpf
			$acessoAoBanco->buscaPorCPF($cpf);
		}
		else if($opçao == 'telefone' ){
			//opção pra informar o telefone
			$acessoAoBanco->buscaPorTelefone($Telefone);
		}
	}
?>
