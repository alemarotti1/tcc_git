<?php
//classes/
	require_once 'Quarto.php';
	require_once 'ColecaoQuarto.php';
	//require_once 'excessoes/UnkownTypeException.php';
	class colecaoQuartoEmBD implements colecaoQuarto{
		private $dsn = "mysql:host=127.0.0.1;dbname=admhotel;";
		private $username = "root";
		private $password = "";
		private  $pdo;
		
		function __construct(){
			try{
				$this->pdo = new PDO($this->dsn, $this->username, $this->password);
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				die('<script>alert("falha ao acessar o banco de dados. Tente novamente");</script>');
			}
		}
		
		public function getQuartoByID($id){
			$id = ereg_replace('[^0-9]', '', $nome);
			$ps = $this->pdo->prepare('SELECT * FROM quarto WHERE id=? ');
			$ps->execute(array($parametro));
			$objetos = $ps->fetchAll();
			$quarto = $objetos[0];
			$tipoQuarto = new TipoQuarto();
			$retorno = new Quarto($quarto[ 'id' ], $quarto[ 'id_hotel' ], $quarto[ 'numeroQuarto' ], $quarto[ 'estado'], $quarto[ 'id_tipo_quarto']);
			
			return $retorno;
		}
		
		public function getAllQuartos(){
			$ps = $this->pdo->prepare('SELECT * FROM quarto WHERE 1');
			$ps->execute();
			$objetos = array();
			foreach ( $ps as $linha ) {
				$obj = new Quarto($linha[ 'id' ], $linha[ 'id_hotel' ], $linha[ 'numeroQuarto' ], $linha[ 'estado' ], $linha[ 'id_tipo_quarto']);
				$objetos[] = obj;
			}
			return $objetos;
		}
		
		public function getQuartoByTipo($tipo){
			$ps = $this->pdo->prepare('SELECT * FROM quarto WHERE id_tipo_quarto=?');	
			$ps->execute(array($tipo));
			$objetos = array();
			foreach ( $ps as $linha ) {
				$obj = new Quarto($linha[ 'id' ], $linha[ 'id_hotel' ], $linha[ 'numeroQuarto' ], $linha[ 'estado' ], $linha[ 'id_tipo_quarto']);
				$objetos[] = $obj;
			
			}
			return $objetos;
			}			
		
		public function getEstadoQuartoPorValor($numero){
			$excessaoTipoInvalido = new UnkownTypeException();
			if(!($numero==1||$numero==2||$numero==3||$numero==4)){
				throw $excessaoTipoInvalido;
			}
			$ps = $this->pdo->prepare('SELECT * FROM quarto WHERE estadoDoQuarto = ?');
			$ps->execute(array($parametro));
			$objetos = array();
			foreach ( $ps as $linha ) {
				$obj = new Quarto($linha[ 'id' ], $linha[ 'id_hotel' ], $linha[ 'numeroQuarto' ],$linha[ 'estado' ], $linha[ 'id_tipo_quarto']);
				$objetos []= $obj;
					
			}
			return $objetos;							
		

		}
		
		public function getEstadoQuartoPorNome($estado){
			$ps = '';
			if ($estado == "livre"){
				$ps = $this->pdo->prepare('SELECT * FROM quarto WHERE  estado = 1');
			}
			else if($estado == "limpando"){
				$ps = $this->pdo->prepare('SELECT * FROM quarto WHERE  estado=2');
			}
			else if($estado == "ocupado"){
				$ps = $this->pdo->prepare('SELECT * FROM quarto WHERE  estado=3');
			}

			else if ($estado == "indisponivel"){
				$ps = $this->pdo->prepare('SELECT * FROM quarto WHERE  estado=4');
			}

			$ps->execute();
			$objetos = array();
			foreach ( $ps as $linha ) {
				$obj = new Quarto($linha[ 'id' ], $linha[ 'id_hotel' ], $linha[ 'numeroQuarto' ], $linha[ 'estado' ], $linha[ 'id_tipo_quarto']);
				$objetos []= $obj;
			}
			return $objetos;
			
		}
		public function trocaEstado($id, $estado){
			$ps = $this->pdo->prepare('UPDATE quarto SET estado = ? WHERE id=? ');
			$ps->execute(array($estado,$id));
		}
	}
	
?>
