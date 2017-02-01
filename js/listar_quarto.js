function pesquisar(estadoQuarto)
{
	var page = "listarquarto.php";
	$.ajax
		({
			type: 'POST';
			dataType: 'html';
		    url: page,
		    beforeSend: function(){
		    	$("#dados").html("Carregando....");
		    },
		    data: {estadoQuarto: estadoQuarto },
		    success: function (msg)
		    {
		    	$("#dados").html(msg);
		    }
		})
	
}

$('#confirmar').click(function(){
	buscarListarQuarto($("#estadoQuarto").val())
})
