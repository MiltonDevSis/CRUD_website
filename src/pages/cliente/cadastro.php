<?php 
// Opção para listar níveis de usuário
	$op = isset($_GET["op"])?$_GET["op"]:'';
	if ($op == 'add'){
			// Recebendo as variaveis
		$id 		= $_GET["id"];
		$nome 		= $_GET["nome"];
		$cpf_cnpj 	= $_GET["cpf_cnpj"];
		$telefone 	= $_GET["telefone"];
		$email 		= $_GET["email"];
	
		if ($nome == ""){
		echo 'O campo nome é obrigatório';
		exit;
	}

	if (strlen($nome) < 3){
		echo 'O campo nome tem que ter pelo menos 3 caracteres';
		exit;
	}

		// Conexão com banco de dados
		$conexao = new PDO( "mysql:host=localhost;dbname=modelagem;port=3308", "root", "" );
		if (isset($id)){
		if (is_numeric($id)){
			if ($id > 0){
				$instrucaoSQL = "UPDATE cadastro_cliente SET nome = '{$nome}', cpf_cnpj = '{$cpf_cnpj}', telefone = '{$telefone}', email = '{$email}' WHERE id = " .$id;
			}else{
				$instrucaoSQL = "INSERT INTO cadastro_cliente (nome, cpf_cnpj, telefone, email) VALUES ('{$nome}', '{$cpf_cnpj}', '{$telefone}', '{$email}');";
			}
		}else{
			echo 'Parametro  inválido';
			exit;
		}
	}else{
		echo 'Identificador do registro não foi encontrado.';
		exit;
	}	
	$result = $conexao->exec($instrucaoSQL);
	if ($result == true){
		echo 'Salvo com sucesso';
	}else{
		echo 'Erro ao salvar';
	}
	exit;	
	}					
?>
