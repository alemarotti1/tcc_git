<?php 
	require_once 'classes/colecaoHospedeEmBD.php';
	require_once 'classes/colecaoQuartoEmBD.php';
	
	class ColecaoHospedagemEmBD{
		private $dsn = "mysql:host=127.0.0.1;dbname=admhotel;";
		private $username = "root";
		private $password = "";
		
		private $pdo;
		
		function __construct(){
			try{
				$this->pdo = new PDO($this->dsn, $this->username, $this->password);
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				die('<script>alert("falha ao acessar o banco de dados. Tente novamente");</script>');
			}
		}
		public function listarTodos(){
			$ps = $this->pdo->prepare('SELECT * FROM hospedagem WHERE 1');
			$ps->execute();
			$objetos = array();
			foreach ( $ps as $linha ) {
				$obj = new Hospedagem($linha[ 'id' ], $linha[ 'cpf' ], $linha[ 'nome' ], $linha[ 'telefone' ],
						$linha[ 'identidade' ], $linha[ 'profissao' ], $linha[ 'nacionalidade' ], $linha[ 'sexo' ],
						$linha[ 'data_nascimento' ], $linha[ 'endereco' ], $linha[ 'cidade' ], $linha[ 'estado' ], $linha['pais'], $linha['cep']);
				$objetos []= $obj;
			}
			return $objetos;
		}
		public function realizarCheckin(Hospedagem $hospedagem){
			if($hospedagem->getIdHospede()&&$hospedagem->getIdQuarto()){	
				$ps = $this->pdo->prepare('INSERT INTO hospedagem (id_quarto, id_hospede, data_entrada, valor_da_diaria, valor_pago, ultima_procedencia, proximo_destino, motivo_da_viagem, meio_de_transporte, numero_de_hospedes) VALUES (?,?,?,?,?,?,?,?,?,?)');
				
				$ps->execute(array($hospedagem->getIdQuarto(),$hospedagem->getIdHospede(), $hospedagem->getDataEntrada()->format('Y/m/d h:i:s'), $hospedagem->getValorDaDiaria(), $hospedagem->getValorPago(),
						$hospedagem->getUltimaProcedencia(), $hospedagem->getProximoDestino(), $hospedagem->getMotivoDaViagem(), $hospedagem->getMeioDeTransporte(), $hospedagem->getNumeroDeHospedes()));
				
				$colecaoQuarto = new colecaoQuartoEmBD();
				$colecaoQuarto->trocaEstado($hospedagem->getIdQuarto(), "ocupado");
			}
			
			
		}
		
	}
	
?>