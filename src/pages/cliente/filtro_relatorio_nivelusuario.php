<!DOCTYPE html>
	<head>
		<title>Filtro de Nível de Usuário</title>
		<meta charset="utf-8">
	</head>
	<body>
		<form action="relatorio_nivelusuario.php" method="POST" target="_blank"> <!--(Blank) abre uma aba nova, (self) abre na mesma aba-->
			<fieldset>
				<legend>Pesquisa</legend>
				<label for="id">ID </label>
				<input type="text" id="id" name="id" />
				<label for="nome">Nome</label>
				<input type="text" id="nome" name="nome" />
				<label for="cpf_cnpj">CPF /CNPJ</label>
				<input type="text" id="cpf_cnpj" name="cpf_cnpj" />
				<label for="telefone">Telefone</label>
				<input type="text" id="telefone" name="telefone" />
				<label for="email">Email</label>
				<input type="text" id="email" name="emaiç" />
				<input type="submit" value="imprimir" />
			</fieldset>
		</form>	
	</body>
</html>