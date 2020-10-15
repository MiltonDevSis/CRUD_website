<?php

$controller = isset($_GET["controller"])?$_GET['controller']:'';

if($controller == ''){
	// Chama a aplicação caso nenhum controlador seja especificado
	include 'app/index.html';
}else{
	// Chama o controller especificado
	$pathController = 'core/controller/'.$controller.'.php';

if ( file_exists($pathController)) {
	include $pathController;
	}
}
