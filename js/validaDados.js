function testaExpressao(variavel, expressao) {
	return expressao.test(variavel);
}

function validarCPF(cpf) {
	cpf = cpf.replace(/[^\d]+/g,'');    
    if(cpf == '') return false; 
    // Elimina CPFs invalidos conhecidos    
    if (cpf.length != 11 || 
        cpf == "00000000000" || 
        cpf == "11111111111" || 
        cpf == "22222222222" || 
        cpf == "33333333333" || 
        cpf == "44444444444" || 
        cpf == "55555555555" || 
        cpf == "66666666666" || 
        cpf == "77777777777" || 
        cpf == "88888888888" || 
        cpf == "99999999999")
            return false;       
    // Valida 1o digito 
    add = 0;    
    for (i=0; i < 9; i ++)       
        add += parseInt(cpf.charAt(i)) * (10 - i);  
        rev = 11 - (add % 11);  
        if (rev == 10 || rev == 11)     
            rev = 0;    
        if (rev != parseInt(cpf.charAt(9)))     
            return false;       
    // Valida 2o digito 
    add = 0;    
    for (i = 0; i < 10; i ++)        
        add += parseInt(cpf.charAt(i)) * (11 - i);  
    rev = 11 - (add % 11);  
    if (rev == 10 || rev == 11) 
        rev = 0;    
    if (rev != parseInt(cpf.charAt(10)))
        return false;       
    return true; 
}


function validaDataHora(dataCompleta) {
	
	var dataPartida = dataCompleta.split(" ");
	var hora = dataPartida[1];
	var data = dataPartida[0];
	return validarData(data) && validarHora(hora);
		
}

function validarData(dataCompleta){

	var data      = dataCompleta.split("/");
	var mesDe30   = data[0]<=30&&(data[1]==4||data[1]==6||data[1]==9||data[1]==11);
	var mesDe31   = data[0]<=31&&(data[1]==1||data[1]==3||data[1]==5||data[1]==7||data[1]==8||data[1]==10||data[1]==12);
	var fevereiro = data[0]<=28&&data[1]==2;
	var bissexto  = data[0]==29&&data[1]==2&&(data[2]%4==0);
	
	return (mesDe30||mesDe31||fevereiro||bissexto);
}
function validarHora(hora) {
	return testaExpressao(hora, /^([0-1][0-9]|2[0-3])[\/.:,-][0-5][0-9]$/);
}
function validaPreco(preco) {
	return testaExpressao(preco, /^([0-9]{1,4})([,.])([0-9]{2})$/);
}

function validarTelefone(telefone) {
	return testaExpressao(telefone, /^1\d\d(\d\d)?$|^0800 ?\d{3} ?\d{4}$|^(\(0?([1-9a-zA-Z][0-9a-zA-Z])?[1-9]\d\) ?|0?([1-9a-zA-Z][0-9a-zA-Z])?[1-9]\d[ .-]?)?(9|9[ .-])?[2-9]\d{3}[ .-]?\d{4}$/);
}


function validarNome(nome) {
	return testaExpressao(nome, /^[A-Za-zÇ-ú ]{1,90}$/);
}

function validarProfissao(profissao) {
	return testaExpressao(profissao, /^[A-Za-zÇ-ú ]{1,45}$/);
}

function validarNacionalidade(nacionalidade) {
	return testaExpressao(nacionalidade, /^[A-Za-zÇ-ú ]{1,90}$/);
}

function validarIdentidade(identidade) {
	return testaExpressao(identidade, /^[\d]{5,15}$/);
}

function validarCep(cep) {
	return testaExpressao(cep, /^[\d]{8}$/);
}

function validarEndereco(endereco) {
    return testaExpressao(endereco, /^[0-9A-Za-zÇ-ú, ]{1,255}$/);
}

function validarCidade(cidade) {
	return testaExpressao(cidade, /^[A-Za-zÇ-ú ]{1,80}$/);
}

function validarEstado(estado) {
	return testaExpressao(estado, /^[A-Za-zÇ-ú ]{1,90}$/);
}

function validarPais(pais) {
	return testaExpressao(pais, /^[A-Za-zÇ-ú ]{1,50}$/);
}

function validarMotivo(motivo) {
	return ((motivo=="lazer_ferias")||(motivo=="negocios")||(motivo=="congreco_feira")||(motivo=="parentes_amigos")||(motivo=="estudos_curso")||(motivo=="religiao")||(motivo=="saude")||(motivo=="parentes_amigos")||(motivo=="estudos_curso")||(motivo=="religiao")||(motivo=="saude")||(motivo=="parentes_amigos")||(motivo=="estudos_curso")||(motivo=="religiao")||(motivo=="saude")||(motivo=="parentes_amigos")||(motivo=="estudos_curso")||(motivo=="religiao")||(motivo=="saude")||(motivo=="compras")||(motivo=="outros"));
}

function validarMeioTransporte(meio) {
	return ((meio=="aviao")||(meio=="automovel")||(meio=="onibus")||(meio=="moto")||(meio=="navio_barco")||(meio=="trem")||(meio=="saude")||(meio=="outros"));
}

function validarProcedencia(procedencia) {
	return testaExpressao(procedencia, /^[A-Za-zÇ-ú ]{1,90}$/);
}

function validarDestino(destino) {
	return testaExpressao(destino, /^[A-Za-zÇ-ú ]{1,90}$/);
}




