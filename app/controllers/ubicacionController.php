<?php
	require_once ROOT.PROJECT.PATH_MODELS.'ubicacionModel.php';
	class ubicacionController extends Controller{
		public $twig;
		private $model;

		function __construct(){
			$this->twig = parent::ftwig('ubics/');
			$this->model = new ubicacionModel();
		}

		public function index(){
			$title = 'Ubicaciones';
			$ubicall = $this->model->all();
			echo $this->twig->render('index.twig', compact('title','ubicall'));
		}

		public function editar($param){
			echo $param;
		}

	}

?>
