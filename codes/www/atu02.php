<?php
	require("sess_start.php");
	require("conectaBd.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">		     <link rel="stylesheet" type="text/css" href="css/style.css">
			<title>Atualizar</title>
		</head>
	<body>
		<h1>Atualizar registros</h1><br>
		<ul class="topnav">
				<li><a href="index.php"> HOME</a></li>
                <li><a href="menupri.php">MENU</a></li>
                <li><a class="active" href="atu01.php"> ATUALIZAR</a></li>
                <li class="right"><a href="sair.php" id="sair">SAIR</a></li>
		</ul>
		<div class="doc">
			<?php
				//echo(print_r($_POST,true));//conferencia do resultado do form print (imprimir) r (recursive) true (para funcionar de modo que apenas mostre o valor doque existe, não a dimensão)
				$CPF = $_POST['rdCPF'];
				$sql = "select * from usuario where CPF = '$CPF'";
				$dataset = mysqli_query($conn,$sql);
				if (!$dataset) {
					die("Impossivel recuperar registros!");
				}
				if (mysqli_num_rows($dataset)==0) {
					die("Nenhum usuario cadastrado no banco de dados!");
				}
				$linhaBd = mysqli_fetch_assoc($dataset);
				$nomeCompleto = $linhaBd ['nomeCompleto'];
				$sexo = $linhaBd ['sexo'];
				$dtNasc = $linhaBd ['dtNasc'];
			?>

			<form name="frm_atu02" method="POST" action="atu03.php">
				<label for = "CPF">CPF:</label><br>
				<input type="text" id="CPF" name="CPF" value="<?php echo($CPF);?>" maxlength="11" size="11" readonly> <br>
				<label for = "nomeCompleto">Nome completo:</label><br>
				<input type="text" id="nomeCompleto" name="nomeCompleto" value="<?php echo($nomeCompleto);?>" maxlength="150" size="50"><br><!--O name = "nome completo será utilizado no cad 2, para realziar a verificação se está correto ou não o numero de caracteres"--->
				<label for = "senha">Informe a senha atual:</label><br>
				<input type="password" id="senhaAtual" name="senhaAtual", value=""> <br>
				<label for = "senha">Informe a nova senha:</label><br>
				<input type="password" id="senhaNova1" name="senhaNova1", value=""> <br>
				<label for = "senha">Confirme a senha:</label><br>
				<input type="password" id="senhaNova2" name="senhaNova2", value=""> 
				<br><br>

				<label for = "sexo">Sexo:</label><br><!--"sexo" será enviado atraves do metodo POST ate o cad 02-->				
				<input type="radio" name="sexo" value="Masculino" <?php if($sexo=="M"){echo("checked");} ?> >Masculino <br>
				<input type="radio" name="sexo" value="Feminino"<?php if($sexo=="F"){echo("checked");} ?>>Feminino <br>
				<input type="radio" name="sexo" value="Outro"<?php if($sexo=="O"){echo("checked");} ?>>Outro <br>
				<br> 
				<input type="date" name="dtNasc" value="<?php echo($dtNasc);?>">
				<br><br>				
				<input type="submit" name="envioDados" value="ENVIAR"> 
			</form>
			
								


			<?php
					echo("<br><br>Operador= ".$_SESSION['cpf']);
			?>
				
		</div>
	</body>
</html>