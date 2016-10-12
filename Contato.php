<?php 
	class Contato{
		public $db;

		public function __construct(){
			$db = new Conexao();
			$this->db = $db->conectar();
			//$this->cadastroContato();
		}

		public function cadastroContato(){
			if(isset($_POST['enviar_email'])){
                                $nome = $_POST['nome'];
				$email = $_POST['email'];
				$assunto = $_POST['assunto'];
				$mensagem = $_POST['mensagem'];
 
                                $a = "<html><body style='background: #282828; color: #00ff55; font: 20px verdana; padding: 5px;'>";

                                $a .= "<div> NOME_ <div style='color: #fff'>" .$nome. "</div></div><br>";
                                $a .= "<div> EMAIL_ <div style='color: #fff'><a style='text-decoration: none; color: #fff;'>" .$email. "</div></div></a><br>";
                                $a .= "<div> ASSUNTO_ <div style='color: #fff'>" .$assunto. "</div></div><br>";
                                $a .= "<div> MENSAGEM_ <div style='color: #fff'>" .$mensagem. "</div></div><br>";

                                $a .= '</body></html>'; 

                                // comandos para colocar o nome da pessoa no título do email 
                                $headers  = 'MIME-Version: 1.0' . "\r\n";
                                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                                $headers .= 'From: '.$nome. '<'.$email.'>';

				mail("renatotrentin98@gmail.com", $assunto, $a, $headers);
				echo "Enviado com sucesso";
			}
		}
	}

?>