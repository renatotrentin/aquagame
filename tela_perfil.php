<?php 
	require_once "Conexao.php";
	session_start();
	require_once "VerificarLogin.php";
	new VerificarLogin();

	if(!isset($_SESSION['usuario'])){
		header ("location: index.php");
	}

	require_once "FuncoesPerfil.php";
	$pega = new FuncoesPerfil();

    require_once "CadastroUsuario.php";
    $foto = new CadastroUsuario();

    require_once "CadastroFotoPerfil.php";
    $upload = new CadastroFotoPerfil();
?>

<!DOCTYPE html>
<html class="no-js">
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

    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
    <link rel="stylesheet" type="text/css" href="css/component.css">
</head>
<body>

	<!-- Menu com foto de perfil -->
	<header>
        <div class="header-content">
            <div class="inner">
                
                <!-- upload da imagem de capa -->
                <div style="text-align: right; margin-top: -25px;">
                    <div class="container-fluid">
                        <div class="row">   
                           <div class="content" title="A imagem de fundo deve ter largura máxima: 1920px e altura máxima: 1080px">
                                <form method="POST" enctype="multipart/form-data" name="upload_img_fundo">
                                    <input type="file" name="imagem_fundo" id="file-3" class="inputfile" />
                                    <label for="file-3"><span class="glyphicon glyphicon-picture" aria-hidden="true" style="font-size: 30px; margin:-10px;"></span></label>
                                    
                                    <button style="text-align: right; margin: -50px; outline:none; box-shadow: none;" name="upload_fundo" type="submit" class="btn btn-file btn-block">SALVAR</button>
                                    <br><br><br>
                                </form>
                                <?php $upload->upload_fundo(); ?>                                        
                            </div> 
                        </div>
                    </div>
                </div>
                

                <h1 class="cursive"><?php $valor="nome_usuario"; $pega->mostrarDados($valor); ?></h1>
                <br>

                <center>
	                <div class="row">
		                <div class="col-lg-4 col-sm-3 col-xs-3 col-md-3"></div>
		                	<div class="col-lg-4 col-sm-6 col-xs-6 col-md-6">
		                		<div class="col-lg-4 col-sm-4 col-md-4"></div>
			                		
                                    <!--<div class="col-lg-4 col-sm-4 col-xs-12 col-md-4">
			                			<img src="midia/icon.png" class="img-responsive bordadafoto">
			                		</div>-->

                                    <section>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-4 col-xs-12 col-md-4">
                                                    <a href="" class="gallery-box">
                                                        <!-- <img src="midia/avatar.png" class="img-responsive bordadafoto"> -->
                                                        <img src="<?php $upload->mostrar_imagem();?>" width="auto" height="200px" class="bordadafoto hidden-xs hidden-sm">
                                                        <img src="<?php $upload->mostrar_imagem();?>" width="auto" height="120px" class="bordadafoto hidden-lg hidden-md hidden-sm">  
                                                        <img src="<?php $upload->mostrar_imagem();?>" width="auto" height="125px" class="bordadafoto hidden-lg hidden-md hidden-xs">  
                                                        <div class="gallery-box-caption">
                                                            <div class="gallery-box-content">
                                                               <div class="content" title="A foto de perfil deve ter largura máxima: 1200px e altura máxima: 2500px">
                                                                    <div class="box">
                                                                        <form method="POST" enctype="multipart/form-data" name="upload_img_perfil">
                                                                            <input type="file" name="imagem_perfil" id="file-2" class="inputfile inputfile-2"/>
                                                                            <label for="file-2"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span></label>
                                                                            <br>
                                                                            <button name="upload" type="submit" class="btn btn-file btn-block" style="outline:none; box-shadow: none;">SALVAR</button>
                                                                        </form>
                                                                        <?php $upload->upload_foto(); ?>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </section> 

		                		<div class="col-lg-4 col-sm-4 col-md-4"></div>
		                	</div>
		                <div class="col-lg-4 col-sm-3 col-xs-3 col-md-3"></div>
	                </div>
                </center>

                <!--<img src="midia/imagem.jpg" id="video-background">-->
                <!-- <video autoplay="" loop="" id="video-background-videoperfil"> -->
            		<!-- <source src="midia/water.mp4" type="video/mp4"> -->
                    <img src="<?php $upload->mostrar_imagem_fundo();?>" id="video-background-videoperfil">
        		<!-- </video> -->
            </div> 
        </div>
    </header>


    <!-- Barra de navegação -->
    <nav id="topNav" class="navbar navbar-default navegacao-perfil">
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
                        <a data-toggle="modal" href="#comprar_itens"><div class="cor_menu">Loja</div></a>
                    </li>
                    <li>
                        <a data-toggle="modal" href="#editar_perfil"><div class="cor_menu">Editar Perfil</div></a>
                    </li>
                    <li>
                        <a href="tela_start.php"><div class="cor">JOGAR</div></a>
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


    <!-- Modal para editar informações do perfil -->
    <div id="editar_perfil" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-body janela_modal">
            <div data-dismiss="modal" aria-hidden="true" style="text-align: right; cursor: pointer;">X</div>
        		<h2 class="text-center cor">Editar Perfil</h2>
        		<h5 class="text-center">Edite suas informações.</h5>
        		<legend></legend>

               	<form class="form-horizontal" method="POST">
					<fieldset>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-3 control-label" for="textinput">Nome:</label>  
					  <div class="col-md-8">
					  <input id="textinput" name="nome" type="text" placeholder="" class="form-control input-md bordas" required="" value="<?php $valor="nome_usuario"; $pega->mostrarDados($valor); ?>">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-3 control-label" for="textinput">Usuário:</label>  
					  <div class="col-md-8">
					  <input id="textinput" name="usuario" type="text" placeholder="" class="form-control input-md bordas" required="" value="<?php $valor="usuario_usuario"; $pega->mostrarDados($valor); ?>">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-3 control-label" for="textinput">Email:</label>  
					  <div class="col-md-8">
					  <input id="textinput" name="email" type="email" placeholder="" class="form-control input-md bordas" required="" value="<?php $valor="email_usuario"; $pega->mostrarDados($valor); ?>">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-3 control-label" for="textinput">Senha:</label>  
					  <div class="col-md-8">
					  <input id="textinput" name="senha" type="password" placeholder="Inserir nova senha" class="form-control input-md bordas" required="">
					    
					  </div>
					</div>

					<!-- Button -->
					<div class="form-group">
					  <label class="col-md-3 control-label" for="singlebutton"></label>
					  <div class="col-md-8">
					    <button id="singlebutton" name="salvar" class="btn btn-enviar btn-block">Salvar</button>
					  </div>
					</div>

					</fieldset>
				</form>
				<?php $pega->salvarEdicao(); ?>

        	</div>
        </div>
        </div>
    </div>



    <!-- IMAGEM 1 -->
    <div class="container-fluid" style="background-color: #fff;">
    	<div class="">
    		<center><h1><?php $valor=0; $pega->mostrarImagem($valor); ?></h1></center>
    		<div class="col-lg-3 col-xs-3">
    			<img src="<?php $valor=1; $pega->mostrarImagem($valor) ?>" class="img-responsive">
    		</div>
    		<div class="col-lg-3 col-xs-3">
    			<img src="<?php $valor=2; $pega->mostrarImagem($valor) ?>" class="img-responsive">
    		</div>
    		<div class="col-lg-3 col-xs-3">
    			<img src="<?php $valor=3; $pega->mostrarImagem($valor) ?>" class="img-responsive">
    		</div>
    		<div class="col-lg-3 col-xs-3">
    			<img src="<?php $valor=4; $pega->mostrarImagem($valor) ?>" class="img-responsive">
    		</div>
    	</div>
    	<div class="">
    		<div class="col-lg-3 col-xs-3">
    			<img src="<?php $valor=5; $pega->mostrarImagem($valor) ?>" class="img-responsive">
    		</div>
    		<div class="col-lg-3 col-xs-3">
    			<img src="<?php $valor=6; $pega->mostrarImagem($valor) ?>" class="img-responsive">
    		</div>
    		<div class="col-lg-3 col-xs-3">
    			<img src="<?php $valor=7; $pega->mostrarImagem($valor) ?>" class="img-responsive">
    		</div>
    		<div class="col-lg-3 col-xs-3">
    			<img src="<?php $valor=8; $pega->mostrarImagem($valor) ?>" class="img-responsive">
    	</div>
    	<div class="">
    		</div>
    		<div class="col-lg-3 col-xs-3">
    			<img src="<?php $valor=9; $pega->mostrarImagem($valor) ?>" class="img-responsive">
    		</div>
    		<div class="col-lg-3 col-xs-3">
    			<img src="<?php $valor=10; $pega->mostrarImagem($valor) ?>" class="img-responsive">
    		</div>
    		<div class="col-lg-3 col-xs-3">
    			<img src="<?php $valor=11; $pega->mostrarImagem($valor) ?>" class="img-responsive">
    		</div>
    		<div class="col-lg-3 col-xs-3">
    			<img src="<?php $valor=12; $pega->mostrarImagem($valor) ?>" class="img-responsive">
    		</div>
    	</div>
    </div>



    <!-- IMAGEM 2 -->
    <div class="container-fluid" style="background-color: #fff;">
        <div class="">
            <center><h1></h1></center>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=13; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=14; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=15; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=16; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
        </div>
        <div class="">
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=17; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=18; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=19; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=20; $pega->mostrarImagem($valor) ?>" class="img-responsive">
        </div>
        <div class="">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=21; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=22; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=23; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=24; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
        </div>
    </div>


    <!-- IMAGEM 3 -->
    <div class="container-fluid" style="background-color: #fff;">
        <div class="">
            <center><h1></h1></center>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=25; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=26; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=27; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=28; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
        </div>
        <div class="">
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=29; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=30; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=31; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=32; $pega->mostrarImagem($valor) ?>" class="img-responsive">
        </div>
        <div class="">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=33; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=34; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=35; $pega->mostrarImagem($valor) ?>" class="img-responsive">
            </div>
            <div class="col-lg-3 col-xs-3">
                <img src="<?php $valor=36; $pega->mostrarImagem($valor) ?>" class="img-responsive">
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




    <!-- Comprar itens -->
    <div id="comprar_itens" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body janela_modal">
            <div data-dismiss="modal" aria-hidden="true" style="text-align: right; cursor: pointer;">X</div>
                <h2 class="text-center cor">Loja</h2>
                <h5 class="text-center">Compre itens para aumentar sua pontuação e ganhar muito mais.</h5>
                <legend></legend>
 
                <!-- <center>
                    <div class="col-lg-6">IMAGENS</div>
                    <div class="col-lg-6">ITENS</div>
                </center> -->

                <center>
                    <h4>Total de moedas: <?php $pega->magia500(); ?></h4>
                </center>

                <div class="container-fluid" style="background: #30063C; padding: 15px;">
                    <div class="row">
                        <div class="col-lg-2 col-sm-3 col-xs-5 col-md-2">
                            <img src="midia/comprar2.png" class=" bordadafoto">
                        </div>
                        <div class="col-lg-10 col-sm-9 col-xs-7 col-md-10 compra_mobile">
                            <h2 class="estilo_mobileh2">+500 (30 moedas)</h2> 
                            <h4 class="estilo_mobileh4">Ganhe 500 pontos por cada resposta correta.</h4>
                            <form method="post">
                                <button type="submit" name="comprar" class="btn btn-comprar">COMPRAR</button>
                            </form>
                            <?php $pega->Inserir_magia500(); ?>
                        </div>
                    </div>
                </div>  
                
                <br>

                <!-- Comprar imagem 1 -->
                <?php $pega->verifica_img1(); ?>
                <?php $pega->inserir_img1(); ?>
                <br>
                <?php $pega->verifica_img2(); ?>
                <?php $pega->inserir_img2(); ?>
                
            </div>
        </div>
        </div>
    </div>


</body>
</html>