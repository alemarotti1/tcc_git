<?php
	require_once 'classes/ColecaoTipoQuarto.php';
	require_once 'classes/TipoQuarto.php';
	class ColecaoTipoQuartoEmBD implements ColecaoTipoQuarto{
		private $dsn = "mysql:host=127.0.0.1;dbname=admhotel;";
		private $username = "root";
		private $password = "";
		
		private $pdo;
		
		public function __construct(){
			try {
				$this->pdo = new PDO($this->dsn, $this->username, $this->password);
			}catch (PDOException $e){
				die("Não foi possivel conectar ao banco de dados. Tente novamente mais tarde.");
			}
		}
		
		public function getAll(){
				$tipoQuartos = array();
				$ps = $this->pdo->prepare('SELECT * FROM `tipo_quarto`');
				$ps->execute();
				foreach ($ps as $tipo){
					$tipoQuarto = new TipoQuarto();
					$tipoQuarto->setId($tipo['id']);
					$tipoQuarto->setNome($tipo['nome']);
					$tipoQuarto->setQtdCamas($tipo['qtdCamas']);
					$tipoQuarto->setQtdMaxPessoas($tipo['valor']);
					$tipoQuarto->setValor($tipo['qtdMaxPessoas']);
						
					array_push($tipoQuartos, $tipoQuarto);
				}
				return $tipoQuartos;
		}
		public function byId($id){
			$tipoQuartos = array();
			
			$ps = $this->pdo->prepare('SELECT * FROM `tipo_quarto` where id=?');
			$ps->execute(array($id));
			foreach ($ps as $tipo){
				$obj = new TipoQuarto($tipo['id'],$tipo['nome'],$tipo['valor_padrao'],
						$tipo['numero_de_camas'],$tipo['capacidade_de_pessoas']);
				
					$tipoQuartos[] =$obj;
					
		
			}
			return $tipoQuartos;
		}
		
		
		
		
		
	}
?>