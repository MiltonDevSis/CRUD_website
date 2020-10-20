<?php
	$nome  = $_POST["nome"];
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	$nivel = $_POST["nivel"];

	if ( $nome == "" ){
		echo 'Nome é obrigatório';
		exit;
	}

	if ( $login == "" ){
		echo 'Login é obrigatório';
		exit;
	}

	if ( $nivel == "" ){
		echo 'Nível de usuário é obrigatório';
		exit;
	}

	if ( $senha == "" ){
		echo 'Senha é obrigatório';
		exit;
	}
	$conexao = new PDO( "mysql:host=localhost;dbname=modelagem;port=3308", "root", "" );
	$instrucaoSQL = "INSERT INTO dados_usuario (nome, login, senha, nivel) VALUES ('$nome','$login','$senha','$nivel');";
	$result = $conexao->exec($instrucaoSQL);
	if($result){
		echo 'Salvo com sucesso';
	}else{
		echo 'Erro ao salvar';	
	}