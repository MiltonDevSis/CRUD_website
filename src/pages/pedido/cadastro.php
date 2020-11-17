<?php
/* Cadastro PHP */

// Opção de execução do arquivo
$op = isset($_GET["op"])?$_GET["op"]:'';

if ($op == "add"){
	// Armazena as mensagens de erro
	$retorno = [];

	$datapedido = $_GET["datapedido"];
	if ($datapedido == ''){
		$retorno = array(
			"error_code" => 2,
			"error_msg" => "Data é obrigatório."
		);
		echo json_encode($retorno);
		exit;
	}

	// Conexão com banco de dados
	$conexao = new PDO ("mysql:host=localhost;dbname=modelagem;port=3308", "root", "");
	
	$id 		= isset($_GET["id"])?$_GET["id"]:0;
	if ($id > 0){
		$instrucao = "UPDATE pedido SET datapedido = STR_TO_DATE('{$datapedido}', '%d/%m/%Y') WHERE id = {$id};";
	}else{
		$instrucao = "INSERT INTO pedido (id,datapedido) VALUES (DEFAULT,STR_TO_DATE('{$datapedido}', '%d/%m/%Y'));";
	}

	if ($conexao->exec($instrucao)){
		$retorno = array(
			"error_code" => 0,
			"error_msg" => "Salvo Com Sucesso"
		);
	}else{
		$retorno = array(
			"error_code" => 1,
			"error_msg" => "Erro ao salvar. Motivo => Erro na instrução SQL."
		);
	}
	echo json_encode($retorno);
	exit;
}