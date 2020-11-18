<?php

class Pedido {

	public static function isValidDate($datapedido, $padrao = "ptBR"){

		switch($padrao){
			case "ptBR":
				$data_sem_caracteres = str_replace(array("/", "."), "", $datapedido);
			break;
		}
	} 
}