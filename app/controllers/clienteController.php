<?php
	require_once ROOT.PROJECT.PATH_MODELS.'clienteModel.php';
	require_once ROOT.PROJECT.PATH_MODELS.'ubicacionModel.php';
	class clienteController extends Controller{
		public $twig;
		private $model;
		private $ubic;

		function __construct(){
			$this->twig = parent::ftwig('client/');
			$this->model = new clienteModel();
			$this->ubic = new ubicacionModel();
		}

		public function index(){
			echo $this->twig->render('index.twig');
		}

		public function agregar(){
			$title = 'Agregar cliente';
			$ubic = $this->ubic->all();
			echo $this->twig->render('add.twig',compact('title','ubic'));
		}

		public function add($values){
			$title = 'Agregar cliente';
			$ubic = $this->ubic->all();
			if (!isset($values['cmail'])) {
				$values['mail'] = '';
				$values['pass'] = '';
				$values['cpass'] = '';
			}

			if ($values['pass'] === $values['cpass']) {
				// code...
			}else {
				$alert = array('type' => 'danger', 'message' => "<strong>Error</strong>! Las contraseñas no coinciden");
				echo $this->twig->render('add.twig',compact('title','ubic','alert'));
			}

		}
	}
?>
