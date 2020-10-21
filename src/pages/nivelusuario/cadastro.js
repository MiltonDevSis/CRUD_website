// Arquivo JS cadastro de Nível de Usuário
$("#btn-salvar").click(function(){
	if (!validar()) return false;
	$.ajax({
		url:"index.php",
		data:{
			controller:"page",
			page:"nivelusuario/cadastro",
			op:"add",
			id:$("#id").val(),
			descricao:$("#descricao").val()
		},
		complete:function(ret){
			
		}
	});
});

// Valida os dados do formulário
function validar(){
	var descricao = document.getElementById("descricao");
	if (descricao.value == ""){
		//alert('O campo descrição é obrigatório.');
		descricao.style.backgroundColor = "#FF8C00";
		descricao.style.color = "#FFFFFF";
		descricao.focus();
		return false;
	}
	if (descricao.value.length < 3){
		alert('O campo descrição precisa ter no mínimo 3 caracteres');
		return false;
	}
	return true;
}