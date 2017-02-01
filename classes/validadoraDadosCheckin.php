<?php
class ValidadoraDadosCheckin{
	
	private static function testaExpressao($variavel, $expressao){
		if(preg_match($expressao, $variavel)){
			return true;
		}
		return false;
	}
	public static function validaCpf($cpf=null){
		if (isset($cpf)){
			//retira caracteres indesejados
			$cpf = preg_replace('/[^0-9]/', '', $cpf);
			$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
				
			/*os cpfs a seguir são marcados como validos pelo calculo, porém não são validos,
			 portanto, caso sejam informados, o codigo deve marcar como falso */
			if ($cpf == '00000000000' ||
					$cpf == '11111111111' ||
					$cpf == '22222222222' ||
					$cpf == '33333333333' ||
					$cpf == '44444444444' ||
					$cpf == '55555555555' ||
					$cpf == '66666666666' ||
					$cpf == '77777777777' ||
					$cpf == '88888888888' ||
					$cpf == '99999999999') {
						return false;
	
					} else {
						// Verifica se o cpf é valido
						for ($t = 9; $t < 11; $t++) {
	
							for ($d = 0, $c = 0; $c < $t; $c++) {
								$d += $cpf{$c} * (($t + 1) - $c);
							}
							$d = ((10 * $d) % 11) % 10;
							if ($cpf{$c} != $d) {
								return false;
							}
						}
							
						return true;
					}
		}
	}
	

	public static function validaNome($nome=null){
			$expressao = '/^[A-Za-zÇ-ú, ]{2,60}$/';
			return self::testaExpressao($nome, $expressao);
	}
	
	public static function validaProfissao($profissao=null){
		$expressao = '/^[A-Za-zÇ-ú, ]{2,60}$/';
		return self::testaExpressao($profissao, $expressao);
	}
	public static function validaNacionalidade($nacionalidade=null){
		$expressao = '/^[A-Za-zÇ-ú, ]{2,60}$/';
		return self::testaExpressao($nacionalidade, $expressao);
	}
	
	public static function validaTelefone($telefone=null){
		$expressao = "/^1\d\d(\d\d)?$|^0800 ?\d{3} ?\d{4}$|^(\(0?([1-9a-zA-Z][0-9a-zA-Z])?[1-9]\d\) ?|0?([1-9a-zA-Z][0-9a-zA-Z])?[1-9]\d[ .-]?)?(9|9[ .-])?[2-9]\d{3}[ .-]?\d{4}$/";
		return self::testaExpressao($telefone, $expressao);
	}
	
	public static function validaHora($hora){
		$expressao = "/^([01]\d|2[0-3]):?([0-5]\d)$/";
		return self::testaExpressao($hora, $expressao);
	}
	public static function validaData($dataCompleta=null){
		$data	   = explode("/", $dataCompleta);
		if(count($data)==3){
		$mesDe30   = $data[0]<=30&&($data[1]==4||$data[1]==6||$data[1]==9||$data[1]==11);
		$mesDe31   = $data[0]<=31&&($data[1]==1||$data[1]==3||$data[1]==5||$data[1]==7||$data[1]==8||$data[1]==10||$data[1]==12);
		$fevereiro = $data[0]<=28&&$data[1]==2;
		$bissexto  = $data[0]==29&&$data[1]==2&&($data[2]%4==0);
		
		return ($mesDe30||$mesDe31||$fevereiro||$bissexto);
		}else{
			return false;
		}
	}
	
	
	
	public static function validaDataHora($dataCompleta) {
	
		$dataPartida = explode(" ", $dataCompleta);
		$data = $dataPartida [0];
		$hora = $dataPartida [1];
		
		return self::validaData($data) && self::validaHora($hora);
	
	}
	
	

	public static function validaIdentidade($identidade=null){
		$expressao = '/^[0-9.-]{5,15}$/';
		return self::testaExpressao($identidade, $expressao);
	}
	
	
	public static function validaCep($cep=null){
		$cep = preg_replace('/[^0-9]/', '', $cep);
		return self::testaExpressao($cep, '/^[0-9]{8}$/');
		
	}
	
	
	
	
	
	public static function validarEndereco($endereco) {
		return self::testaExpressao($endereco, "/^[0-9A-Za-zÇ-ú, ]{1,255}$/");
	}
	
