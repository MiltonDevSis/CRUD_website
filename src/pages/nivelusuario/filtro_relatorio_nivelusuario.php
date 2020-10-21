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
				<label for="descricao">Descrição</label>
				<input type="text" id="descricao" name="descricao" />
				<input type="submit" value="imprimir" />
			</fieldset>
		</form>	
	</body>
</html>