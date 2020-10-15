// Arquivo JS principal do sistema

// Ao carregar o documento, chamar a home do sistema
$(document).ready(function(){
	carregar('home');
});

// Função para carregamento de página
function carregar(controller){
	$.ajax({
		url:"index.php",
		data:{
			controller:controller
		},
		complete:function(ret){
			$("#root").html(ret.responseText);
		}
	});	
}

