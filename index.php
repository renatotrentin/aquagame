<?php 
    require_once "Conexao.php";
    session_start();
    session_destroy();
    require_once "Contato.php";
    require_once "CadastroUsuario.php";
    require_once "VerificarLogin.php";
    $contato = new Contato();
    $nova_conta = new CadastroUsuario();
    new VerificarLogin();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Aqua Game - Jogue | Aprenda | Descubra</title>
    
    <!-- Funções JS -->
    <script type="text/javascript" src="js/funcoes.js"></script>

    <meta name="description" content="This is a free Bootstrap landing page theme created for BootstrapZero. Feature video background and one page design." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>

    <nav id="topNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar" style="background-color: #00ff55";></span>
                    <span class="icon-bar" style="background-color: #00ff55";></span>
                    <span class="icon-bar" style="background-color: #00ff55";></span>
                </button>
                <a class="navbar-brand page-scroll" href="#first"><i class="ion-leaf"></i> Aqua Game</a>
            </div>
            <div class="navbar-collapse collapse" id="bs-navbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="page-scroll" href="#one">Sobre o jogo</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#last">Entre em contato</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" data-toggle="modal" href="#aboutModal">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header id="first">
        <div class="header-content">
            <div class="inner">
                <h1 class="cursive">Aqua Game</h1>
                <h4>Jogue | Aprenda | Descubra</h4>
                <hr>
                <a href="#aboutModal" data-toggle="modal" class="btn btn-primary btn-xl page-scroll" style="border-radius: 0px;">Comece Agora</a>
            </div>
        </div>
        <video autoplay="" loop="" id="video-background" class="hidden-xs">
            <source src="midia/water.mp4" type="video/mp4">
        </video>
        <img id="video-background" class="hidden-lg hidden-md hidden-sm filtro" src="midia/aquagame.gif" style="opacity: 0.8; -webkit-filter: blur(2px);
    filter: blur(2px);">
    </header>
    <section class="bg-primary" id="one">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 text-center">
                    <h2 class="margin-top-0 text-primary">Sobre o jogo</h2>
                    <br>
                    <p class="text-faded">
                        AQUA é um questionário de perguntas relacionadas a água, onde você irá avaliar o quanto sabe sobre a importância que a água tem em nosso planeta. 
                    <p class="text-faded">
                        O jogo recompensa o jogador conforme ele acerta as respostas e possibilita visualizar o rank global das melhores pontuações.
                    </p>
                    <p class="text-faded">
                        Responda centenas de perguntas diferentes, ganhe conhecimento, receba pontos e descubra...
                    </p>
                    <!--<a href="#three" class="btn btn-default btn-xl page-scroll">Learn More</a>-->
                </div>
            </div>
        </div>
    </section>
    
    
    
    
    <section id="last">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="margin-top-0 wow fadeIn">Entre em Contato</h2>
                    <hr class="primary">
                    <p>O que você achou do jogo? Nos mande seu feedback, sugestão ou qualquer outra dúvida!</p>
                </div>
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <form class="contact-form row" method="POST">
                        <div class="col-md-12">
                            <label></label>
                            <input required="" type="text" class="form-control" placeholder="Nome" name="nome" style="border-radius: 0px;"> 
                        </div>
                        <div class="col-md-12">
                            <label></label>
                            <input required="" type="email" class="form-control" placeholder="Email" name="email" style="border-radius: 0px;">
                        </div>
                        <div class="col-md-12">
                            <label></label>
                            <input required="" type="text" class="form-control" placeholder="Assunto" name="assunto" style="border-radius: 0px;">
                        </div>
                       
                        <div class="col-md-12">
                            <label></label>
                            <textarea required="" class="form-control" rows="9" placeholder="Digite sua mensagem..." name="mensagem" style="border-radius: 0px;"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label></label>
                            <button name="enviar_email" type="submit" class="btn btn-primary btn-block btn-lg botaocontato" style="border-radius: 0px;">Enviar <i class="ion-android-arrow-forward"></i></button>
                        </div>
                    </form>
                    <?php $contato->cadastroContato(); ?>
                    
                </div>
            </div>
        </div>
    </section>
    <footer id="footer">
        <div class="container-fluid">
            <span class="pull-center text-muted small">Desenvolvido por Renato Trentin e Rafael Parisotto Câmara</span>
            <span class="pull-right text-muted small">Landing Zero by BootstrapZero ©2015 Company</span>
        </div>
    </footer>
    <div id="galleryModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-body">
        		<img src="//placehold.it/1200x700/222?text=..." id="galleryImage" class="img-responsive" />
        		<p>
        		    <br/>
        		    <button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true">Close <i class="ion-android-close"></i></button>
        		</p>
        	</div>
        </div>
        </div>
    </div>
    <div id="aboutModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-body">
            <div data-dismiss="modal" aria-hidden="true" style="text-align: right; cursor: pointer">X</div>
        		<h2 class="text-center">Login</h2>
        		<h5 class="text-center">
        		    Faça login para começar ou crie sua conta agora mesmo.
        		</h5>

                <!-- Form Name -->
                    <legend></legend>
        		
        		<form class="form-horizontal" method="POST">
                    <fieldset>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="usuario"></label>  
                      <div class="col-md-6">
                      <input id="usuario" name="usuariologin" type="text" placeholder="Usuário" class="form-control input-md" style="border-radius: 0px;">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="senha"></label>  
                      <div class="col-md-6">
                      <input id="senha" name="senhalogin" type="password" placeholder="Senha" class="form-control input-md" style="border-radius: 0px;">
                        
                      </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="singlebutton"></label>
                      <div class="col-md-6">
                        <button type="submit" id="singlebutton" name="login" class="btn btn-primary btn-block" style="border-radius: 0px;">Entrar</button>
                      </div>
                    </div>

                    </fieldset>
                </form>

        		<br/>

                <form class="form-horizontal" id="descer" style="display: none;" method="POST">
                    <h3 class="text-center">Criar Conta</h3>
                    <fieldset>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="usuario"></label>  
                      <div class="col-md-6">
                      <input id="nome" name="nome" type="text" placeholder="Nome" class="form-control input-md" required="" style="border-radius: 0px;">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="usuario"></label>  
                      <div class="col-md-6">
                      <input id="usuario" name="usuario" type="text" placeholder="Usuário" class="form-control input-md" required="" style="border-radius: 0px;">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="senha"></label>  
                      <div class="col-md-6">
                      <input id="senha" name="email" type="email" placeholder="Email" class="form-control input-md" required="" style="border-radius: 0px;">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="senha"></label>  
                      <div class="col-md-6">
                      <input id="senha" name="senha" type="password" placeholder="Senha" class="form-control input-md" required="" style="border-radius: 0px;">
                        
                      </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="singlebutton"></label>
                      <div class="col-md-6">
                        <button id="singlebutton" name="criarconta" class="btn btn-primary btn-block" style="border-radius: 0px;">Cadastrar</button>
                      </div>
                    </div>

                    </fieldset>
                </form>
                <?php $nova_conta->cadastroUsuario(); ?>
                <?php $nova_conta->enviarEmailUsuario(); ?>

                <!-- Formulário de cadastro de usuário -->
                <h5 style="cursor: pointer;" class="text-center" onclick="mostrarForm('descer')" id="mudarEscrita">
                    NÃO É CADASTRADO? CRIE SUA CONTA <span class='glyphicon glyphicon-menu-down'></span>
                </h5>
        		
        	</div>
        </div>
        </div>
    </div>
    
    <!--scripts loaded here from cdn for performance -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>



