<html>
	<head>
		<?php include 'bootstrapcss.php';?>
		<script src="js/login.js"></script>
		<link rel="stylesheet" type="text/css" href="css/paginaBasica.css">	
	</head>
	<body>
	
	<div id="central">
	
		<form id='form' name='form' class='form-horizontal' method='post' action='login.php'>
			<label for ='username'>Nome de Usuário:</label>
			<input name ='username' id='username' class="form-control" type='text'/>
			<br>
			<br>
			<label for='senha'>Senha:</label>
			<input name='senha' id='senha' class="form-control" type="password"/>
			<br>
			<br>
			<input name='entrar' id= 'entrar' type='submit' value='Entrar'>
		</form>		
	
	</div>

	<?php
		require_once'classes/usuario.php';
		require_once'classes/colecaoUsuarioMysql.php';
		$realizaLogin = new ColecaoUsuarioMysql();
		
		$usuario = null;
		
		if(isset($_POST['entrar'])){
			if(isset($_POST['username']) AND isset($_POST['senha'])){
				//modifica os caracteres especiais do html para o contexto html (e.g. aspas duplal - " -  se tornam - &quote; -
				$username= htmlspecialchars(trim($_POST['username']));
				$password= htmlspecialchars($_POST['senha']);
				try {
					$usuario = $realizaLogin->login($username, $password);
				}catch (Exception $e){
					echo '<script> alert("Usuario ou senha estão incorretos");</script>';
				}
				
			}else {
				echo '<script> alert("Por favor, preencha os dados");</script>';
			}
		
		}
		
		if (isset($_POST['entrar'])){
			//----------------------------------------Parte pra iniciar sessão-----------------------------------------
			if($usuario instanceof Usuario){
				$idSessao = rand(100000, 1000000);
				session_start();
				$_SESSION['idSessao'] = $idSessao;
				$_SESSION['usuario'] = $usuario;
				header("location: index.php");
					
			}else {
				echo '<script> alert("Falha no login. Tente novamente");</script>';
			}
		}
	?>
	<?php include 'bootstrapjs.php';?>
	</body>
</html>