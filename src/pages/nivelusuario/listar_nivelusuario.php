<html>
	<head>
	<title>Lista de Nível de usuário</title>
	</head>
	<body>
		<a href="nivel.php"> Novo</a>
		<table border="1"> 	<!-- Cria uma tabela -->
			<thead>		<!-- Cria o cabeçalho da tabela -->
				<tr>  	<!-- Cria linhas de uma coluna -->
					<th>ID</th> <!-- Cria colunas na tabela -->
					<th>Descrição</th>
					<th>Editar</th>
					<th>Excluir</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$conexao = new PDO( "mysql:host=localhost;dbname=modelagem;port=3308", "root", "" );
					
					$where = '';
					if ( isset($_POST["id"]) ) {
						$id = $_POST["id"] == ""?0:$_POST["id"];
						if( $id > 0){
							$where = $where. " AND id = {$id}";
						}
					}else{
							$id = 0;
					}
			
					if(isset($_POST["descricao"])){
						$descricao = $_POST["descricao"];
						$where = $where . " AND descricao LIKE '%{$descricao}%'";
					}else{
						$descricao = '';
					}
					
					$sql = "SELECT * FROM descricao_usuario WHERE 1=1 {$where};";
					// dataset
					$resultSet = $conexao->query($sql);
					
					while ($linha = $resultSet->fetch()){
					// var_dump($linha); // explode uma variavel na tela.
					
						echo'
						<tr>
							<td>'.$linha["id"].'</td>
							<td>'.$linha["descricao"].'</td>
							<td><a href="nivel.php?id='.$linha["id"].'"> Editar</a> </td>
							<td><a onclick="excluir('.$linha["id"].')" href="#">excluir</a> </td>
						</tr>
						';
					}					
				?>
			</tbody>
		</table>
		<script type="text/javascript">
			function excluir(id){
				if ( confirm('Tem certeza que deseja excluir!') ){
					window.location.href = "excluir_nivelusuario.php?id=" + id;
				}else{
					alert('Não');
				}
			}	
		</script>
	</body>

</html>