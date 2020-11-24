<?php

class Pedido {
	public static function isValidDate($datapedido, $padrao = "ptBR"){

		switch($padrao){
			case "ptBR":
				$data_sem_caracteres = str_replace("/","",$datapedido);
				if (strlen($data_sem_caracteres) != 8){
					return false;
				}
				$dia = substr($data_sem_caracteres, 0, 2);
				$mes = substr($data_sem_caracteres, 2, 2);
				$ano = substr($data_sem_caracteres, 4, 4);
				
				if ($dia < 1 || $dia > 31) return false;
				if ($mes < 1 || $dia > 12) return false;

				if ($dia.$mes == '2512') return false;

				return true;
			break;
		}
		return false;
	} 	


	public static function getCountDataInvalida(){
		$cont = 0;

		// Conexão com banco de dados
		$conexao = new PDO ("mysql:host=localhost;dbname=modelagem;port=3308", "root", "");
		
		// Query
		$sql = "SELECT DATE_FORMAT(datapedido, '%d/%m/%Y') data FROM pedido;";
		// Dataset
		$resultSet = $conexao->query($sql);
		while ($linha = $resultSet->fetch()){
			if (!Pedido::isValidDate($linha["data"],"ptBR")){
				$cont++;
			}
		}
		return $cont;
	}
}
