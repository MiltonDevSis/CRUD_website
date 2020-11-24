<?php

require '../../../core/model/pedio.class.php';

use PHPUnit\Framework\TestCase;

class PedidoTest extends TestCase {

	public function testDataPedido(){

		#CT-2
		$this->assertTrue(Pedido::isValidDate("23/11/2020", "ptBR"));

		#CT-3
		$this->assertFalse(Pedido::isValidDate("2/11/2020", "ptBR"));
	}

	public function testDataPedidoBD(){

		#CT-6
		$this->assertEquals(0, Pedido::getCountDataInvalida());
	}
}