<?php
	require_once 'validadoraDadosHospede.php';
	require_once 'classes/colecaoHospedeEmBD.php';
	$metodoPesquisa = $_GET[ 'metodoPesquisa' ];
	$metodoPesquisa = ereg_replace('[^a-zA-Z]', '', $metodoPesquisa);
	$retorno;
	$acessoAoBanco = new colecaoHospedeEmBD();
	if($metodoPesquisa=='cpf'&&ValidadoraDadosHospede::validaCpf($_GET['cpf'])){
				$acessoAoBanco->buscaPorCPF($metodoPesquisa);
		
	}else if($metodoPesquisa=='nome'){
		$nome = $_GET['nome'];
		$nome = ereg_replace('[^a-zA-Z]', '', $nome);
		$retorno = $acessoAoBanco->buscaPorNome($nome);
		
	}else if($metodoPesquisa=='telefone'){
		$acessoAoBanco->buscaPorNome($metodoPesquisa);
	}
	$retorno = json_encode($acessoAoBanco);
	header( "Content-Type: application/json" );
	echo ''.$retorno.'';
	//$retorno deve ser um objeto json
	//ex:  se nÃ£o houver resultados validos, deve retornar []
	//ex2: se houver 1 retorno retornar [{ â€œnomeâ€�: â€œalguemâ€�, â€œcpfâ€�: â€œ123456â€�}]
	//ex3: se houver mais de 1 retorno retornar [{ â€œnomeâ€�: â€œalguemâ€�, â€œcpfâ€�: â€œ123456â€�}, { â€œnomeâ€�: â€œalguemâ€�, â€œcpfâ€�: â€œ123456â€�}]
	
	
?>