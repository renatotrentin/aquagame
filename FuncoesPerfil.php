<?php 
	class FuncoesPerfil{
		public $db;

		public function __construct(){
			$db = new Conexao();
			$this->db = $db->conectar();
		}

		public function mostrarDados($valor){
			$query = $this->db->prepare("SELECT * from usuario where $_SESSION[id]=id_usuario");
			$query->execute();

			if($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
				echo $encontrar[$valor];
			}
		}

		public function salvarEdicao(){
			if(isset($_POST['salvar'])){
				$query = $this->db->prepare("UPDATE usuario set 
					nome_usuario=:nome,
					usuario_usuario=:usuario,
					email_usuario=:email,
					senha_usuario=:senha
					where $_SESSION[id]=id_usuario");

				$query->bindValue(":nome", $_POST['nome'], PDO::PARAM_STR);
				$query->bindValue(":usuario", $_POST['usuario'], PDO::PARAM_STR);
				$query->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
				$query->bindValue(":senha", hash("sha256", $_POST['senha']), PDO::PARAM_STR);
				$query->execute();

				echo "<script> window.location.replace('tela_perfil.php'); </script>";
			}
		}

		public function mostrarImagem($valor){
			$query = $this->db->prepare("SELECT * from pontuacao where $_SESSION[id]=usuario_pontos");
			$query->execute();

			while($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
				// imagem 1
				if($encontrar['pontos_pontuacao'] >= 2500 and $valor==12){
					echo "midia/images/verde_12.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 3500 and $valor==11){
					echo "midia/images/verde_11.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 2000 and $valor==10){
					echo "midia/images/verde_10.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 1500 and $valor==9){
					echo "midia/images/verde_09.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 5500 and $valor==8){
					echo "midia/images/verde_08.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 4000 and $valor==7){
					echo "midia/images/verde_07.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 500 and $valor==6){
					echo "midia/images/verde_06.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 6000 and $valor==5){
					echo "midia/images/verde_05.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 5000 and $valor==4){
					echo "midia/images/verde_04.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 4500 and $valor==3){
					echo "midia/images/verde_03.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 3000 and $valor==2){
					echo "midia/images/verde_02	.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 1000 and $valor==1){
					echo "midia/images/verde_01.png";
				}

				// imagem 2
				elseif($encontrar['pontos_pontuacao'] >= 10000 and $valor==24 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images2/beach_12.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 10500 and $valor==23 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images2/beach_11.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 9500 and $valor==22 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images2/beach_10.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 11000 and $valor==21 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images2/beach_09.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 6500 and $valor==20 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images2/beach_08.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 9000 and $valor==19 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images2/beach_07.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 7500 and $valor==18 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images2/beach_06.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 7000 and $valor==17 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images2/beach_05.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 11500 and $valor==16 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images2/beach_04.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 8000 and $valor==15 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images2/beach_03.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 12000 and $valor==14 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images2/beach_02	.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 8500 and $valor==13 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images2/beach_01.png";
				}


				// imagem 3
				elseif($encontrar['pontos_pontuacao'] >= 14000 and $valor==36 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images3/nature_12.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 15000 and $valor==35 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images3/nature_11.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 13500 and $valor==34 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images3/nature_10.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 15500 and $valor==33 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images3/nature_09.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 14500 and $valor==32 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images3/nature_08.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 12500 and $valor==31 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images3/nature_07.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 16000 and $valor==30 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images3/nature_06.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 17000 and $valor==29 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images3/nature_05.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 13000 and $valor==28 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images3/nature_04.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 16500 and $valor==27 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images3/nature_03.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 18000 and $valor==26 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images3/nature_02	.png";
				}
				elseif($encontrar['pontos_pontuacao'] >= 17500 and $valor==25 and $encontrar['compra_img_pontuacao']>=1){
					echo "midia/images3/nature_01.png";
				}



				// caso nao possua nenhuma imagem
				elseif($encontrar['pontos_pontuacao'] < 500 and $valor==0){
					echo "Nada descoberto ainda!";
				}
			}
		}

		public function magia500(){
			$query = $this->db->prepare("SELECT * from pontuacao where $_SESSION[id]=usuario_pontos");
			$query->execute();

			while($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
				echo $encontrar['moedas_pontuacao'];
			}
		}

		public function inserir_magia500(){
			$query = $this->db->prepare("SELECT * from pontuacao where $_SESSION[id]=usuario_pontos");
			$query->execute();

			while($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
				if(isset($_POST['comprar'])){
					if ($encontrar['moedas_pontuacao']>=30){
						$query=$this->db->prepare("UPDATE pontuacao set magia500_pontuacao=:magia500 where $_SESSION[id]=usuario_pontos");
						$query->bindValue(":magia500", $encontrar['magia500_pontuacao']+=5, PDO::PARAM_STR);
						$query->execute();

						$query=$this->db->prepare("UPDATE pontuacao set moedas_pontuacao=:moedas where $_SESSION[id]=usuario_pontos");
						$query->bindValue(":moedas", $encontrar['moedas_pontuacao']-=30, PDO::PARAM_STR);
						$query->execute();

						echo "<script> window.location.replace('tela_perfil.php'); </script>";
					}
				}elseif($encontrar['moedas_pontuacao']<30){
					echo "<div style='color:yellow;'>Moedas insuficientes!</div>";
				}
			}
		}

		public function inserir_img1(){
			$query = $this->db->prepare("SELECT * from pontuacao where $_SESSION[id]=usuario_pontos");
			$query->execute();

			while($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
				if(isset($_POST['comprar_img1'])){
					if ($encontrar['moedas_pontuacao']>=10){
						$query=$this->db->prepare("UPDATE pontuacao set compra_img_pontuacao=:img1 where $_SESSION[id]=usuario_pontos");
						$query->bindValue(":img1", $encontrar['compra_img_pontuacao']+=1, PDO::PARAM_STR);
						$query->execute();

						$query=$this->db->prepare("UPDATE pontuacao set moedas_pontuacao=:moedas where $_SESSION[id]=usuario_pontos");
						$query->bindValue(":moedas", $encontrar['moedas_pontuacao']-=10, PDO::PARAM_STR);
						$query->execute();

						echo "<script> window.location.replace('tela_perfil.php'); </script>";
					}
				}
			}
		}
		public function verifica_img1(){
			$query = $this->db->prepare("SELECT * from pontuacao where $_SESSION[id]=usuario_pontos");
            $query->execute();

            while($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
                if($encontrar['compra_img_pontuacao']==0){
                	echo "<div class='container-fluid' style='background: #572121; padding: 15px;'>
                    <div class='row'>
                        <div class='col-lg-2 col-sm-3 col-xs-5 col-md-2'>
                            <img src='midia/comprar-2.png' class='bordadafoto'>
                        </div>
                        <div class='col-lg-10 col-sm-9 col-xs-7 col-md-10 compra_mobile'>
                            <h2 class='estilo_mobileh2'>Imagem (10 moedas)</h2> 
                            <h4 class='estilo_mobileh4'>Desbloqueie uma nova imagem para completar.</h4>
                            <form method='post'>
                                <button type='submit' name='comprar_img1' class='btn btn-comprar'>COMPRAR</button>
                            </form>";
                            if($encontrar['moedas_pontuacao']<10){
								echo "<div style='color:yellow;'>Moedas insuficientes!</div>";
							}
                           
                    echo "</div>
                    	  </div>
                		  </div>";
                }
            }
		}





		public function inserir_img2(){
			$query = $this->db->prepare("SELECT * from pontuacao where $_SESSION[id]=usuario_pontos");
			$query->execute();

			while($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
				if(isset($_POST['comprar_img2'])){
					if ($encontrar['moedas_pontuacao']>=10){
						$query=$this->db->prepare("UPDATE pontuacao set compra_img2_pontuacao=:img2 where $_SESSION[id]=usuario_pontos");
						$query->bindValue(":img2", $encontrar['compra_img2_pontuacao']+=1, PDO::PARAM_STR);
						$query->execute();

						$query=$this->db->prepare("UPDATE pontuacao set moedas_pontuacao=:moedas where $_SESSION[id]=usuario_pontos");
						$query->bindValue(":moedas", $encontrar['moedas_pontuacao']-=25, PDO::PARAM_STR);
						$query->execute();

						echo "<script> window.location.replace('tela_perfil.php'); </script>";
					}
				}
			}
		}
		public function verifica_img2(){
			$query = $this->db->prepare("SELECT * from pontuacao where $_SESSION[id]=usuario_pontos");
            $query->execute();

            while($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
                if($encontrar['compra_img2_pontuacao']==0){
                	echo "<div class='container-fluid' style='background: #23644C; padding: 15px;'>
                    <div class='row'>
                        <div class='col-lg-2 col-sm-3 col-xs-5 col-md-2'>
                            <img src='midia/comprar-3.jpg' class='bordadafoto'>
                        </div>
                        <div class='col-lg-10 col-sm-9 col-xs-7 col-md-10 compra_mobile'>
                            <h2 class='estilo_mobileh2'>Imagem 2 (25 moedas)</h2> 
                            <h4 class='estilo_mobileh4'>Desbloqueie uma nova imagem para completar.</h4>
                            <form method='post'>
                                <button type='submit' name='comprar_img2' class='btn btn-comprar'>COMPRAR</button>
                            </form>";
                            if($encontrar['moedas_pontuacao']<25){
								echo "<div style='color:yellow;'>Moedas insuficientes!</div>";
							}
                           
                    echo "</div>
                    	  </div>
                		  </div>";
                }
            }
		}


	}


?>