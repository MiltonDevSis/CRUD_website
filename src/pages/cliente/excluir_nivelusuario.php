<?php

	$conexao = new PDO( "mysql:host=localhost;dbname=modelagem;port=3308", "root", "" );
	$sql = "DELETE FROM descricao_usuario WHERE id = " . $_GET["id"];
	if ( $conexao -> exec($sql) ){
		header('location: listar_nivelusuario.php');
	}else{
		echo 'Erro ao excluir';
	}