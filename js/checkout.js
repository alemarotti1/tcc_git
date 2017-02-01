function pesquisar(quartosOcupados)
{
	var page = "checkout.php";
	$.ajax
		({
			type: 'POST';
			dataType: 'html';
		    url: page,
		    beforeSend: function(){
		    	$("#dados").html("Carregando....");
		    },
		    data: {quartosOcupado: quartosOcupados },
		    success: function (msg)
		    {
		    	$("#dados").html(msg);
		    }
		})
	
}

$('#pesquisar').click(function(){
	buscarCheckout($("#quartosOcupados").val())
})