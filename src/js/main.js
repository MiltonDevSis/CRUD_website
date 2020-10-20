// Arquivo JS principal do sistema

// Ao carregar o documento, chamar a home do sistema
$(document).ready(function(){
	carregar('home');
});

// Função para carregamento de página
function carregar(controller,page = ""){
	$.ajax({
		url:"index.php",
		data:{
			controller:controller,
			page:page
		},
		complete:function(ret){
			var objetoRetorno = page == ""?"#root":"#conteudo";
			$(objetoRetorno).html(ret.responseText);
		}
	});	
}

// trata o click do menu principal
$(document).on("click", "#menuPrincipal .dropdown-item", function(){
	carregar("page",$(this).data("page"))
});
