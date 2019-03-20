<?php
	class Model{

		protected $db;

		function __construct(){
			$this->db = new PDO('mysql:host='.DBD['host'].';dbname='.DBD['db'],DBD['us'],DBD['ps']);
		}
	}
?>
