<?php 
	class SelecionarPerguntas{
		public $db;

		public function __construct(){
			$db = new Conexao();
			$this->db = $db->conectar();
			//$this->sortearPerguntas();
		}

		public function sortearPerguntas(){
			
			$query = $this->db->prepare("SELECT * from pergunta inner join pontuacao on $_SESSION[id]=usuario_pontos and aprovar_pergunta=1 order by rand() limit 1");
			$query->execute();


			if($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
				if($encontrar['nivel_pergunta']==1){
				$nivel = "Fácil";
				}elseif($encontrar['nivel_pergunta']==2){
					$nivel = "Médio";
				}else{
					$nivel = "Difícil";
				}

				/*echo "<center>
				    	<h1 id='clock1'>
				    		<script>setTimeout('cronometro()',1000);</script>
				    		<h1 id='pegar_cronometro' onchange='cronometro()' value='0'></h1>
				    		<form method='post'> <input type='hidden' value='0' name='cronometro'> </form>
				    	</h1>
				     </center>";*/
				
				//$x = "<script>document.write(segundos)</script>";
				//echo $x;
				     
				echo "<br><br>";
				echo "<div class='col-lg-4'></div>";
				echo "<div class='col-lg-4'>";
				echo "<h4> Pontuação atual: ".$encontrar['pontos_pontuacao']."</h4>";
				echo "<h4> Nível da pergunta: ".$nivel."</h4>";
				echo "<h4> Moedas: ".$encontrar['moedas_pontuacao']."</h4>";
				echo "<h4> +500 disponíveis: ".$encontrar['magia500_pontuacao']."</h4>";
				echo "<h1 class='estiloperguntas'>".$encontrar['pergunta_pergunta']."</h1>";
				echo "<legend></legend>";
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
						<div class='form-group'>
					    <label for='singlebutton'></label>
					    <div class='col-md-4'>
					    	<button type='submit' id='singlebutton' name='enviarperg' class='btn btn-enviar'>Próxima Pergunta</button>
					    </div>
				    </div>";

					echo "</div>";	
					echo "<div class='col-lg-4'></div>";		
			}
		}

		public function atualizarPontos(){
			if($_POST){
				$id = $_POST['id'];
				$query = $this->db->prepare("SELECT * from pontuacao inner join pergunta inner join usuario on $_SESSION[id]=usuario_pontos and id_pergunta=$id");
				$query->execute();

				if($encontrar = $query->fetch(PDO::FETCH_ASSOC)){
					
					if($_POST){

						if($_POST['resposta'] == $encontrar['certa_pergunta']){
							if($encontrar['magia500_pontuacao']>0){
								$_POST['resposta'] = $encontrar['pontos_pontuacao'] + 500;
								$moedas = $encontrar['moedas_pontuacao'] + 1;

								$query2=$this->db->prepare("UPDATE pontuacao set pontos_pontuacao=:pontos, moedas_pontuacao=:moedas, magia500_pontuacao=:magia500 where $_SESSION[id]=usuario_pontos");
								$query2->bindValue(":pontos", $_POST['resposta'], PDO::PARAM_STR);
								$query2->bindValue(":moedas", $moedas, PDO::PARAM_STR);
								$query2->bindValue(":magia500", $encontrar['magia500_pontuacao']-=1, PDO::PARAM_STR);
								$query2->execute();
							}

							elseif($encontrar['nivel_pergunta']==1){
								$_POST['resposta'] = $encontrar['pontos_pontuacao'] + 100;
								$moedas = $encontrar['moedas_pontuacao'] + 1;
							}elseif($encontrar['nivel_pergunta']==2){
								$_POST['resposta'] = $encontrar['pontos_pontuacao'] + 200;
								$moedas = $encontrar['moedas_pontuacao'] + 3;
							}elseif($encontrar['nivel_pergunta']==3){
								$_POST['resposta'] = $encontrar['pontos_pontuacao'] + 300;
								$moedas = $encontrar['moedas_pontuacao'] + 5;
							}

							$query2=$this->db->prepare("UPDATE pontuacao set pontos_pontuacao=:pontos, moedas_pontuacao=:moedas where $_SESSION[id]=usuario_pontos");
							$query2->bindValue(":pontos", $_POST['resposta'], PDO::PARAM_STR);
							$query2->bindValue(":moedas", $moedas, PDO::PARAM_STR);
							$query2->execute();
						}else{
							if($_POST['resposta']!=$encontrar['certa_pergunta'] and $encontrar['magia500_pontuacao']>0){
								$_POST['resposta'] = $encontrar['pontos_pontuacao'] + 0;
								$moedas = $encontrar['moedas_pontuacao'] + 0;

								$query2=$this->db->prepare("UPDATE pontuacao set pontos_pontuacao=:pontos, moedas_pontuacao=:moedas, magia500_pontuacao=:magia500 where $_SESSION[id]=usuario_pontos");
								$query2->bindValue(":pontos", $_POST['resposta'], PDO::PARAM_STR);
								$query2->bindValue(":moedas", $moedas, PDO::PARAM_STR);
								$query2->bindValue(":magia500", $encontrar['magia500_pontuacao']-=1, PDO::PARAM_STR);
								$query2->execute();
							}

							elseif($_POST['resposta']!=$encontrar['certa_pergunta'] and $encontrar['nivel_pergunta']==1){
								$_POST['resposta'] = $encontrar['pontos_pontuacao'] - 80;
							}
							elseif($_POST['resposta']!=$encontrar['certa_pergunta'] and $encontrar['nivel_pergunta']==2){
								$_POST['resposta'] = $encontrar['pontos_pontuacao'] - 50;
							}
							elseif($_POST['resposta']!=$encontrar['certa_pergunta'] and $encontrar['nivel_pergunta']==3){
								$_POST['resposta'] = $encontrar['pontos_pontuacao'] - 30;
							}

							$query2=$this->db->prepare("UPDATE pontuacao set pontos_pontuacao=:pontos where $_SESSION[id]=usuario_pontos");
							$query2->bindValue(":pontos", $_POST['resposta'], PDO::PARAM_STR);
							$query2->execute();
						}
						echo "<script> window.location.replace('tela_start.php'); </script>";
					}
				}
			}
		}


		/*public function inserirPontuacao(){
			$query2 = $this->db->prepare("SELECT * from pontuacao inner join usuario on $_SESSION[id]=id_usuario");
			$query2->execute();
			
			if($encontrar = $query2->fetch(PDO::FETCH_ASSOC)){
				if($encontrar['id_usuario']!=$encontrar['usuario_pontos']){
					$query = $this->db->prepare("INSERT into pontuacao (pontos_pontuacao, usuario_pontos) values (0, $_SESSION[id])");
					$query->execute();	
				}
			}
		}*/
	}


?>