	public static function validarCidade($cidade) {
		return self::testaExpressao($cidade, "/^[A-Za-zÇ-ú ]{1,80}$/");
	}
	
	public static function validarEstado($estado) {
		return self::testaExpressao($estado, "/^[A-Za-zÇ-ú ]{1,90}$/");
	}
	
	public static function validarPais($pais) {
		return self::testaExpressao($pais, "/^[A-Za-zÇ-ú ]{1,50}$/");
	}
	
	public static function validarMotivo($motivo) {
		return (($motivo=="lazer_ferias")||($motivo=="negocios")||($motivo=="congreco_feira")||($motivo=="parentes_amigos")||($motivo=="estudos_curso")||($motivo=="religiao")||($motivo=="saude")||($motivo=="parentes_amigos")||($motivo=="estudos_curso")||($motivo=="religiao")||($motivo=="saude")||($motivo=="parentes_amigos")||($motivo=="estudos_curso")||($motivo=="religiao")||($motivo=="saude")||($motivo=="parentes_amigos")||($motivo=="estudos_curso")||($motivo=="religiao")||($motivo=="saude")||($motivo=="compras")||($motivo=="outros"));
	}
	
	public static function validarMeioTransporte($meio) {
		return (($meio=="aviao")||($meio=="automovel")||($meio=="onibus")||($meio=="moto")||($meio=="navio_barco")||($meio=="trem")||($meio=="saude")||($meio=="outros"));
	}
	
	public static function validarProcedencia($procedencia) {
		return self::testaExpressao($procedencia, "/^[A-Za-zÇ-ú ]{1,90}$/");
	}
	
	public static function validarDestino($destino) {
		return self::testaExpressao($destino, "/^[A-Za-zÇ-ú ]{1,90}$/");
	}
	
	public static function validarTodosOsDados($cpf, $nome, $telefone, $profissao, $nacionalidade, $nascimento, $identidade, $cep, $endereco, $cidade, $estado, $pais, $motivo, $meio, $procedencia, $destino, $dataChegada, $dataSaida){
		$erros = array();
		
		if(!self::validaCpf($cpf)){
			array_push($erros, "O Cpf está Incorreto");
		}
		if(!self::validaNome($nome)){
			array_push($erros, "O nome deve ter apenas letras e no minimo 1 e no máximo 100 caracteres");
		}
		if(!self::validaTelefone($telefone)){
			array_push($erros, "O Telefone não é um telefone válido");
		}
		if(!self::validaProfissao($profissao)){
			array_push($erros, "A profissão deve conter somente letras e espaços");
		}
		if(!self::validaNacionalidade($nacionalidade)){
			array_push($erros, "A nacionalidade deve conter somente letras e espaços");
		}
		if(!self::validaData($nascimento)){
			array_push($erros, "A data de nascimento não é uma data valida");
		}
		if(!self::validaIdentidade($identidade)){
			array_push($erros, "A identidade não é valida");
		}
		if(!self::validaCep($cep)){
			array_push($erros, "O CEP não é um CEP valido");
		}
		if(!self::validarEndereco($endereco)){
			array_push($erros, "O CEP não é um CEP valido");
		}
		if(!self::validarCidade($cidade)){
			array_push($erros, "O nome da cidade deve conter apenas letras e espaços");
		}
		if(!self::validarEstado($estado)){
			array_push($erros, "O estado deve conter apenas letras e espaços");
		}
		if(!self::validarPais($pais)){
			array_push($erros, "O estado deve conter apenas letras e espaços");
		}
		if(!self::validarMotivo($motivo)){
			array_push($erros, "O motivo não é um valor valido");
		}
		if(!self::validarMeioTransporte($meio)){
			array_push($erros, "O meio de transporte não é um valor valido");
		}
		if(!self::validarProcedencia($procedencia)){
			array_push($erros, "A procedência deve conter apenas letras e espaços");
		}
		if(!self::validarDestino($destino)){
			array_push($erros, "O destino deve conter apenas letras e espaços");
		}

		if(!self::validaDataHora($dataChegada)){
			array_push($erros, "A data de entrada não é valida");
		}
		if(!self::validaDataHora($dataSaida)){
			array_push($erros, "A data de saída não é valida");
		}
		
		return $erros;
	}
}
?>