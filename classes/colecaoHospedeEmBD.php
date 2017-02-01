<?php
	require_once 'Hospede.php';
	require_once 'colecaoQuarto.php';
	require_once 'colecaoHospede.php';
	require_once 'excessoes/UnknownTypeException.php';
	class colecaoHospedeEmBD implements ColecaoHospede{
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
		$ps = $this->pdo->prepare('SELECT * FROM hospede WHERE 1');
		$ps->execute();
		$objetos = array();
		foreach ( $ps as $linha ) {
			$obj = new Hospede($linha[ 'id' ], $linha[ 'cpf' ], $linha[ 'nome' ], $linha[ 'telefone' ],
					$linha[ 'identidade' ], $linha[ 'profissao' ], $linha[ 'nacionalidade' ], $linha[ 'sexo' ],
					$linha[ 'data_nascimento' ], $linha[ 'endereco' ], $linha[ 'cidade' ], $linha[ 'estado' ], $linha['pais'], $linha['cep']);
			$objetos []= $obj;
		}
		return $objetos;
	}
	
	public function listarPorHospedagem(int $idHospegagem){
		$ps = $this->pdo->prepare('SELECT * FROM hospede WHERE id_hospedagem = ?');
		$ps->execute(array($parametro));
		$objetos = array();
		foreach ( $ps as $linha ) {
			$obj = new Hospede($linha[ 'id' ], $linha[ 'cpf' ], $linha[ 'nome' ], $linha[ 'telefone' ],
					$linha[ 'identidade' ], $linha[ 'profissao' ], $linha[ 'nacionalidade' ], $linha[ 'sexo' ],
					$linha[ 'data_nascimento' ], $linha[ 'endereco' ], $linha[ 'cidade' ], $linha[ 'estado' ], $linha['pais'], $linha['cep']);
			$objetos []= $obj;
		}
		return $objetos;
	}
	
	public function adicionarHospede(Hospede $hospede){
		$retorno = $this->buscaPorCPF($hospede->getCPF());
		if(!($retorno)){
			$ps = $this->pdo->prepare('INSERT INTO hospede (cpf,nome,telefone,identidade,profissao,nacionalidade,sexo,
					data_nascimento,cep, endereco,cidade, estado, pais) VALUES (?,?,?,?,?,?,?,?,?,?,?, ?, ?)');
			$ps->execute(array($hospede->getCPF(),$hospede->getNome(),$hospede->getTelefone(), $hospede->getIdentidade(),
					$hospede->getProfissao(), $hospede->getNacionalidade(), $hospede->getSexo(), $hospede->getDataNascimento(),
					$hospede-> getCEP(), $hospede->getEndereco(), $hospede->getCidade(), $hospede->getEstado(),
					$hospede->getPais()));
		}else{
			$this->updateInformacoes($retorno);
		}
	}
	
	public function buscaPorCPF($cpf){
		$cpf = ereg_replace('[^0-9]', '', $cpf);
		$ps = $this->pdo->prepare('SELECT * FROM hospede WHERE cpf= ?');
		$ps->execute(array($cpf));
		$objetos = $ps->fetchAll();
		$obj = false;
		if($ps->rowCount()>0){
		 $linha = $objetos[0];
			$obj = new Hospede($linha[ 'id' ], $linha[ 'cpf' ], $linha[ 'nome' ], $linha[ 'telefone' ],
					$linha[ 'identidade' ], $linha[ 'profissao' ], $linha[ 'nacionalidade' ], $linha[ 'sexo' ],
					$linha[ 'data_nascimento' ], $linha[ 'endereco' ], $linha[ 'cidade' ], $linha[ 'estado' ], $linha['pais'], $linha['cep']);
		}
		
		return $obj;
	}
	
	public function buscaPorTelefone($telefone){
		$ps = $this->pdo->prepare('SELECT * FROM hospede WHERE telefone = ?');
		$ps->execute(array($parametro));
		$objetos = array();
		foreach ( $ps as $linha ) {
			$obj = new Hospede($linha[ 'id' ], $linha[ 'cpf' ], $linha[ 'nome' ], $linha[ 'telefone' ],
					$linha[ 'identidade' ], $linha[ 'profissao' ], $linha[ 'nacionalidade' ], $linha[ 'sexo' ],
					$linha[ 'data_nascimento' ], $linha[ 'endereco' ], $linha[ 'cidade' ], $linha[ 'estado' ], $linha['pais'], $linha['cep']);
			$objetos []= $obj;
		}
		return $objetos;
	}
	
	public function buscaPorID($id){
		$cpf = ereg_replace('[^0-9]', '', id);
		$ps = $this->pdo->prepare('SELECT * FROM hospede WHERE id= ?');
		$ps->execute(array($id));
		$objetos = $ps->fetchAll();
		$obj = false;
		if($ps->rowCount()>0){
			$linha = $objetos[0];
			$obj = new Hospede($linha[ 'id' ], $linha[ 'cpf' ], $linha[ 'nome' ], $linha[ 'telefone' ],
					$linha[ 'identidade' ], $linha[ 'profissao' ], $linha[ 'nacionalidade' ], $linha[ 'sexo' ],
					$linha[ 'data_nascimento' ], $linha[ 'endereco' ], $linha[ 'cidade' ], $linha[ 'estado' ], $linha['pais'], $linha['cep']);
		}
	
		return $obj;
	}
	
	public function buscarPorNome($nome){
		$ps = $this->pdo->prepare('SELECT * FROM hospede WHERE nome = ?');
		$ps->execute(array($parametro));
		$objetos = array();
		foreach ( $ps as $linha ) {
			$obj = new Hospede($linha[ 'id' ], $linha[ 'cpf' ], $linha[ 'nome' ], $linha[ 'telefone' ],
					$linha[ 'identidade' ], $linha[ 'profissao' ], $linha[ 'nacionalidade' ], $linha[ 'sexo' ],
					$linha[ 'data_nascimento' ], $linha[ 'endereco' ], $linha[ 'cidade' ], $linha[ 'estado' ], $linha['pais'], $linha['cep']);
			$objetos []= $obj;
		}
		return $objetos;
	}
	
	public function updateInformacoes(Hospede $hospede){
		$ps = $this->pdo->prepare('UPDATE hospede SET  nome = ?, identidade =?, CEP =?, endereco =?, cidade=?, estado=?, pais=?,
				telefone =?, sexo =?, data_nascimento=?, profissao=? WHERE cpf=? ');
		$ps->execute(array($hospede->getNome(),$hospede->getIdentidade(),$hospede->getCEP(),$hospede->getEndereco(),
				$hospede->getCidade(), $hospede->getEstado(), $hospede->getPais(), $hospede->getTelefone(),$hospede->getSexo(),$hospede->getDataNascimento(), $hospede->getProfissao(), $hospede->getCPF()));
	}
	}
?>