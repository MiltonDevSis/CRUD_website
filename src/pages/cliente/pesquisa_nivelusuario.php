<!DOCTYPE html>
	<head>
		<title>Pesquisa Cadastro de Clientes</title>
		<meta charset="utf-8">
	</head>
	<body>
		<form action="listar.php" method="POST" target="resultado">
			<fieldset>
				<legend>Pesquisa</legend>
				<label for="id">ID </label>
				<input type="text" id="id" name="id" />
				<label for="nome">Nome</label>
				<input type="text" id="nome" name="nome" />
				<label for="nome">CPF / CNPJ</label>
				<input type="text" id="cpf_cnpj" name="cpf_cnpj" />
				<label for="nome">Telefone</label>
				<input type="text" id="telefone" name="telefone" />
				<label for="nome">Email</label>
				<input type="text" id="email" name="email" />
			</fieldset>
		</form>	
		<iframe id="resultado" name="resultado" src="listar.php" frameborder="0"></iframe>
	</body>
</html>