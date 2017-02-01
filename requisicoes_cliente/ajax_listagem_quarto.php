<?php
	require_once 'classes/colecaoQuartoEmBD';
	$metodoPesquisa = $_GET[ 'metodoPesquisa' ];
	$metodoPesquisa = ereg_replace('[^a-zA-Z]', '', $metodoPesquisa);
	$retorno;
	$acessoAoBanco = new colecaoQuartoEmBD();
	if($metodoPesquisa=='todos'){
				$acessoAoBanco->getAllQuartos();		
	}
	
	else if($metodoPesquisa=='livre'||$metodoPesquisa=='limpando'||$metodoPesquisa=='ocupado'||$metodoPesquisa=='indisponivel'){
					$acessoAoBanco->getEstadoQuartoPorNome($metodoPesquisa);
	}
	
	$retorno = json_encode($acessoAoBanco);
	header( "Content-Type: application/json" );
	echo ''.$retorno.'';
	//$retorno deve ser um objeto json
	//ex:  se nÃ£o houver resultados validos, deve retornar []
	//ex2: se houver 1 retorno retornar [{ â€œnomeâ€�: â€œalguemâ€�, â€œcpfâ€�: â€œ123456â€�}]
	//ex3: se houver mais de 1 retorno retornar [{ â€œnomeâ€�: â€œalguemâ€�, â€œcpfâ€�: â€œ123456â€�}, { â€œnomeâ€�: â€œalguemâ€�, â€œcpfâ€�: â€œ123456â€�}]
	
	
?>
