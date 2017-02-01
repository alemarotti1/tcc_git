$( document ).ready( function() {

	
	function carregarInformacao( pessoa ) {
		$('#nome').val( pessoa.nome );
		$('#profissao').val( pessoa.profissao );
		$('#telefone').val(pessoa.telefone)
		$('#nacionalidade').val( pessoa.nacionalidade );
		$('#nascimento').val( pessoa.nascimento );
		$('#identidade').val( pessoa.identidade );
		$('#cep').val( pessoa.cep );
		$('#endereco').val( pessoa.endereco );
		$('#cidade').val( pessoa.cidade );
		$('#estado').val( pessoa.estado );
		$('#pais').val( pessoa.pais );
		
	}
	
	function avisarErro(x, y, z) {
		
	}	
	
	
	
	function pesquisarCpf(){
		var cpf = $( "#cpf" ).val();
		if(validarCPF(cpf)){
			var jqXHR = $.ajax( {
				url: "carregarHospede.php?cpf=" + cpf,
				method: "GET"
				} );
			jqXHR.done( carregarInformacao );
			jqXHR.fail( avisarErro );
		}else{
			alert('cpf invalido');
		}
		
	}
	$('#pesquisar').click(pesquisarCpf);
	$('#cpf').focusout(pesquisarCpf);
	
	function pesquisarCpf(){
		var cpf = $( "#cpf" ).val();
		if(validarCPF(cpf)){
			var jqXHR = $.ajax( {
				url: "carregarHospede.php?cpf=" + cpf,
				method: "GET"
				} );
			jqXHR.done( carregarInformacao );
			jqXHR.fail( avisarErro );
		}else{
			alert('cpf invalido');
		}
	}
	
	
	$('#numeroDeHospedes').change(function() {
		if($('#numeroDeHospedes').val()<0){
			$('#numeroDeHospedes').val=0;
			alert("numero de hospedes não pode ser menor que 0");
		}
	});
	//-----------------------------------------funções do datetime picker-----------------------------------------
	$.datetimepicker.setLocale('pt');
	$('#dataNascimento').datetimepicker({
		  timepicker:false,
		  format:'d/m/Y',
		  inline:false,
		  lang:'pt'
		});
	$('.calendario').datetimepicker({
		  format:'d/m/Y H:i',
		  inline:false,
		  lang:'pt'
		});
	 $('#telefone').mask('(00) 00000-0000', {placeholder:"(__) _____-____"});
	 $('#nascimento').mask('99/99/9999', {placeholder:"__/__/____"});
	 
	 $('#cpf').mask('000.000.000-00', {placeholder:"___.___.___-__"});
	 $('#cep').mask('00.000-000', {placeholder:"__.___-___"});
	 
});

