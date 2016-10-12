<?php 
	class CadastroPergunta{
		public $db;

		public function __construct(){
			$db = new Conexao();
			$this->db = $db->conectar();
		}

		public function cadastroPergunta(){
			if($_POST){
				$query = $this->db->prepare("INSERT INTO pergunta (pergunta_pergunta, r1_pergunta, r2_pergunta, r3_pergunta, r4_pergunta, certa_pergunta, nivel_pergunta) VALUES (:pergunta, :r1, :r2, :r3, :r4, :certa, :nivel)");
				$query->bindValue(":pergunta", $_POST['pergunta'], PDO::PARAM_STR);
				$query->bindValue(":r1", $_POST['r1'], PDO::PARAM_STR);
				$query->bindValue(":r2", $_POST['r2'], PDO::PARAM_STR);
				$query->bindValue(":r3", $_POST['r3'], PDO::PARAM_STR);
				$query->bindValue(":r4", $_POST['r4'], PDO::PARAM_STR);
				$query->bindValue(":certa", $_POST['certa'], PDO::PARAM_STR);
				$query->bindValue(":nivel", $_POST['nivel'], PDO::PARAM_STR);
				$query->execute();

				//echo "Pergunta enviada para aprovação!";
				// enviar no email da pessoa caso seja aprovada a pergunta
			}
		}
	}

?>