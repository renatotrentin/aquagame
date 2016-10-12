<?php 
	class UsuarioMaster{
		public $db;
		public $valor;

		public function __construct(){
			$db = new Conexao();
			$this->db = $db->conectar();
		}

		public function mostrarOpcao(){
			$query = $this->db->prepare("SELECT * from usuario where $_SESSION[id]=28 or $_SESSION[id]=29");
			$query->execute();

			if($_SESSION['id']==28 or $_SESSION['id']==29){
				echo "<li>
                        <a href='tela_aprovar.php'><div class='cor_menu'>Aprovar pergunta</div></a>
                      </li>";
			}
		}

		public function listagemPerguntas(){
			$query = $this->db->prepare("SELECT * from usuario where $_SESSION[id]=28 or $_SESSION[id]=29");
			$query->execute();

			if($_SESSION['id']==28 or $_SESSION['id']==29){
				$query = $this->db->prepare("SELECT * from pergunta where aprovar_pergunta=0");
				$query->execute();

				while($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
					if($encontrar['nivel_pergunta']==1){
						$nivel = "FÁCIL";
					}
					elseif($encontrar['nivel_pergunta']==2){
						$nivel = "MÉDIO";
					}
					elseif($encontrar['nivel_pergunta']==3){
						$nivel = "DIFÍCIL";
					}

					if($encontrar['certa_pergunta']==1){
						$check = "active";
					}
					elseif($encontrar['certa_pergunta']==2){
						$check = "active";
					}
					elseif($encontrar['certa_pergunta']==3){
						$check = "active";
					}
					elseif($encontrar['certa_pergunta']==4){
						$check = "active";
					}

					echo "<div class='container'>";

					echo "<h1 class='estiloperguntas'>".$encontrar['pergunta_pergunta']."</h1>";
					echo "<h4>Nível da pergunta: ".$nivel."</h4><br>";
					echo "<div class='form-group' data-toggle='buttons'>
							<div class='col-md-12 estiloletras' data-toggle='buttons'>
								
								<label class='btn btn-opcao1'>
									<input type='radio' name='resposta' id='radios-0' value='1'>
									<span class='glyphicon glyphicon-ok'></span>
								</label> &nbsp ".$encontrar['r1_pergunta']."
								<br>
								
								<label class='btn btn-opcao2'>
									<input type='radio' name='resposta' id='radios-1' value='2'>
									<span class='glyphicon glyphicon-ok'></span>
								</label> &nbsp ".$encontrar['r2_pergunta']."
								<br>
								
								<label class='btn btn-opcao3'>
									<input type='radio' name='resposta' id='radios-1' value='3'>
									<span class='glyphicon glyphicon-ok'></span>
								</label> &nbsp ".$encontrar['r3_pergunta']."
								<br>
								
								<label class='btn btn-opcao4'>
									<input type='radio' name='resposta' id='radios-1' value='4' required=''>
									<span class='glyphicon glyphicon-ok'></span>
								</label> &nbsp ".$encontrar['r4_pergunta']."
								
						    </div>
						    <input type='hidden' value='$encontrar[id_pergunta]' name='id'>
							</div>

							<div>
							
							<div class='form-group'>
						    <label for='singlebutton'></label>
						    <div class='col-md-4'>
						    <br>
						    <form method='POST'>
						    	<button type='submit' id='singlebutton' name='aprovar' class='btn btn-aprovar' value='$encontrar[id_pergunta]'>Aprovar
						    	</button>
						    	&nbsp
						    	<button type='submit' id='singlebutton' name='excluir' class='btn btn-enviar-excluir' value='$encontrar[id_pergunta]'>Excluir
						    	</button>
						    </form>";

						    if (isset($_POST['aprovar'])){
								$query = $this->db->prepare("SELECT * from pergunta where id_pergunta=$_POST[aprovar]");
								$query->execute();

								while($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
									$query2=$this->db->prepare("UPDATE pergunta set aprovar_pergunta=:aprova where id_pergunta=$_POST[aprovar]");
									$query2->bindValue(":aprova", $encontrar['aprovar_pergunta']+=1, PDO::PARAM_STR);
									$query2->execute();
									echo "<script> window.location.replace('tela_aprovar.php'); </script>";
								}
							}

							if (isset($_POST['excluir'])){
								$query = $this->db->prepare("SELECT * from pergunta where id_pergunta=$_POST[excluir]");
								$query->execute();

								while($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
									$query2=$this->db->prepare("DELETE from pergunta where id_pergunta=$_POST[excluir]");
									$query2->execute();
									echo "<script> window.location.replace('tela_aprovar.php'); </script>";
								}
							}

				    echo "</div>
			    		  </div>";
					   
					echo "</div>";	
					echo "<div class='col-lg-4'></div>";
					echo "</div>";
				}	
			}	
		}

		public function aprovarPergunta(){
			$query = $this->db->prepare("SELECT * from pergunta where $_SESSION[id]=id_usuario and id_pergunta=$this->valor");
			$query->execute();

					
			if($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
				$query=$this->db->prepare("UPDATE pontuacao set aprovar_pergunta=:aprova where $_SESSION[id]=usuario_pontos");
				$query->bindValue(":aprova", $encontrar['aprovar_pergunta']=1, PDO::PARAM_STR);
				$query->execute();
			}
		}
	}
?>