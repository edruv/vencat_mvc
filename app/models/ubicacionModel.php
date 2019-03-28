<?php
	class ubicacionModel extends Model
	{
		function __construct(){
			parent::__construct();
		}

		function all(){
			$stmt = $this->db->prepare('SELECT * from ubicacion');
			$stmt->execute();
			$all = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $all;
		}

		function getone($id){
			if (strpos($id,'?') === false) {
				$id = $id;
			} else {
				$id = $_GET['id'];
			}
			$stmt = $this->db->prepare('SELECT * from ubicacion where id=:id');
			$stmt->execute(array(':id' => $id));
			$ubic = $stmt->fetch(PDO::FETCH_ASSOC);
			return $ubic;
		}

		function edit($params){
			$stmt = $this->db->prepare('UPDATE ubicacion set ubicacion=:ubic where id=:id');
			// print_r($params);
			$e = $stmt->execute(array(':ubic' => $params['uname'], ':id' => $params['id']));
			return ($e) ? true : false ;
		}

		public function add($var){
			$add = $this->db->prepare("INSERT into ubicacion(ubicacion) values(:ubi)");
			return $add->execute(array(':ubi' => $var['uname']));

		}

		public function delete($param){
			$del = $this->db->prepare('DELETE from ubicacion where id = :id');
			return ($del->execute(array(':id' => $param))) ? true : false;

		}
	}

?>
