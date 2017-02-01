<?php
	class Hospede{
		private $id;
		private $cpf;
		private $nome;
		private $telefone;
		private $identidade;
		private $profissao;
		private $nacionalidade;
		private $sexo;
		private $dataNascimento;
		private $endereco;
		private $cidade;
		private $estado;
		private $pais;
		private $cep;
	
		function __construct($id, $cpf, $nome, $telefone, $identidade, $profissao, $nacionalidade, $sexo, $dataNascimento, $endereco, $cidade, $estado, $pais, $cep){
			$this->id=$id;
			$this->cpf=$cpf;
			$this->nome=$nome;
			$this->telefone=$telefone;
			$this->identidade=$identidade;
			$this->profissao=$profissao;
			$this->nacionalidade=$nacionalidade;
			$this->sexo=$sexo;
			$this->dataNascimento=$dataNascimento;
			$this->endereco=$endereco;
			$this->cidade=$cidade;
			$this->estado=$estado;
			$this->pais=$pais;
			$this->cep =$cep;
			
		}
		
		
		public function getID(){
			return $this->id;
		}
		public function setID($id){
			$this->id = $id;
		}
		public function getCPF(){
			return $this->cpf;
		}
		public function setCPF($cpf){
			$this->cpf = $cpf;
		}	
		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}		
		public function getTelefone(){
			return $this->telefone;
		}		
		public function setTelefone($telefone){
			$this->telefone = $telefone;
		}		
		public function getIdentidade(){
			return $this->identidade;
		}		
		public function setIdentidade($identidade){
			$this->identidade = $identidade;
		}		
		public function getProfissao(){
			return $this->profissao;
		}		
		public function setProfissao($profissao){
			$this->profissao = $profissao;
		}		
		public function getNacionalidade(){
			return $this->nacionalidade;
		}		
		public function setNacionalidade($nacionalidade){
			$this->nacionalidade = $nacionalidade;
		}		
		public function getSexo(){
			return $this->sexo;
		}		
		public function setSexo($sexo){
			$this->sexo = $sexo;
		}		
		public function getDataNascimento(){
			return $this->dataNascimento;
		}		
		public function setDataNascimento($dataNascimento){
			$this->dataNascimento = $dataNascimento;
		}		
		public function getEndereco(){
			return $this->endereco;
		}		
		public function setEndereco($endereco){
			$this->endereco = $endereco;
		}		
		public function getCidade(){
			return $this->cidade;
		}		
		public function setCidade($cidade){
			$this->cidade = $cidadeid;
		}
		public function getEstado(){
			return $this->estado;
		}
		public function setEstado($estado){
			$this->estado = $cidadeid;
		}
		public function getPais(){
			return $this->pais;
		}
		public function setPais($pais){
			$this->pais = $cidadeid;
		}
		public function getCEP(){
			return $this->cep;
		
		}
		public function setCEP($cep){
			$this->cep = $cep;
		}
	}
?>