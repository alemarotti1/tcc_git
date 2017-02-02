<?php
	require_once 'classes/reserva.php';
	require_once 'classes/colecaoReserva.php';
	class colecaoReservaEmBD{
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
		
		public function listarTodas(){
			$ps = $this->pdo->prepare('SELECT * FROM reservas r INNER JOIN hospede h ON r.id_hospede = h.id  WHERE 1');
			$ps->execute();
			$objetos = array();
			foreach ( $ps as $linha ) {
				$obj = new Reserva($linha[ 'id' ], $linha[ 'id_hospede' ], $linha[ '$data_cehgada' ], $linha[ 'data_prevista_saida' ], $linha[ 'id_tipo_quarto' ]);
				$objetos []= $obj;
			}
			return $objetos;
		}
		
		public function listarPorNome($nome){
			$ps = $this->pdo->prepare('SELECT * FROM reservas WHERE nome = ?');
			$ps->execute();
			$objetos = array();
			foreach ( $ps as $linha ) {
				$obj = new Reserva($linha[ 'id' ], $linha[ 'id_hospede' ], $linha[ '$data_cehgada' ], $linha[ 'data_prevista_saida' ], $linha[ 'id_tipo_quarto' ]);
				$objetos []= $obj;
			}
			return $objetos;
		}
		
		public function listarPorTelefone($telefone){
			$ps = $this->pdo->prepare('SELECT * FROM reservas WHERE telefone = ?');
			$ps->execute();
			$objetos = array();
			foreach ( $ps as $linha ) {
				$obj = new Reserva($linha[ 'id' ], $linha[ 'id_hospede' ], $linha[ '$data_cehgada' ], $linha[ 'data_prevista_saida' ], $linha[ 'id_tipo_quarto' ]);
				$objetos []= $obj;
			}
			return $objetos;
		}
		
		public function excluir($id){
			$ps = $this->pdo->prepare('DELETE FROM reservas WHERE id=?');
			$ps->execute(array($id));
		}
		
		public function adicionarReserva(Reserva $reserva){
			$ps = $this->pdo->prepare('INSERT INTO reservas (id_hospede,data_chegada,data_prevista_saida, id_tipo_quarto) VALUES (?,?,?,?)');
			$ps->execute(array($reserva->getIDHospede(),$reserva->getDataChegada(),$reserva->getDataPrevistaSaida(),$reserva->getIDTipoQuarto()));
			$produto->setId( $this->pdo->lastInsertId() );
		}
		
		public function atualizarReserva(Reserva $reserva){
			$ps = $this->pdo->prepare('UPDATE reservas SET  id_hospede = ?, data_chegada =?, data_prevista_saida =?, id_tipoQuarto =?');
			$ps->execute(array($reserva->getIDHospede(),$reserva->getDataChegada(),$reserva->getDataPrevistaSaida(),$reserva->getIDTipoQuarto()));
		}
	}
?>