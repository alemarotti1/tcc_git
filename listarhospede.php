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
			<form id = 'estado' name = 'estado' method ='post' action = 'listarhospede.php'>
				<div class="col-md-9 col-sm-9 col-xs-9">				
					<p class="tituloAgenda">Listar Hospedes</p>
					<select class="form-control" id="listarHospede">
						<option value="todos">Todos</option>
	        			<option value="hospedagem">Hospedagem</option>
	        			<option value="cpf">CPF</option>
	        			<option value="telefone">Telefone</option>
	      			</select>
	      			
				</div>

				</form>
				<br>	
			</div>			
			
		</div>
		<?php include 'bootstrapjs.php';?>
	</body>
</html>

<?php
	
		$acessoAoBanco = new colecaoHospedeEmBD();
		$opcao = htmlspecialchars($_POST['listarHospede']) ;
		if($opcao == 'todos'){
			$acessoAoBanco->listarTodos();
		}
		else if($opcao == 'hospedagem' ){
			//opcao pra informar o id
			$acessoAoBanco->listarPorHospedagem($idHospegagem);
		}
		else if($opcao == 'cpf' ){
			//opcao pra informar o cpf
			$acessoAoBanco->buscaPorCPF($cpf);
		}
		else if($opcao == 'telefone' ){
			//opcao pra informar o telefone
			$acessoAoBanco->buscaPorTelefone($Telefone);
		}
	}
?>
