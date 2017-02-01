	$(document).ready( function (){
	$( "#quartosOcupados" ).change(function() {
		var numeroQuarto = $( "#quartosOcupados option:selected" ).val();
		
		
		function preencherConsumo(data) {
		    $("#").empty();
			$(data).each(function() {
				var id = this.id;
				var numeroQuarto = this.numeroQuarto;
				$('#quartosOcupados').append($('<option>', {id : id}).text(numeroQuarto));
			});
		}
		function avisarErro(x, y, z) {
			alert(z);
		}
		
		var jqXHR = $.ajax( {
			url: "carregarConsumo.php?numeroQuarto=" + numeroQuarto,
			method: "GET"
			} );
		jqXHR.done( preenchenConsumo );
		jqXHR.fail( avisarErro );
		
	});
	
	
});