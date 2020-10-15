<?php
	$conexao = new PDO( "mysql:host=localhost;dbname=modelagem;port=3308", "root", "" );
	
	// modo de edição
	if (isset($_GET["id"])){
		$id = $_GET["id"];
		
		$sql = "SELECT descricao FROM descricao_usuario WHERE id = " . $id . " LIMIT 1;";
	// dataset
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
	<meta charset="utf-8"/>
	<head>
		<title>Nível de Usuário</title>
	</head>
	
	<body>
		<a href="listar_nivelusuario.php">Voltar</a>
		<form onsubmit="return validar();" action="salvar_nivelusuario.php" method="POST">
			<fieldset>
				<input type="hidden" id="id" name="id" value="<?=$id?>"/>
				<legend>Nível de  Usuário</legend>
				<label for="descricao">Descrição</label>
				<input type="text" id="descricao" name="descricao" value="<?=$descricao?>" />
				<br />
				<input type="submit" id="salvar" value="Salvar" />
			</fieldset>
		</form>
		
		<script type="text/javascript">
		
			function validar(){
				var descricao = document.getElementById("descricao");
				
				if (descricao.value == ""){
					alert("O campo descrição é obrigatório.");
					descricao.style.backgroundColor = "#ff8c00";
					descricao.style.color = "#ffffff";
					descricao.focus();
					return false;
				}
				if (descricao.value.length < 3){
					alert("O campo descrição precisa ter no mínimo 3 caracteres");
					return false; 
				}
				return true;
			}			
		</script>				
	</body>
</html>