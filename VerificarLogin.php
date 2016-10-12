<?php 
	class VerificarLogin{
		public $db;

		public function __construct(){
			$db = new Conexao();
			$this->db = $db->conectar();
			$this->verificar();
		}

		public function verificar(){
			if(isset($_POST['login'])){
				$query = $this->db->prepare("SELECT * FROM usuario WHERE usuario_usuario=? AND senha_usuario=?");
				$query->bindValue(1, $_POST['usuariologin'], PDO::PARAM_STR); 
				$query->bindValue(2, hash("sha256", $_POST['senhalogin']), PDO::PARAM_STR);
				$query->execute();
				//$verifica = $query->fetchObject();

				//if($verifica){
				if($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
					$usuario=$_POST['usuariologin'];
					$senha=$_POST['senhalogin'];
					session_start();
					$_SESSION['usuario']=$usuario;
					$_SESSION['senha']=$senha;
					$_SESSION['id']=$encontrar['id_usuario'];
					header("location: tela_inicial.php"); 

					// insere pontuacao 0 para o usuario
					$query2 = $this->db->prepare("SELECT * from pontuacao inner join usuario on $_SESSION[id]=id_usuario and pontos_pontuacao=0");
					$query2->execute();
					
					if($encontrar = $query2->fetch(PDO::FETCH_ASSOC)){
						if($encontrar['id_usuario']!=$encontrar['usuario_pontos']){
							$query = $this->db->prepare("INSERT into pontuacao (pontos_pontuacao, usuario_pontos) values (0, $_SESSION[id])");
							$query->execute();	
						}
					}


				}else{
					header ("location: index.php");
				}
			}
		}
	}

?>