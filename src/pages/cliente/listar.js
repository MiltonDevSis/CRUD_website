function excluir(id){
	if ( confirm('Tem certeza que deseja excluir!') ){
		window.location.href = "excluir_nivelusuario.php?id=" + id;

	}
}

// Carrega os níveis de usuário para lista (table)
function carregarNivelUsuario(){
	$.ajax({
		url:"index.php",
		dataType:"JSON",
		data:{
			controller:"page",
			page:"cliente/listar",
			op:"listar"
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
				var tdEditar 		= $("<td><a href=\"nivelusuario.php?id="+dado.id+"\">Editar</a></td>");
				var tdExcluir 		= $("<td><a onclick=\"excluir("+dado.id+")\" href=\"#\">Excluir</a></td>");
				
				tr.append(tdID);
				tr.append(tdNome);
				tr.append(tdCpf_cnpf);
				tr.append(tdTelefone);
				tr.append(tdEmail);
				tr.append(tdEditar);
				tr.append(tdExcluir);
				
				$("#listar-nivelusuario tbody").append(tr);
			});				
		}
	});
}

// Executa quando a página terminar de carregar
$(document).ready(function(){
	carregarNivelUsuario();
});

$("#btn-novo").click(function(){
	carregar("page","cliente/cadastro");
});