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
					$tipoQuarto->setQtdCamas($tipo['numero_de_camas']);
					$tipoQuarto->setQtdMaxPessoas($tipo['capacidade_de_pessoas']);
					$tipoQuarto->setValor($tipo['valor_padrao']);
					
					array_push($tipoQuartos, $tipoQuarto);
				}
				return $tipoQuartos;
		}
		public function byId(){
			$tipoQuartos = array();
			$ps = $this->pdo->prepare('SELECT * FROM `tipo_quarto` where id=?');
			$ps->execute();
			foreach ($ps as $tipo){
				$tipoQuarto = new TipoQuarto();
				$tipoQuarto->setId($tipo['id']);
				$tipoQuarto->setNome($tipo['nome']);
					
				array_push($tipoQuartos, $tipoQuarto);
			}
			return $tipoQuartos;
		}
		
		public function getIdQuarto($id){
			$tipoQuartos = array();
				$ps = $this->pdo->prepare('SELECT * FROM tipo_quarto INNERJOIN quarto 
						ON quarto.id_tipoQuarto =tipo_quarto.id
						WHERE id_tipo_quarto = ?');
				$ps->execute(array($id));
				$objetos = array();
				foreach ( $ps as $linha ) {
					$obj = new TipoQuarto($linha[ 'id' ], $linha[ 'nome' ], $linha[ 'numero_de_camas' ], $linha[ 'capacidade_de_pessoas' ], $linha[ 'valor_padrao']);
				$objetos []= $obj;
				}
				return $objetos;
				
				
		}
		
		
	}
?>