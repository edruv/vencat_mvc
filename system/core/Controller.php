<?php
	/**
	 *
	 */
	abstract class Controller{
		function __construct(){
			echo __CLASS__ .' instanciada';
		}

		abstract public function index();

		public function ftwig($path = ''){
			$loader = new Twig_Loader_Filesystem([ROOT.PROJECT.PATH_VIEWS.'layouts/',ROOT.PROJECT.PATH_VIEWS.$path]);
			$twig = new Twig_Environment($loader,[]);
			return $twig;
		}
	}
?>
