<?php
$page 	 = isset($_GET["page"])?$_GET["page"]:'';

//carrega arquivo php
$phpFile = "src/pages/{$page}.php";
if (file_exists($phpFile)){
	include $phpFile;
}

// Carrega arquivo CSS
$cssFile = "src/pages/{$page}.css";
if (file_exists($cssFile)){
	echo "<link href='{$cssFile}' rel='stylesheet' />";
}

// Carrega arquivo HTML
$htmlFile 	= "src/pages/{$page}.html";
if (file_exists($htmlFile)){
	include $htmlFile;
}

//carrega arquivo JS
$jsFile = "src/pages/{page}.js";
if(file_exists($jsFile)){
	echo "<script type='text/javascript' src='{$jsFile}'></script>";
}

