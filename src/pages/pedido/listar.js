// Arquivo JS de Listagem de Pedido
$("#btn-novo").click(function(){
	carregar("page","pedido/cadastro");
});

// Carrega os níveis de usuário para lista (table)
function carregarPedido(){
	$.ajax({
		url:"index.php",
		dataType:"JSON",
		data:{
			controller:"page",
			page:"pedido/listar",
			op:"listar"
		},
		beforeSend:function(){
			// Limpa as linhas da tabela
			$("#listar-pedido tbody").html("");
		},
		complete:function(ret){			
			var retorno = ret.responseJSON;
			if (retorno.length > 0){
				retorno.forEach(function(dado){
					var tr 				= $("<tr>");
					var tdID 			= $("<td>"+dado.id+"</td>");
					var tdDataPedido 	= $("<td>"+dado.datapedido+"</td>");
					var tdStatus		= $("<td></td>");
					var tdEditar 		= $("<td><a href=\"#\" onclick=editar('"+JSON.stringify(dado)+"');>Editar</a></td>");
					var tdExcluir 		= $("<td><a onclick=\"excluir("+dado.id+")\" href=\"#\">Excluir</a></td>");
					
					tr.append(tdID);
					tr.append(tdDataPedido);
					tr.append(tdStatus);
					tr.append(tdEditar);
					tr.append(tdExcluir);
					
					$("#listar-pedido tbody").append(tr);
					$(".nenhum-registro").remove();
				});
			}
		}
	});
}

// Executa quando a página terminar de carregar
$(document).ready(function(){
	carregarPedido();
});

// Editar
function editar(dado){
	var dado = JSON.parse(dado);
	$.ajax({
		url:"index.php",
		data:{
			controller:"page",
			page:"pedido/cadastro"
		},
		complete:function(ret){
			$("#conteudo").html(ret.responseText);
			$("#id").val(dado.id);
			$("#datapedido").val(dado.datapedido);
		}
	});
}

// Excluir Registro
function excluir(id){
	if (confirm('Tem certeza que deseja excluir ?')){
		$.ajax({
			url:"index.php",
			data:{
				controller:"page",
				page:"pedido/listar",
				op:"excluir",
				id:id
			},
			complete:function(ret){
				var retorno = JSON.parse(ret.responseText);
				if (retorno.error_code == 0){
					carregarPedido();
				}else{
					alert(retorno.error_msg);
				}
			}
		});
	}
}