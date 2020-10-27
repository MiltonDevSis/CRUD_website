<!DOCTYPE html>
	<head>
		<title>Pesquisa de Nível de Usuário</title>
		<meta charset="utf-8">
	</head>
	<body>
		<form action="listar_nivelusuario.php" method="POST" target="resultado">
			<fieldset>
				<legend>Pesquisa</legend>
				<label for="id">ID </label>
				<input type="text" id="id" name="id" />
				<label for="descricao">Descrição</label>
				<input type="text" id="descricao" name="descricao" />
				<input type="submit" value="pesquisar" />
			</fieldset>
		</form>	
		<iframe id="resultado" name="resultado" src="listar_nivelusuario" frameborder="0"></iframe>
	</body>
</html>