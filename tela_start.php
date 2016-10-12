<?php 
	require_once "Conexao.php";
	session_start();
	require_once "VerificarLogin.php";
	new VerificarLogin();

	if(!isset($_SESSION['usuario'])){
		header ("location: index.php");
	}

	require_once "SelecionarPerguntas.php";
	$pega = new SelecionarPerguntas();

	require_once "FuncoesRanking.php";
	$rank = new FuncoesRanking();

	require_once "FuncoesPerfil.php";
	$imgs = new FuncoesPerfil();
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
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                    	<a data-toggle="modal" href="#finalizar"><div class="cor_menu">Sair</div></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <br><br>

    <!-- CRONOMETRO 
    <center>
    	<h1 id="clock1">
    		<script>setTimeout('cronometro()',1000);</script>
    	</h1>
    </center>
    <h1 id="pegar_cronometro" onchange="cronometro()" value="0"></h1>
     FIM DO CRONOMETRO -->
     

    <form class='form-horizontal' method='post'>
		<?php $pega->sortearPerguntas(); ?>
	</form>

	<?php $pega->atualizarPontos(); ?>
	
	<?php //$pega->inserirPontuacao(); ?>


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


	<!-- Imagem se formando abaixo das perguntas -->
	<div class="container-fluid">
		<div class="col-lg-4"></div>
		    <div class="col-lg-4">
			    <div class="col-lg-12">
			    	<div class="row">
			    		
			    		<div class="col-lg-3 col-xs-3">
			    			<img src="<?php $valor=1; $imgs->mostrarImagem($valor) ?>" class="img-responsive">
			    		</div>
			    		<div class="col-lg-3 col-xs-3">
			    			<img src="<?php $valor=2; $imgs->mostrarImagem($valor) ?>" class="img-responsive">
			    		</div>
			    		<div class="col-lg-3 col-xs-3">
			    			<img src="<?php $valor=3; $imgs->mostrarImagem($valor) ?>" class="img-responsive">
			    		</div>
			    		<div class="col-lg-3 col-xs-3">
			    			<img src="<?php $valor=4; $imgs->mostrarImagem($valor) ?>" class="img-responsive">
			    		</div>
			    	</div>
			    	<div class="row">
			    		<div class="col-lg-3 col-xs-3">
			    			<img src="<?php $valor=5; $imgs->mostrarImagem($valor) ?>" class="img-responsive">
			    		</div>
			    		<div class="col-lg-3 col-xs-3">
			    			<img src="<?php $valor=6; $imgs->mostrarImagem($valor) ?>" class="img-responsive">
			    		</div>
			    		<div class="col-lg-3 col-xs-3">
			    			<img src="<?php $valor=7; $imgs->mostrarImagem($valor) ?>" class="img-responsive">
			    		</div>
			    		<div class="col-lg-3 col-xs-3">
			    			<img src="<?php $valor=8; $imgs->mostrarImagem($valor) ?>" class="img-responsive">
			    	</div>
			    	<div class="row">
			    		</div>
			    		<div class="col-lg-3 col-xs-3">
			    			<img src="<?php $valor=9; $imgs->mostrarImagem($valor) ?>" class="img-responsive">
			    		</div>
			    		<div class="col-lg-3 col-xs-3">
			    			<img src="<?php $valor=10; $imgs->mostrarImagem($valor) ?>" class="img-responsive">
			    		</div>
			    		<div class="col-lg-3 col-xs-3">
			    			<img src="<?php $valor=11; $imgs->mostrarImagem($valor) ?>" class="img-responsive">
			    		</div>
			    		<div class="col-lg-3 col-xs-3">
			    			<img src="<?php $valor=12; $imgs->mostrarImagem($valor) ?>" class="img-responsive">
			    		</div>
			    	</div>
			    </div>
		    </div>
		<div class="col-lg-4"></div>
	</div>

</body>
</html>
