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

		public function index(){
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
			$title = 'Editar ubicacion';

			$ubic = $this->model->getone($param);
			// print_r($ubic);
			echo $this->twig->render('edit.twig',compact('title','ubic'));
		}

		public function edit($params){
			$title = 'Editar ubicacion';

			if ($this->model->edit($params)) {
				$alert = array('type' => 'success', 'message' => "La ubicacion \"<strong>".$params['uname']."</strong>\" se agrego exitosamente");
				$red = true;
			} else {
				$alert = array('type' => 'danger', 'message' => "<strong>Error</strong>! Se produjo un error interno al intentar editar la ubicacion \"".$params['uname']."\"");
				$red = false;
			}
			echo $this->twig->render('edit.twig',compact('alert','title','red'));
		}

		public function remove($param){
			$title = 'Ubicaciones';
			$ubic = $this->model->getone($param);
			if ($this->model->delete($param)) {
				$red = true;
				$alert = array('type' => 'success', 'message' => "La ubicacion \"<strong>".strtoupper($ubic['ubicacion'])."</strong>\" se elimino exitosamente");
			}else {
				$red = false;
				$alert = array('type' => 'danger', 'message' => "<strong>Error</strong>! Se produjo un error interno al intentar editar la ubicacion \"".$ubic['ubicacion']."\"");
			}
			echo $this->twig->render('del.twig',compact('alert','title','red'));
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
