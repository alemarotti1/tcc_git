<!DOCTYPE html>
<html>
	<head>
		<?php include 'header.php';?>
		<link rel="stylesheet" type="text/css" href="css/paginaBasica.css">
	</head>
	
	<body><?php include 'menu.php';?>
	
		<script type="text/javascript">
		function opcoes( valor ) {

			alert( valor );
			/*
			if ( valor === "CPF" ) {
				$( '#conteudo' ).load( 'listagem.php?ordem=cpf' );
			}
			*/

			//$( '#conteudo' ).html( valor );
			 
		}
		</script>
	
		<div id="containerPrincipal" >
			<br>
			<div class="row" style="margin: auto;">
			<form id = 'reserva' name = 'reserva' method =' post' action = 'listarreserva.php'>
				<div class="col-md-9 col-sm-9 col-xs-9">				
					<p class="tituloAgenda">Listar Reservas</p>
					<select class="form-control" id="listarReserva" name="listarReserva" onChange="opcoes(this.value)">
						<option value="todos">Todos</option>
	        			<option value="nome">Nome</option>
	        			<option value="cpf">CPF</option>
	        			<option value="telefone">Telefone</option>
	      			</select>
	      			
				</div>

				
				</form>
				<br>	
			</div>
			
			<div id="conteudo" >
			</div>			
			
		</div>
		<?php include 'bootstrapjs.php';?>
	</body>
</html>

<?php
		$acessoAoBanco = new colecaoReservaEmBD();
		$op�ao = htmlspecialchars($_POST['listarReserva']) ;
		if($op��o == 'todos'){
			$acessoAoBanco->listarTodas();
		}
		else if($op�ao == 'nome' ){
			//op��o pra informar o id
			$acessoAoBanco->listarPorHospedagem($idHospegagem);
		}
		else if($op�ao == 'cpf' ){
			//op��o pra informar o cpf
			$acessoAoBanco->buscaPorCPF($cpf);
		}
		else if($op�ao == 'telefone' ){
			//op��o pra informar o telefone
			$acessoAoBanco->buscaPorTelefone($Telefone);
		}
	
?>
