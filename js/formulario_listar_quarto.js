$( document ).ready( function() {
	$("#confirmar").click(function() {
		var estadoQuarto = $( "#estadoQuarto option:selected" ).val();
		
		function listarQuartos(data){
			$(data).each(function() {
				var id = this.id;
				var numeroQuarto = this.numeroQuarto;
				$('#estadoQuarto').append($('<option>', {id : id}).text(numeroQuarto));
			});
		}
		function avisarErro(x, y, z) {
			alert(z);
		}
		
		var jqXHR = $.ajax( {
			url: "carregarQuartos.php?estado=" + estadoQuarto + "&tipoQuarto=todos",
			method: "GET"
			} );
		jqXHR.done( listarQuartos );
		jqXHR.fail( avisarErro );
	});
} );

