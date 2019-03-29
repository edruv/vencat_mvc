<?php
	require_once ROOT.PROJECT.PATH_MODELS.'clienteModel.php';
	class clienteController extends Controller{
		public $twig;
		private $model;

		function __construct(){
			$this->twig = parent::ftwig('client/');
			$this->model = new clienteModel();
		}

		public function index(){
			echo $this->twig->render('index.twig');
		}

		public function agregar(){
			$title = 'Agregar cliente';
			echo $this->twig->render('add.twig',compact('title'));
		}
	}
?>
