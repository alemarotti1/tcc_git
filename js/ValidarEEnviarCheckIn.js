function validarDados(cpf, nome, telefone, profissao, nacionalidade, nascimento, identidade, cep, endereco, cidade, estado, pais, procedencia, destino, motivo, meio, dataChegada, dataSaida, sexo, valorDiaria, valorPago) {
	var erros = new Array();
	if(!(validarCPF(cpf))){erros.push("O Cpf está Incorreto");}
	
	if(!(validarNome(nome))){erros.push("O nome deve ter apenas letras e no minimo 1 e no máximo 100 caracteres");}
	
	if(!(validarTelefone(telefone))){erros.push("O Telefone não é um telefone válido");}
	
	if(!(validarProfissao(profissao))){erros.push("A profissao deve ter apenas letras e no minimo 1 e no máximo 80 caracteres");}
	
	if(!(validarNacionalidade(nacionalidade))){erros.push("A nacionalidade deve ter apenas letras e no minimo 1 e no máximo 80 caracteres");}
	
	if(!(validarData(nascimento))){erros.push("A data de nascimento não é uma data valida");}
	
	if(!(validarIdentidade(identidade))){erros.push("A identidade não é valida");}
	
	if(!(validarCep(cep))){erros.push("O CEP não é um CEP valido");}
	
	if(!(validarEndereco(endereco))){erros.push("O endereço deve conter apelas letras, números, virgulas e espaços");}
	
	if(!(validarCidade(cidade))){erros.push("O nome da cidade deve conter apenas letras e espaços");}
	
	if(!(validarEstado(estado))){erros.push("O estado deve conter apenas letras e espaços");}
	
	if(!(validarPais(pais))){erros.push("O pais deve conter apenas letras e espaços");}
	
	if(!(validarProcedencia(procedencia))){erros.push("A procedência deve conter apenas letras e espaços");}
	
	if(!(validarDestino(destino))){erros.push("O destino deve conter apenas letras e espaços");}
	
	if(!(validarMotivo(motivo))){erros.push("O motivo não é um valor valido");}
	
	if(!(validarMeioTransporte(meio))){erros.push("O meio de transporte não é um valor valido");}
	
	if(!(validaDataHora(dataChegada))){erros.push("A data de chegada não é uma data com hora valida");}
	
	if(!(validaDataHora(dataSaida))){erros.push("A data de saida não é uma data com hora valida");}
	
	if(!(sexo=='M'||sexo=='F')){erros.push("Preencha o sexo");}
	
	if(!(validaPreco(valorPago))){erros.push("o valor deve estar no formato XXX.XX");}
	
	if(!(validaPreco(valorDiaria))){erros.push("o valor deve estar no formato XXX.XX");}
	
	
	if(erros.length==0){
		return false;
	}
	return erros;
	
}



$(document).ready(function() {

	$("#confirmar").click(function(){
		
		var erros = [];
		
		var cpf =             $("#cpf").val();
		cpf = cpf.replace(/[^\d]+/g,'');
		var nome =            $("#nome").val();
		
		var telefone =        $("#telefone").val();
		telefone = telefone.replace(/[^\d]+/g,'');
		
		var profissao =       $("#profissao").val();
		
		var nacionalidade =   $("#nacionalidade").val();
		
		var nascimento =      $("#nascimento").val();
			
		var identidade =      $("#identidade").val();
		identidade = identidade.replace(/[^\d]+/g,'');
		
		var cep =             $("#cep").val();
		cep = cep.replace(/[^\d]+/g,'');
		
		var endereco =        $("#endereco").val();
		
		var cidade =          $("#cidade").val();
		
		var estado =          $("#estado").val();
		
		var pais =            $("#pais").val();
		
		var procedencia =     $("#ultimaProcedencia").val();
		
		var destino =         $("#proximoDestino").val();
		
		var motivo =          $('input[name=motivoViagem]:checked', '#formularioCheckIn').val();
		
		
		var meio =            $('input[name=transporte]:checked', '#formularioCheckIn').val();
		
		var dataChegada =     $("#dataChegada").val();
		
		var dataSaida =       $("#dataSaida").val();
		
		var sexo =            $('input[name=sexo]:checked', '#formularioCheckIn').val();
		
		var valorDiaria =     $("#valorDaDiaria").val();
		
		var valorPago =       $("#valorPago").val();


		var erros = validarDados(cpf, nome, telefone, profissao, nacionalidade, nascimento, identidade, cep, endereco, cidade, estado, pais, procedencia, destino, motivo, meio, dataChegada, dataSaida, sexo, valorDiaria, valorPago);
		

		
		if(!erros){
			$("#formularioCheckIn").submit();
		}else{
			var texto="";
			for (i = 0; i < erros.length; i++) { 
				texto += erros[i] + "\n";
			}
			alert(texto);
		}
	});
	 
	
	
});
