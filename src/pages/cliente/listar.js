function excluir(usuario){

	$.ajax({
		url:"index.php",
		dataType:"JSON",
		data:{
			controller:"page",
			page:"cliente/excluir",
			id:usuario
		},
		complete:function(ret){
			carregarCliente();
		}
	});	
}

// Carrega os níveis de usuário para lista (table)
function carregarCliente(){
	$.ajax({
		url:"index.php",
		dataType:"JSON",
		data:{
			controller:"page",
			page:"cliente/listar",
			op:"listar"
		},
		beforeSend:function(){
			$("#listar-cliente tbody").html("");
		},
		complete:function(ret){
			var retorno = ret.responseJSON;
			retorno.forEach(function(dado){
				var tr 				= $("<tr>");
				var tdID 			= $("<td>"+dado.id+"</td>");
				var tdNome		 	= $("<td>"+dado.nome+"</td>");
				var tdCpf_cnpf		= $("<td>"+dado.cpf_cnpj+"</td>");
				var tdTelefone		= $("<td>"+dado.telefone+"</td>");
				var tdEmail		 	= $("<td>"+dado.email+"</td>");
				var tdEditar 		= $("<td><button onclick=\"editar("+dado.id+")\">Editar</button></td>");
				var tdExcluir 		= $("<td><button onclick=\"excluir("+dado.id+")\">Excluir</button></td>");
				
				tr.append(tdID);
				tr.append(tdNome);
				tr.append(tdCpf_cnpf);
				tr.append(tdTelefone);
				tr.append(tdEmail);
				tr.append(tdEditar);
				tr.append(tdExcluir);
				
				$("#listar-cliente tbody").append(tr);
			});				
		}
	});
}

// Executa quando a página terminar de carregar
$(document).ready(function(){
	carregarCliente();
});

$("#btn-novo").click(function(){
	carregar("page","cliente/cadastro");
});