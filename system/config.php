<?php
	define('URI', $_SERVER['REQUEST_URI']);
	define('CORE', 'system/core/');
	define('ROOT', $_SERVER['DOCUMENT_ROOT'].'/');
	define('PATH_CONTROLLERS', 'app/controllers/');
	define('PATH_MODELS', 'app/models/');
	define('PATH_VIEWS', 'app/views/');
	$DBD = array('host' => 'localhost','db' => 'vencat','us' => 'root','ps' => '');
	define('DBD', $DBD);
	define('PATH_RESOURCES', 'app/views/resources/');
	define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);
	define('PROJECT', 'vencat/');






?>
