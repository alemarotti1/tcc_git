<?php
	require_once 'usuario.php';
	require_once 'excessoes/LoginFailedException.php';
	
	class ColecaoUsuarioMysql{
		private $dsn = "mysql:host=127.0.0.1;dbname=admhotel;";
		private $username = "root";
		private $password = "";
		
		private $pdo;
		
		public function login($username,$password){
			$exception = new LoginFailedException("Usuario ou senha inválidos");
			
			$password = hash("sha256", 'minhaterratempalmeirasondecantaosabia'.$password.'asavesqueaquigorjeiamnaogorjeiamcomola');
			try {
				$pdo = new PDO($this->dsn, $this->username, $this->password);
			}catch (PDOException $e){
				die($e->getMessage());
			}
			$ps = $pdo->prepare("SELECT * FROM conta_de_usuario WHERE username = :usuario AND password = :senha");
			$ps->execute(array('usuario' => $username, 'senha' => $password));
			
			$user = new Usuario();
			if($ps->rowCount()>0){
				//pega a 1º posição da variável "$ps" retornada por "fetchAll()", visto que essa variável sempre terá 0 ou 1 posição,
				//pois "username" no banco de dados é UNIQUE
				$usuario = $ps->fetchAll()[0];
				
				//seta as variaveis presentes na variável usuario em uma variável user que será retornada pela função
				$user->setId($usuario['id']);
				$user->setAdministrador($usuario['administrador']);
				$user->setEmail($usuario['email']);
				$user->setUsername($usuario['username']);
				return $user;
			}
			throw $exception;
		}
	}
?>