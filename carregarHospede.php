<?php
	require_once 'classes/ColecaoHospedeEmBD.php';
	$acessoAoBanco = new colecaoHospedeEmBD();
	$hospede = $acessoAoBanco->buscaPorCPF($_GET['cpf']);
	
	if ($hospede){
		$id = $hospede->getID();
		$nome = $hospede->getNome();
		$cidade = $hospede->getCidade();
		$estado = $hospede->getEstado();
		$pais = $hospede->getPais();
		$telefone = $hospede->getTelefone();
		$sexo = $hospede->getSexo();
		$profissao = $hospede->getProfissao();
		$nacionalidade = $hospede->getNacionalidade();
		$identidade = $hospede->getIdentidade();
		$cep = $hospede->getCEP();
		$endereco = $hospede->getEndereco();
		$dataNascimento = $hospede->getDataNascimento();
		$cpf = $hospede->getCPF();
		
		
		header( "Content-Type: application/json" );
		$temp = str_split($dataNascimento, 2);
		$dataNascimento = $temp[0].'/'.$temp[1].'/'.$temp[2].''.$temp[3];
		
		echo '{"id": "'.$id.'",
				"cpf": "'.$cpf.'",
				"telefone": "'.$telefone.'",
				"nome": "'.$nome.'", 
				"cidade": "'.$cidade.'",
				"estado": "'.$estado.'",
				"pais": "'.$pais.'",
				"telefone": "'.$telefone.'",
				"sexo": "'.$sexo.'", 
				"profissao": "'.$profissao.'",
				"nacionalidade": "'.$nacionalidade.'", 
				"identidade": "'.$identidade.'",
				"cep": "'.$cep.'",
				"endereco": "'.$endereco.'",
				"nascimento": "'.$dataNascimento.'"}';
	}else {
			echo '{"id": "",
				"cpf": "",
				"nome": "",
				"cidade": "",
				"estado": "",
				"cidade": "",
				"telefone": "",
				"sexo": "",
				"profissao": "",
				"nacionalidade": "",
				"identidade": "",
				"cep": "",
				"endereco": "",
				"nascimento": ""}';
		
	}
	
?>