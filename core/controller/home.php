<?php
$model = "core/model/{$controller}.php";
if (file_exists($model)){
	include $model;
}else{
	echo 'Não foi possível carregar o arquivo de modelo';
	exit;
}

$pathLogo = Home::$PATHLOGO;
if (!file_exists($pathLogo)){
	$pathLogo = 'src/img/semimagem.png';
}
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

