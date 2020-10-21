<?php
	$conexao = new PDO( "mysql:host=localhost;dbname=modelagem;port=3308", "root", "" );
	
	// modo de edição
	if (isset($_GET["id"])){
		$id = $_GET["id"];
		
		$sql = "SELECT descricao FROM descricao_usuario WHERE id = " . $id . " LIMIT 1;";
		$resultSet = $conexao -> query($sql);
		if ( $linha = $resultSet -> fetch() ){
			$descricao = $linha["descricao"];
		}else{
			echo 'Nenhum registro encontrado';
			exit;
			}
			//modo de Inserção
		}else{
			$id = 0;				
			$descricao = "";
		}
?>

<html>
	<head>
		<title>Nível de Usuário</title>
	</head>
	<body>

		<script type="text/javascript">
		
		</script>
	</body>
</html>