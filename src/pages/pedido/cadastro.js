// Cadastro JS
$("#btn-salvar").click(function(){
	// Requisição AJAX
	$.ajax({
		url:"index.php",
		dataType:"JSON",
		data:{
			controller:"page",
			page:"pedido/cadastro",
			op:"add",
			id:$("#id").val(),
			datapedido:$("#datapedido").val()
		},
		complete: function(ret){
			var retorno = ret.responseJSON;
			if (retorno.error_code == 0){
				$("#retorno").addClass("alert-success");
			}else{
				$("#retorno").addClass("alert-danger");
			}
			$("#retorno").html(retorno.error_msg);
		}
	});
});

// Quando a página for carregada
$(document).ready(function(){
	$("#datapedido").mask("99/99/9999");
})