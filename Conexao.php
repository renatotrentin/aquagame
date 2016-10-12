<?php
	class Conexao{
		public static $db;

		public function conectar(){
			if(!self::$db){
				self::$db = $this->conexaoo();
			}
			return self::$db;
		}

		private function conexaoo(){
			$db = new PDO("mysql:host=localhost;dbname=aquagame", "root", "");
			//$db->setAttribute(PDO::ATTR_ERRMODE, ERRMODE_EXCEPTION);
			return $db;
		}
	}

?>