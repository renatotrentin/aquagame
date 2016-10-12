<?php 
	require_once "Conexao.php";
	session_start();
	require_once "VerificarLogin.php";
	new VerificarLogin();

	if(!isset($_SESSION['usuario'])){
		header ("location: index.php");
	}

	require_once "CadastroPergunta.php";
	$pega = new CadastroPergunta();

	require_once "FuncoesRanking.php";
	$rank = new FuncoesRanking();

	require_once "UsuarioMaster.php";
	$permissao = new UsuarioMaster();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Aqua Game</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  	<script src="js/funcoes.js"></script>
  	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
	<nav id="topNav" class="navbar navbar-default navbar-fixed-top navegacao-inicial">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar cor1"></span>
                    <span class="icon-bar cor2"></span>
                    <span class="icon-bar cor3"></span>
                </button>
                <a class="navbar-brand page-scroll aquagame" href="tela_inicial.php"><div class="cor_menu"> Aqua Game</div></a>
            </div>
            <div class="navbar-collapse collapse" id="bs-navbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a data-toggle="modal" href="#rank"><div class="cor_menu">Ranking</div></a>
                    </li>
                    <li>
                        <a href="tela_perfil.php"><div class="cor_menu">Perfil</div></a>
                    </li>
                    <li>
                        <a data-toggle="modal" href="#cadastrar_perguntas"><div class="cor_menu">Cadastrar perguntas</div></a>
                    </li>
                    <?php $permissao->mostrarOpcao(); ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a data-toggle="modal" href="#finalizar"><div class="cor_menu">Sair</div></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--<header id="first">
        <div class="header-content">
            <div class="inner">
                <a class="btn btn-jogar" href="tela_start.php">JOGAR</a>
            </div>
        </div>
    </header>-->
    <br><br><br><br><br><br><br><br>

    <header>
    	<div class="container-fluid header-content fundo">
    		<a href="tela_start.php">
		  		<span class="glyphicon glyphicon-play" aria-hidden="true"></span>
			</a>
    	</div>
    	 <video autoplay="" loop="" id="video-background-agua">
            <source src="midia/agua-background.mp4" type="video/mp4">
        </video>
    </header>



    <div id="cadastrar_perguntas" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-body janela_modal">
            <div data-dismiss="modal" aria-hidden="true" style="text-align: right; cursor: pointer;">X</div>
        		<h2 class="text-center cor">Cadastrar Perguntas</h2>
        		<h5 class="text-center">Cadastre novas perguntas para o jogo.</h5>
        		<legend></legend>

               	<form class="form-horizontal" method="POST">
					<fieldset>

					<!-- Textarea -->
					<div class="form-group">
					  <label class="col-md-3 control-label" for="pergunta">Pergunta:</label>
					  <div class="col-md-8">                     
					    <textarea placeholder="Digite sua pergunta..." rows="8" cols="12" class="form-control bordas" id="pergunta" name="pergunta" required=""></textarea>
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-3 control-label" for="textinput">Alternativa 1:</label>  
					  <div class="col-md-8">
					  <input id="textinput" name="r1" type="text" placeholder="" class="form-control input-md bordas" required="">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-3 control-label" for="textinput">Alternativa 2:</label>  
					  <div class="col-md-8">
					  <input id="textinput" name="r2" type="text" placeholder="" class="form-control input-md bordas" required="">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-3 control-label" for="textinput">Alternativa 3:</label>  
					  <div class="col-md-8">
					  <input id="textinput" name="r3" type="text" placeholder="" class="form-control input-md bordas" required="">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-3 control-label" for="textinput">Alternativa 4:</label>  
					  <div class="col-md-8">
					  <input id="textinput" name="r4" type="text" placeholder="" class="form-control input-md bordas" required="">
					    
					  </div>
					</div>

					<!-- Select Basic -->
					<div class="form-group">
					  <label class="col-md-3 control-label" for="selectbasic">RESPOSTA CORRETA:</label>
					  <div class="col-md-8">
					    <select id="selectbasic" name="certa" class="form-control bordas">
					      <option value="1">Alternativa 1</option>
					      <option value="2">Alternativa 2</option>
					      <option value="3">Alternativa 3</option>
					      <option value="4">Alternativa 4</option>
					    </select>
					  </div>
					</div>

					<!-- Select Basic -->
					<div class="form-group">
					  <label class="col-md-3 control-label" for="selectbasic">NÍVEL DA PERGUNTA:</label>
					  <div class="col-md-8">
					    <select id="selectbasic" name="nivel" class="form-control bordas">
					      <option value="1">Fácil</option>
					      <option value="2">Médio</option>
					      <option value="3">Difícil</option>
					    </select>
					  </div>
					</div>

					<!-- Button -->
					<div class="form-group">
					  <label class="col-md-3 control-label" for="singlebutton"></label>
					  <div class="col-md-8">
					    <button id="singlebutton" name="singlebutton" class="btn btn-enviar btn-block">Cadastrar</button>
					  </div>
					</div>

					</fieldset>
				</form>
				<?php $pega->cadastroPergunta(); ?>


                
        		
        	</div>
        </div>
        </div>
    </div>

    <!-- Modal para mostrar ranking -->
    <div id="rank" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-body janela_modal">
            <div data-dismiss="modal" aria-hidden="true" style="text-align: right; cursor: pointer;">X</div>
        		<h2 class="text-center cor">Ranking Global</h2>
        		<h5 class="text-center">Visualize as maiores pontuações dos jogadores.</h5>
        		<legend></legend>

				<div class="table-responsive container-fluid hidden-xs">
					<table class="table table-hover">
						<tr class="estilotabela">
							<th>Posição</th>
					        <th>Nome</th>
					        <th>Usuário</th>
					        <th>Pontuação</th>
					    </tr>   
					    <?php $rank->rankGlobal(); ?>
				    </table>
				</div>

				<div class="table-responsive container-fluid hidden-lg hidden-md hidden-sm">
					<table class="table table-hover">
						<tr class="estilotabela">
							<th></th>
					        <th>Usuário</th>
					        <th>Pontos</th>
					    </tr>   
					    <?php $rank->rankGlobal_mobile(); ?>
				    </table>
				</div>

        	</div>
        </div>
        </div>
    </div>


    <!-- Modal para finalizar sessão -->
    <div id="finalizar" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-body janela_modal">
            <div data-dismiss="modal" aria-hidden="true" style="text-align: right; cursor: pointer;">X</div>
        		<h2 class="text-center cor">Finalizar Sessão</h2>
        		<h5 class="text-center">Você deseja finalizar a sessão e sair do jogo?</h5>
        		<legend></legend>

        		<div class="col-lg-2"></div>
               	<div class="col-lg-4 col-xs-6">
					<button data-dismiss="modal" aria-hidden="true" class="btn btn-enviar btn-block">Cancelar</button>
        		</div>

        		<div class="col-lg-4 col-xs-6">
					<a href="index.php"><button id="singlebutton" name="singlebutton" class="btn btn-enviar btn-block">Finalizar</button></a>
        		</div>
        		<div class="col-lg-2"></div>

        		<br><br><br>
        		
        	</div>
        </div>
        </div>
    </div>

</body>
</html>