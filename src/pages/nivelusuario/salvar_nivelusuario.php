<?php

		// recebimento das variaveis.
$id = $_POST["id"];
$descricao =  $_POST["descricao"];

if ( $descricao == "" ){
	echo "O campo descrição é obrigatório";
	exit;
}

if ( strlen($descricao) < 3 ){
	echo "O campo descrição tem que ter pelo menos 3 caracteres";
	exit;
}

		// Conexão com banco de dados.
		
$conexao = new PDO( "mysql:host=localhost;dbname=modelagem;port=3308", "root", "" );

if( isset($id) ){
	if ( is_numeric($id) ){
		if( $id > 0 ){
			$instrucaoSQL = "UPDATE descricao_usuario set descricao = '{$descricao}' WHERE id = " . $id;
		}else{
			$instrucaoSQL = "insert into descricao_usuario (descricao) values ('$descricao');";
		}
	}else{
		echo 'Parametro inválido';
		exit;	
	}		
}else{
	echo 'Identificador do registro não foi encontrado.';
	exit;
}

$result = $conexao->exec($instrucaoSQL);

if($result){
	echo 'Salvo com sucesso';
	exit;
}else{
	echo 'Erro ao salvar';
	exit;
}