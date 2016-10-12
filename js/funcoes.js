// função para mostrar e esconder o modal de login na tela index.php
function mostrarForm(descer) {
    var display = document.getElementById(descer).style.display;
    if(display == "none"){
        document.getElementById(descer).style.display = 'block';
        document.getElementById("mudarEscrita").innerHTML = "<span class='glyphicon glyphicon-menu-up'></span>";
    }else{
        document.getElementById(descer).style.display = 'none';
        document.getElementById("mudarEscrita").innerHTML = "NÃO É CADASTRADO? CRIE SUA CONTA "+"<span class='glyphicon glyphicon-menu-down'></span>";
    }   
}

// CRONOMETRO
var segundos = 25;
function cronometro(){
	segundos--;
	if(segundos<=0){
		segundos="00";
		clock1.innerHTML = segundos;
        //document.getElementById("pegar_cronometro").innerHTML = 0;
		//document.write("<php $valor=0; ?>"); 
		window.location.replace('tela_start.php');
	}else{
    	clock1.innerHTML = segundos;
   		setTimeout('cronometro()',1000);
	}
}
