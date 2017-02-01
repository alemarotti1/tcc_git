$(document).ready( function (){
	 $("#nome").hide();
	 $("#cpf").hide();
	 $("#telefone").hide();
	
	$( "input[name='radioOpcaoPesquisa']" ).change(function() {
		 if($("input[name='radioOpcaoPesquisa']:checked").val()=="Nome"){
			 $("#nome").show();
			 $("#cpf").hide();
			 $("#telefone").hide();
			 
		 }
		 else if($("input[name='radioOpcaoPesquisa']:checked").val()=="CPF"){
			 $("#nome").hide();
			 $("#cpf").show();
			 $("#telefone").hide();
		 }
		 else if($("input[name='radioOpcaoPesquisa']:checked").val()=="Telefone"){
			 $("#nome").hide();
			 $("#cpf").hide();
			 $("#telefone").show();
		 }
	});
	
	
});