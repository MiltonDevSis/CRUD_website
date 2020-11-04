<?php
	// Opção para listar níveis de usuário
	$op = isset($_GET["op"])?$_GET["op"]:'';	
	if ($op == 'listar'){
		// Conexão com banco de dados
		$conexao = new PDO ("mysql:host=localhost;dbname=modelagem;port=3308", "root", "");
		// query
		$sql = "SELECT id,nome,cpf_cnpj,telefone,email FROM cadastro_cliente;";
		// Dataset
		$resultSet = $conexao->query($sql);
		// retorna os dados em JSON
		echo json_encode($resultSet->fetchAll(PDO::FETCH_ASSOC));
		exit;
	}