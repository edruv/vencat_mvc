<?php

	require 'system/config.php';
	require 'system/core/autoload.php';
	require ROOT.PROJECT.'system/vendor/autoload.php';

	$router = new Router();

	// echo "<pre>";
	// print_r($router->getUri());
	// echo "</pre>";

	$controller = $router->getController();
	$metodo = $router->getMethod();
	$parame = $router->getParam();

	// echo "controlador: $controller </br>";
	// echo "metodo: $metodo </br>";
	// echo "parametro: $parame </br>";

	// require PATH_CONTROLLERS."{$controller}Controller.php";
	// // require PATH_CONTROLLERS."{$controller}/{$controller}Controller.php";
	// $controller .= 'Controller';
	//
	// $controller = new $controller();
	// $controller->$metodo();

	if (file_exists(PATH_CONTROLLERS."{$controller}Controller.php")) {
		require PATH_CONTROLLERS."{$controller}Controller.php";
		// echo PATH_CONTROLLERS."{$controller}Controller.php";
		// require PATH_CONTROLLERS."{$controller}/{$controller}Controller.php";
		$controller .= 'Controller';

		$controller = new $controller();
		$controller->$metodo($parame);
	}else {
		$loader = new Twig_Loader_Filesystem(ROOT.PROJECT.PATH_VIEWS.'errors/');
		$twig = new Twig_Environment($loader,[]);

		$css = PATH_RESOURCES.'css/404.css';
		$controller = $controller;

		echo $twig->render('404.twig',compact('css','controller'));
	}

?>
