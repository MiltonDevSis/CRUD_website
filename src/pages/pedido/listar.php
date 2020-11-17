<?php
	// Conexão com banco de dados
	$conexao = new PDO ("mysql:host=localhost;dbname=modelagem;port=3308", "root", "");

	// Opção para listar
	$op = isset($_GET["op"])?$_GET["op"]:'';	
	if ($op == 'listar'){
		
		// Query SQL
		$sql = "SELECT id,DATE_FORMAT(datapedido,'%d/%m/%Y') datapedido FROM pedido;";

		// Dataset
		$resultSet = $conexao->query($sql);
		echo json_encode($resultSet->fetchAll(PDO::FETCH_ASSOC));
	
		// Para a execução do script para não recarregar a página
		exit;
	}

	if ($op == "excluir"){
		$sql = "DELETE FROM pedido WHERE id = " . $_GET["id"].";";
		if ($conexao->exec($sql)){
			echo json_encode(array(
				"error_code" => 0
			));
		}else{
			echo json_encode(array(
				"error_code" => 1,
				"error_msg" => "Erro ao excluir" 
			));
		}
		
		// Para a execução do script para não recarregar a página
		exit;		
	}	