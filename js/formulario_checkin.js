$(document).ready( function (){
	$( "#tipoQuarto" ).change(function() {
		
		var tipoQuarto = $( "#tipoQuarto option:selected" ).val();
		
		function preenchenSelectQuartos(data) {
		    $("#quartosDisponiveis").empty();
			$(data).each(function() {
				var id = this.id;
				var numeroQuarto = this.numeroQuarto;
				$('#quartosDisponiveis').append($('<option>', {id : id, value: id}).text(numeroQuarto));
			});
		}
		function avisarErro(x, y, z) {
			alert(x);
		}
		
		var jqXHR = $.ajax( {
			url: "carregarQuartos.php?estado=livre&tipoQuarto=" + tipoQuarto,
			method: "GET"
			});
		
		jqXHR.done(preenchenSelectQuartos );
		jqXHR.fail(avisarErro);
	});
	
	
	
});
$(document).on('click','#confirmar',function(e){
	e.preventDefault();
	return false;	
});
$(document).on('click','#pesquisar', function(e){
	e.preventDefault();
	return false;	
});