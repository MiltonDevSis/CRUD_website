<?php
	// Opção para listar níveis de usuário
	$op = isset($_GET["op"])?$_GET["op"]:'';	
	if ($op == 'listar'){
		// Conexão com banco de dados
		$conexao = new PDO ("mysql:host=localhost;dbname=modelagem;port=3308", "root", "");
		
		$where = '';
		if (isset($_POST["id"])){
			$id = $_POST["id"]==""?0:$_POST["id"]; # IF inline
			if ($id > 0){
				$where = $where . " AND id = {$id}";
			}
		}else{
			$id = 0;
		}
		if (isset($_POST["descricao"])){
			$descricao = $_POST["descricao"];
			$where = $where .  " AND descricao LIKE '%{$descricao}%'";
		}else{
			$descricao = '';
		}

		$sql = "SELECT id,descricao FROM nivelusuario WHERE 1=1 {$where};";
		// Dataset
		$resultSet = $conexao->query($sql);
		echo json_encode($resultSet->fetchAll(PDO::FETCH_ASSOC));
	
		// Para a execução do script para não recarregar a página
		exit;
	}