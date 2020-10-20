<?php

$controller = isset($_GET["controller"])?$_GET['controller']:'';

if($controller == ''){
	// Chama a aplicação caso nenhum controlador seja especificado
	include 'app/index.html';
}else{
	$model = "core/model/{$controller}.php";
	if (file_exists($model)){
		include $model;
	}
	// Chama o controller especificado
	$pathController = 'core/controller/'.$controller.'.php';
	if ( file_exists($pathController)) {
		include $pathController;
	}

	// chama o view do MVC
	$view = 'core/view/'.$controller.'.html';
	if (file_exists($view)){
		// Pega o conteúdo do arquivo
		$conteudo = file_get_contents($view);
		
			// Procura um padrão de variavel PHP
		if (preg_match_all('/{{[a-z_0-9]+}}/i',$conteudo, $matches)){
			foreach($matches as $match){
				foreach($match as $m){
					$padrao = str_replace(array("{{","}}"),"",$m);
					echo str_replace($m,"${$padrao}",$conteudo);
				}
			}
		}
	}
}
