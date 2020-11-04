// Arquivo JS cadastro de clientes
$("#btn-salvar").click(function(){
	if (!validar()) return false;
	$.ajax({
		url:"index.php",
		data:{
			controller:"page",
			page:"cliente/cadastro",
			op:"add",
			id:$("#id").val(),
			nome:$("#nome").val(),
			cpf_cnpj:$("#cpf_cnpj").val(),
			telefone:$("#telefone").val(),
			email:$("#email").val()
		},
		complete:function(ret){
			
		}
	});
});

$("#btn-voltar").click(function(){
	if (!validar()) return false;
	$.ajax({
		url:"index.php",
		data:{
			controller:"page",
			page:"cliente/cadastro",
			op:"listar",
			id:$("#id").val(),
			nome:$("#nome").val(),
			cpf_cnpj:$("#cpf_cnpj").val(),
			telefone:$("#telefone").val(),
			email:$("#email").val()
		},
		complete:function(ret){
			echo"chegou";
		}
	});
});

// Valida os dados do formulário
function validar(){
	var descricao = document.getElementById("nome");
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