<?php
		//conectar BD
		$servidorCONN="127.0.0.1"; //proprio equipamento (testes); porém caso utilize um servidor (ambiente profissional), basta mudar o IP  
		$usuarioCONN="gus";
		$senhaCONN="12345";
		$bdCONN="gus"; //muda o servidor de BD
		$conn=mysqli_connect($servidorCONN,$usuarioCONN,$senhaCONN,$bdCONN);//passagem de parametros
		if(!$conn){
    			die("Não foi possível fazer a conexão com o BD");
		} 
?>
