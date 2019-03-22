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
	}

?>
