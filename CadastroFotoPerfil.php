<?php
// Conexão com o banco de dados
	class CadastroFotoPerfil{
		public $db;

		public function __construct(){
			$db = new Conexao();
			$this->db = $db->conectar();
		}

		public function upload_foto(){ 
			// Se o usuário clicou no botão cadastrar efetua as ações
			if (isset($_POST['upload'])) {
				
				// Recupera os dados dos campos
				$foto = $_FILES["imagem_perfil"];
				
				// Se a foto estiver sido selecionada
				if (!empty($foto["name"])) {
					
					// Largura máxima em pixels
					$largura = 1200;
					// Altura máxima em pixels
					$altura = 2500;
					// Tamanho máximo do arquivo em bytes
					$tamanho = 2500000;
			 
			    	// Verifica se o arquivo é uma imagem
			    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
			     	   // $error[1] = "Isso não é uma imagem.";
			    		$error[1] = "";
			   	 	} 
				
					// Pega as dimensões da imagem
					$dimensoes = getimagesize($foto["tmp_name"]);
				
					// Verifica se a largura da imagem é maior que a largura permitida
					if($dimensoes[0] > $largura) {
						//$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
						$error[2] = "";
					}
			 
					// Verifica se a altura da imagem é maior que a altura permitida
					if($dimensoes[1] > $altura) {
						// $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
						$error[3] = "";
					}
					
					// Verifica se o tamanho da imagem é maior que o tamanho permitido
					if($foto["size"] > $tamanho) {
			   		 	// $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
			   		 	$error[4] = "";
					}
			 
					// Se não houver nenhum erro
					if (count($error) == 0) {
					
						// Pega extensão da imagem
						preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
			 
			        	// Gera um nome único para a imagem
			        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
			 
			        	// Caminho de onde ficará a imagem
			        	$caminho_imagem = "fotos/" . $nome_imagem;
			 
						// Faz o upload da imagem para seu respectivo caminho
						move_uploaded_file($foto["tmp_name"], $caminho_imagem);

						// Insere os dados no banco
						$query = $this->db->prepare("SELECT * from usuario where $_SESSION[id]=id_usuario");
						$query->execute();

						if($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
							if ($encontrar['foto_usuario']!="avatar07082016fdshrufdufvhudfghsd7485345.png"){
								unlink("fotos/".$encontrar['foto_usuario']);
							}
						}

						$query = $this->db->prepare("UPDATE usuario set 
						foto_usuario=:foto where $_SESSION[id]=id_usuario");

						//$query = $this->db->prepare("INSERT INTO usuario (foto_usuario) VALUES (:foto)");
						$query->bindValue(":foto", $nome_imagem, PDO::PARAM_STR);
						$query->execute();

						// Se os dados forem inseridos com sucesso
						if ($query){
							//echo "Imagem cadastrada com sucesso";
							echo "<script> window.location.replace('tela_perfil.php'); </script>";
						}
					}
				
					// Se houver mensagens de erro, exibe-as
					if (count($error) != 0) {
						foreach ($error as $erro) {
							echo $erro . "<br />";
						}
					}
				}
			}
		}	

		public function mostrar_imagem(){
			$query = $this->db->prepare("SELECT * from usuario where $_SESSION[id]=id_usuario");
			$query->execute();

			if($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
				echo "fotos/".$encontrar['foto_usuario'];
			}
		}





		public function upload_fundo(){ 
			// Se o usuário clicou no botão cadastrar efetua as ações
			if (isset($_POST['upload_fundo'])) {
				
				// Recupera os dados dos campos
				$foto = $_FILES["imagem_fundo"];
				
				// Se a foto estiver sido selecionada
				if (!empty($foto["name"])) {
					
					// Largura máxima em pixels
					$largura = 1920;
					// Altura máxima em pixels
					$altura = 1080;
					// Tamanho máximo do arquivo em bytes
					$tamanho = 2500000;
			 
			    	// Verifica se o arquivo é uma imagem
			    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
			     	   // $error[1] = "Isso não é uma imagem.";
			    		$error[1] = "";
			   	 	} 
				
					// Pega as dimensões da imagem
					$dimensoes = getimagesize($foto["tmp_name"]);
				
					// Verifica se a largura da imagem é maior que a largura permitida
					if($dimensoes[0] > $largura) {
						//$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
						$error[2] = "";
					}
			 
					// Verifica se a altura da imagem é maior que a altura permitida
					if($dimensoes[1] > $altura) {
						// $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
						$error[3] = "";
					}
					
					// Verifica se o tamanho da imagem é maior que o tamanho permitido
					if($foto["size"] > $tamanho) {
			   		 	// $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
			   		 	$error[4] = "";
					}
			 
					// Se não houver nenhum erro
					if (count($error) == 0) {
					
						// Pega extensão da imagem
						preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
			 
			        	// Gera um nome único para a imagem
			        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
			 
			        	// Caminho de onde ficará a imagem
			        	$caminho_imagem = "fotos/" . $nome_imagem;
			 
						// Faz o upload da imagem para seu respectivo caminho
						move_uploaded_file($foto["tmp_name"], $caminho_imagem);

						// Insere os dados no banco
						$query = $this->db->prepare("SELECT * from usuario where $_SESSION[id]=id_usuario");
						$query->execute();

						if($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
							if ($encontrar['fundo_usuario']!="fundo07082016fdshrufdufvhudfghsd7485345.jpg"){
								unlink("fotos/".$encontrar['fundo_usuario']);
							}
						}

						$query = $this->db->prepare("UPDATE usuario set 
						fundo_usuario=:fundo where $_SESSION[id]=id_usuario");

						// cl_image_tag($nome_imagem, array("quality"=>90));
						$query->bindValue(":fundo", $nome_imagem, PDO::PARAM_STR);
						$query->execute();

						// Se os dados forem inseridos com sucesso
						if ($query){
							//echo "Imagem cadastrada com sucesso";
							echo "<script> window.location.replace('tela_perfil.php'); </script>";
						}
					}
				
					// Se houver mensagens de erro, exibe-as
					if (count($error) != 0) {
						foreach ($error as $erro) {
							echo $erro . "<br />";
						}
					}
				}
			}
		}

		public function mostrar_imagem_fundo(){
			$query = $this->db->prepare("SELECT * from usuario where $_SESSION[id]=id_usuario");
			$query->execute();

			if($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
				echo "fotos/".$encontrar['fundo_usuario'];
			}
		}

	}
?>

