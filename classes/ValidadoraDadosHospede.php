<?php
	class ValidadoraDadosHospede {
		public static function validaCpf($cpf=null){
			if (isset($cpf)){
				//retira caracteres indesejados
				$cpf = ereg_replace('[^0-9]', '', $cpf);
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

		public static function validaData($data=null){
			//expressão regular de data ^([0-2][0-9]|3[01])\/(0[0-9]|1[0-2])\/[0-2][0-9][0-9][0-9] ([0-1][0-9]|2[0-4]):[0-5][0-9]$
			$expressao = '/^([0-2][0-9]|3[01])\/(0[0-9]|1[0-2])\/[0-2][0-9][0-9][0-9] ([0-1][0-9]|2[0-4]):[0-5][0-9]$/';
			$expressao2 = '/^([0-2][0-9]|3[01])\/(0[0-9]|1[0-2])\/[0-2][0-9][0-9][0-9]$/';
			if(preg_match($expressao, $data)|preg_match($expressao2, $data)){
				return true;
				
			}
			return false;
		}
		
		public static function validaTelefone($telefone=null){
			$expressao = "/^1\d\d(\d\d)?$|^0800 ?\d{3} ?\d{4}$|^(\(0?([1-9a-zA-Z][0-9a-zA-Z])?[1-9]\d\) ?|0?([1-9a-zA-Z][0-9a-zA-Z])?[1-9]\d[ .-]?)?(9|9[ .-])?[2-9]\d{3}[ .-]?\d{4}$/";
			if(preg_match($expressao, $telefone)){
				return true;
			}
			return false;
		}
		
	}
	
?>