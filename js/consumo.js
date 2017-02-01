var clicou = false;
$(document).ready( function (){
	var id = 0;
	
	$("#add").click(function() {
		var tabela = 
			'<tr id="produto-'+ id +'">' +
				"<td name='nome'>" + $('#produto').val() + "</td>" + 
				"<td name='quant'>" + $('#quantidade').val() + "</td>"+
				"<td name='val'>" + $('#valor').val() + "</td>	"+
				'<td style="width: 5%; text-align:left;"><input type="button" class="btn btn-primary" name="del-'+id++ +'" value="-"></td>;'+
			"</tr>";
		$('#lista_consumo').append(tabela);
		clicou = true;
	});
	
	$("#RegistrarConsumo").click(function() {
		
	});
	
	$("#CalcularConsumo").click(function() {
		
	});
	
	
	
	
});
$("#add").mouseleave(function() {
	 	$("input[name ^= 'del']").click(function() {
			$($(this).parent()).parent().remove();
		}); 
});

$("#CalcularConsumo").click(function() {
	$("tr[id ^= 'produto']").each(function(index, obj) {
		console.log($(obj).children("td[name='val']").text());
	});
});


