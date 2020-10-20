<?php
$page 	 = isset($_GET["page"])?$_GET["page"]:'';

//carrega arquivo css
$cssFile = "src/pages/{$page}.css";
if (file_exists($cssFile)){
	echo "<link href='' rel='stylesheet' />";	
}
//carrega arquivo php
$phpFile = "src/pages/{$page}.php";
if (file_exists($phpFile)){
	include $phpFile;
}

//carrega arquivo JS
$jsFile = "src/pages/{page}.js";
if(file_exists($jsFile)){
	echo "<script type='text/javascript' src={$jsFile}";
}