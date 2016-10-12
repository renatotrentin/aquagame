<?php 
	class CadastroUsuario{
		public $db;

		public function __construct(){
			$db = new Conexao();
			$this->db = $db->conectar();
		}

		public function cadastroUsuario(){
			if(isset($_POST['criarconta'])){
				$query = $this->db->prepare("INSERT INTO usuario (nome_usuario, usuario_usuario, email_usuario, senha_usuario, foto_usuario, fundo_usuario) VALUES (:nome, :usuario, :email, :senha, :foto, :fundo)");
				$query->bindValue(":nome", $_POST['nome'], PDO::PARAM_STR);
				$query->bindValue(":usuario", $_POST['usuario'], PDO::PARAM_STR);
				$query->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
				$query->bindValue(":senha", hash("sha256", $_POST['senha']), PDO::PARAM_STR);
				$query->bindValue(":foto", "avatar.png", PDO::PARAM_STR);
				$query->bindValue(":fundo", "fundo.jpg", PDO::PARAM_STR);
				$query->execute();	
			}
		}

		public function enviarEmailUsuario(){
			if(isset($_POST['criarconta'])){
                $nome = $_POST['nome'];
                $usuario = $_POST['usuario'];
				$email = $_POST['email'];
 
                $a = "<html><body style='background: #282828; color: #00ff55; font: 20px verdana; padding: 5px;'>";

                $a .= "<div>Seja bem-vindo <div style='color: #fff;'>" .$nome. "</div></div><br>";
                $a .= "<div>Em Aqua Game você poderá aprender, descobrir e se divertir!</div><br>";
                $a .= "<div>Sinta-se a vontade para nos mandar um email para dar um feedback ou tirar alguma dúvida. Você pode se comunicar conosco por este email ou através da área de contato na página inicial do site.</div><br>";
                $a .= "<div style='font: 15px; color: #fff;'>Equipe Aqua Game</div><br>";

                $a .= '</body></html>'; 

                // comandos para colocar o nome da pessoa no título do email 
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: Aqua Game <renatotrentin98@gmail.com>';

				mail($email, "Aqua Game", $a, $headers);
			}
		}
	}

?>