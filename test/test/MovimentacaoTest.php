<?php

require '../../../core/model/movimentacao.class.php';

use PHPUnit\Framework\TestCase;

class MovimentacaoTest extends TestCase {

	public function testDataPedido(){

		$this->assertEquals(780, movimentacao::somaMovimentacoes());
	}
}