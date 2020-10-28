<?php

	$conexao = new PDO( "mysql:host=localhost;dbname=modelagem;port=3308", "root", "" );
	$sql = "DELETE FROM cadastro_cliente WHERE id = " . $_GET["id"];

	if ( $conexao -> exec($sql) ){
		echo 1;
	}else{
		echo 0;
	}