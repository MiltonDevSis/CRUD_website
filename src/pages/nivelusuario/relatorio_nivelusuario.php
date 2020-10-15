<!DOCTYPE html>
	<head>
	<title>Relatório de Nível de usuário</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="estilo.css">

	</head>
	<body>

		<!--<a href="#" onclick="window.print()">Imprimir</a>-->

		<button class="custom-btn btn-1" onclick="window.print()">Imprimir</button>

		<h1>Relatório de nível de usúario</h1>
		<table border="1"> 	<!-- Cria uma tabela -->
			<thead>		<!-- Cria o cabeçalho da tabela -->
				<tr>  	<!-- Cria linhas de uma coluna -->
					<th align="left">ID</th> <!-- Cria colunas na tabela -->
					<th align="left">Descrição</th>
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
						</tr>
						';
					}					
				?>
			</tbody>

			<rfoot>
				<tr>
					<td>Impresso em <?=date("d/m/Y H:i:s")?>.</td>
				</tr>
			</tfoot>

		</table>
	</body>

</html>