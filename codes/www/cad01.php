<?php
   	require("sess_start.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cadastro Tela-1</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	</head>
		<body onload="document.frm_cad1.cpf.focus()"><!--Realiza o foco na caixa de texto-->
			<h1>Cadastro</h1> <br>
			<ul class="topnav">
				<li><a href="index.php"> HOME</a></li>
                <li><a href="menupri.php">MENU</a></li>
                <li><a class="active" href="cad02.php">CADASTRO</a></li>
				<li class="right"><a href="sair.php" id="sair">SAIR</a></li>
		    </ul>
			<div class= "doc">
				<form name="frm_cad1" method="POST" action="cad02.php">
					<label for = "CPF">CPF:</label><br>
					<input type="text" id="cpf" name="cpf" value="" maxlength="11" size="11"> <br>
					<label for = "nomeCompleto">Nome completo:</label><br>
					<input type="text" id="nome" name="nome" value="" maxlength="150" size="50"><br><!--O name = "nome completo será utilizado no cad 2, para realziar a verificação se está correto ou não o numero de caracteres"--->
					<label for = "senha">Senha:</label><br>
					<input type="password" id="senha" name="senha", value=""> 
					<br><br>
					<label for = "sexo">Sexo:</label><br><!--"sexo" será enviado atraves do metodo POST ate o cad 02-->				
					<input type="radio" name="sexo" value="Masculino">Masculino <br>
					<input type="radio" name="sexo" value="Feminino">Feminino <br>
					<input type="radio" name="sexo" value="Outro">Outro <br>
					<br> <!--Calendário para escolha de nasciemnto-->
					<!--<label for="nascimento">Nacimento:</label>
					<input type="date" id="nasc" name="nasc"> <br>-->
					<input type="date" name="date">
					<br><br>
					<input type="submit" name="envioDados" value="ENVIAR"> 
				</form>
					<?php
						echo("<br><br>Operador= ".$_SESSION['cpf']);
					?>
		</div>
</body>
</html>