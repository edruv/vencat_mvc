<?php
	require_once ROOT.PROJECT.PATH_MODELS.'ubicacionModel.php';
	class ubicacionController extends Controller{
		public $twig;
		private $model;
		public $uri;

		function __construct(){
			$this->twig = parent::ftwig('ubics/');
			$this->model = new ubicacionModel();
			$this->uri = explode('/',URI);
		}

		public function index($title=''){
			$title = 'Ubicaciones';
			$ubicall = $this->model->all();
			echo $this->twig->render('index.twig', compact('title','ubicall'));
		}

		public function agregar(){
			$title = 'Agregar ubicacion';
			echo $this->twig->render('add.twig', compact('title'));
		}

		public function add($param){
			$title = 'Agregar ubicacion';

			if (!self::verefy($param)) {
				if ($this->model->add($param)) {
					$alert = array('type' => 'success', 'message' => "La ubicacion \"<strong>".$param['uname']."</strong>\" se agrego exitosamente");
					$red = true;
					echo $this->twig->render('add.twig',compact('title','alert','red'));
				}else {
					$alert = array('type' => 'danger', 'message' => "<strong>Error</strong>! Se produjo un error interno al intentar agergar la ubicacion \"".$param['uname']."\"");
					echo $this->twig->render('add.twig',compact('title','alert'));
				}
			} else {
				$alert = array('type' => 'warning', 'message' => "<strong>Error</strong>! no se ingreso ningun campo");
				echo $this->twig->render('add.twig',compact('title','alert'));
			}

		}

		public function editar($param){
			$title = 'Editar Ubicacion';
			$id = $this->model->getone($param);
			$path = '/'.PROJECT.'ubicacion/edit/'.$id['id'];

			echo $this->twig->render('edit.twig',compact('title','id','path'));
		}

		public function edit($param){
			$title = 'Editar Ubicacion';
			$param['id'] = $this->uri[4];

			if ($this->model->edit($param)) {
				$alert = array('type' => 'success', 'message' => "La ubicacion \"<strong>".$param['uname']."</strong>\" se agrego exitosamente");
				$red = true;
				echo $this->twig->render('edit.twig',compact('alert','title'));
			} else {
				$alert = array('type' => 'danger', 'message' => "<strong>Error</strong>! Se produjo un error interno al intentar editar la ubicacion \"".$param['uname']."\"");
				$red = false;
				$path = '/ubicacion/edit/'.$param['id'];
				echo $this->twig->render('edit.twig',compact('alert','title','red','path'));
			}
		}

		public function getone($id){
			$ubic = $this->model->getone($id);
			echo json_encode($ubic);
		}

		public function verefy($rp){
			return empty($rp['uname']);
		}
	}
?>
