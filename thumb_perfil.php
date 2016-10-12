<?php 
	//função para criar a miniatura
	function criar_thumbnail($origem,$formato,$destino,$largura='102',$pre='tn_') {
	    switch($formato)
	    {
	        case 'jpeg':
	            $tn_formato = 'jpg';
	            break;
			case 'jpg':
	            $tn_formato = 'jpg';
	            break;
	        case 'png':
	            $tn_formato = 'png';
	            break;
	    }
	    $ext = split("[/\\.]",strtolower($origem));
	    $n = count($ext)-1;
	    $ext = $ext[$n];

	    $arr = split("[/\\]",$origem);
	    $n = count($arr)-1;
	    $arra = explode('.',$arr[$n]);
	    $n2 = count($arra)-1;
	    $tn_name = str_replace('.'.$arra[$n2],'',$arr[$n]);
	    $destino = $destino.$pre.$tn_name.'.'.$tn_formato;

	    if ($ext == 'jpg' || $ext == 'jpeg'){
	        $im = imagecreatefromjpeg($origem);
	    }elseif($ext == 'png'){
	        $im = imagecreatefrompng($origem);
	    }elseif($ext == 'gif'){
	        return false;
	    }
	    $w = imagesx($im);
	    $h = imagesy($im);
	    if ($w > $h)
	    {
	        $nw = $largura;
	        $nh = ($h * $largura)/$w;
	    }else{
	        $nh = $largura;
	        $nw = ($w * $largura)/$h;
	    }
	    if(function_exists('imagecopyresampled'))
	    {
	        if(function_exists('imageCreateTrueColor'))
	        {
	            $ni = imageCreateTrueColor($nw,$nh);
	        }else{
	            $ni    = imagecreate($nw,$nh);
	        }
	        if(!@imagecopyresampled($ni,$im,0,0,0,0,$nw,$nh,$w,$h))
	        {
	            imagecopyresized($ni,$im,0,0,0,0,$nw,$nh,$w,$h);
	        }
	    }else{
	        $ni    = imagecreate($nw,$nh);
	        imagecopyresized($ni,$im,0,0,0,0,$nw,$nh,$w,$h);
	    }
	    if($tn_formato=='jpg'){
	        imagejpeg($ni,$destino,60);
	    }elseif($tn_formato=='png'){
	        imagepng($ni,$destino);
	    }
	}
	
	//função que gera a imagem em tamanho um pouco menor , para ser usada por exemplo, quando  quero padronizar o tamanho das fotos
	function redimensiona($origem,$destino='imagens/',$largura='600',$formato='JPEG') {
	    switch($formato)
	    {
	        case 'JPEG':
	            $tn_formato = 'jpg';
	            break;
	        case 'PNG':
	            $tn_formato = 'png';
	            break;
	    }
	    $ext = split("[/\\.]",strtolower($origem));
	    $n = count($ext)-1;
	    $ext = $ext[$n];

	    $arr = split("[/\\]",$origem);
	    $n = count($arr)-1;
	    $arra = explode('.',$arr[$n]);
	    $n2 = count($arra)-1;
	    $tn_name = str_replace('.'.$arra[$n2],'',$arr[$n]);
	    $destino = $destino.$tn_name.'.'.$tn_formato;

	    if ($ext == 'jpg' || $ext == 'jpeg'){
	        $im = imagecreatefromjpeg($origem);
	    }elseif($ext == 'png'){
	        $im = imagecreatefrompng($origem);
	    }elseif($ext == 'gif'){
	        return false;
	    }
	    $w = imagesx($im);
	    $h = imagesy($im);
	    if ($w > $h)
	    {
	        $nw = $largura;
	        $nh = ($h * $largura)/$w;
	    }else{
	        $nh = $largura;
	        $nw = ($w * $largura)/$h;
	    }
	    if(function_exists('imagecopyresampled'))
	    {
	        if(function_exists('imageCreateTrueColor'))
	        {
	            $ni = imageCreateTrueColor($nw,$nh);
	        }else{
	            $ni    = imagecreate($nw,$nh);
	        }
	        if(!@imagecopyresampled($ni,$im,0,0,0,0,$nw,$nh,$w,$h))
	        {
	            imagecopyresized($ni,$im,0,0,0,0,$nw,$nh,$w,$h);
	        }
	    }else{
	        $ni    = imagecreate($nw,$nh);
	        imagecopyresized($ni,$im,0,0,0,0,$nw,$nh,$w,$h);
	    }
	    if($tn_formato=='jpg'){
	        imagejpeg($ni,$destino,60);
	    }elseif($tn_formato=='png'){
	        imagepng($ni,$destino);
	    }
	}


?>