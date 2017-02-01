<?php
class ValidadoraDadosCheckin{
	
	private static function testaExpressao($variavel, $expressao){
		if(preg_match($expressao, $variavel)){
			return true;
		}
		return false;
	}
	
	public static function validarTelefone($telefone=null){
		$expressao = "/^1\d\d(\d\d)?$|^0800 ?\d{3} ?\d{4}$|^(\(0?([1-9a-zA-Z][0-9a-zA-Z])?[1-9]\d\) ?|0?([1-9a-zA-Z][0-9a-zA-Z])?[1-9]\d[ .-]?)?(9|9[ .-])?[2-9]\d{3}[ .-]?\d{4}$/";
		return testaExpressao($expressao, $telefone);
	}
	
	public static function validaDataHora($dataCompleta) {
	
		$dataPartida = explode(" ", $dataCompleta);
		$hora = dataPartida[1];
		$data = dataPartida[0];
		return validaData(data) && validaHora(hora);
	
	}

	public static function validarNome($nome=null){
			$expressao = '/[^A-Z a-z^]{2,100}^/';
			return testaExpressao($expressao, $nome);
	}
	
	
	public static function validarObservacoes($observacoes=null){
		$expressao = '/[^A-Z a-z^]{2,200}^/';
		return testaExpressao($expressao, $nome);
	}
	
	
	
	public static function validarTodosOsDados($telefone, $dataChegada, $dataSaida, $nome, $observacoes){
		$erros = array();
		
	
		if(self::validarTelefone($telefone)){
			array_push($erros, "O Telefone não é um telefone válido");
		}
		if(self::validaDataHora($dataChegada)){
			array_push($erros, "A data de entrada não é valida");
		}
		if(self::validaDataHora($dataSaida)){
			array_push($erros, "A data de saída não é valida");
		}
		if(self::validarNome($nome)){
			array_push($erros, "O nome deve ter apenas letras e no minimo 1 e no máximo 100 caracteres");
		}
		if(self::validarObservacoes($observacoes)){
			array_push($erros, "As observa��es so podem ter no maximo 200 caracteres");
		}
		
		return $erros;
	}
}
?>
