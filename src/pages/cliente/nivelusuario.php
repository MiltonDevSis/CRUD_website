<?php
	$conexao = new PDO( "mysql:host=localhost;dbname=modelagem;port=3308", "root", "" );
	
	// modo de edição
	if (isset($_GET["id"])){
		$id = $_GET["id"];
		
		$sql = "SELECT (nome, cpf_cnpj, telefone, email) FROM cadastro_cliente WHERE id = " . $id . " LIMIT 1;";
		$resultSet = $conexao -> query($sql);
		if ( $linha = $resultSet -> fetch() ){
			$nome 		= $linha["nome"];
			$cpf_cnpj 	= $linha["cpf_cnpj"];
			$telefone 	= $linha["telefone"];
			$email 		= $linha["email"];
		}else{
			echo 'Nenhum registro encontrado';
			exit;
			}
			//modo de Inserção
		}else{
			$id = 0;				
			$nome = "";
			$cpf_cnpj = "";
			$telefone = "";
			$email = "";
		}
?>
<html>
	<head>
		<title>Cadastro clientes</title>
	</head>
	<body>
		<script type="text/javascript">	
		</script>
	</body>
</html>