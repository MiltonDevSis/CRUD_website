<?php

class Movimentacao {
	public static function somaMovimentacoes(){

		// foreach para percorer os valores das materias primas "no banco de dados". Testado primeiramente com valores estáticos.

		$soma = 0;

		$ferro    = 120;
		$cobre    = 240;
		$plastico = 250;
		$papel    = 170;

		$materiaPrima = array(
		    "Ferro"	   => $ferro,
		    "Cobre"    => $cobre,
		    "Aluminio" => $plastico,
		    "Papel"    => $papel
		);

		foreach ($materiaPrima as $chave => $valor) {
			$soma = $soma + $valor;
		}
		return $soma;
	}
}
