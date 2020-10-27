<?php 
// Opção para listar níveis de usuário
	$op = isset($_GET["op"])?$_GET["op"]:'';
	if ($op == 'add'){
			// Recebendo as variaveis
		$id 		= $_GET["id"];
		$descricao 	= $_GET["descricao"];
	}

		if ($descricao == ""){
		echo 'O campo descrição é obrigatório';
		exit;
	}

	if (strlen($descricao) < 3){
		echo 'O campo descrição tem que ter pelo menos 3 caracteres';
		exit;
	}

		// Conexão com banco de dados
		$conexao = new PDO( "mysql:host=localhost;dbname=modelagem;port=3308", "root", "" );
		if (isset($id)){
		if (is_numeric($id)){
			if ($id > 0){
				$instrucaoSQL = "UPDATE nivelusuario SET descricao = '{$descricao}' WHERE id = " .$id;
			}else{
				$instrucaoSQL = "INSERT INTO nivelusuario (descricao) VALUES ('{$descricao}');";
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
