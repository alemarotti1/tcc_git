<?php

class Usuario{
	private $id;
	private $administrador;
	private $email;
	private $username;
	private $hoteis;
	
	function __construct(){
		$this->hoteis = array();	
	}
	
	//--------------------------------------------funcões do id-----------------------------------------------------
	public function getId(){
		return $this->id;
	}
	public function setId($temp){
		$this->id = $temp;
	}

	//--------------------------------------------funcões do administrador------------------------------------------
	public function getAdministrador(){
		return $this->administrador;
	}
	public function setAdministrador($temp){
		$this->administrador = $temp;
	}
	//--------------------------------------------funcões do email--------------------------------------------------
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($temp){
		$this->email = $temp;
	}
	//--------------------------------------------funcões do usuario------------------------------------------------
	public function getUsername(){
		return $this->username;
	}
	public function setUsername($temp){
		$this->username = $temp;
	}
	//-----------------------------funções dos hoteis no qual o usuario trabalha------------------------------------
	public function  getHoteis(){
		return $this->hoteis;
	}
	public function adicionarHoteis($idHotel){
		array_push($this->hoteis, $idHotel);
	}
	
	
	
}
?>
