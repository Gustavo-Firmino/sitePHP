<?php
	require("sess_start.php");
	require("conectaBd.php");
	require("crip2gr4.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">		     
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<title>Atualizar</title>
		</head>
	<body>
		<h1>Atualização</h1><br>
		<ul class="topnav">
				<li><a href="index.php"> HOME</a></li>
                <li><a href="menupri.php">MENU</a></li>
                <li><a class="active" href="atu01.php"> ATUALIZAR</a></li>
                <li class="right"><a href="sair.php" id="sair">SAIR</a></li>
		</ul>
		<div class="doc">
			<?php
				//echo (print_r($_POST,true));
				$CPF=$_POST['CPF'];
				$nomeCompleto=$_POST['nomeCompleto'];
				$sexo=$_POST['sexo'];
				$dtNasc=$_POST['dtNasc'];
				$senhaAtual=$_POST['senhaAtual'];
				$senhaNova1=$_POST['senhaNova1'];
				$senhaNova2=$_POST['senhaNova2'];
				
				if(empty($CPF)){
					die("CPF precisa ser preenchido!");
				}
				if(empty($nomeCompleto)){
					die("Nome precisa ser preenchido!");
				}
				if(empty($sexo)){
					die("Sexo precisa ser preenchido!");
				}
				if(empty($dtNasc)){
					die("Data de nascimento precisa ser preenchido!");
				}
				if(empty($senhaAtual)){
					die("Senha atual precisa ser preenchida!");
				}
				if($senhaNova1 != $senhaNova2){
					die("Senhas novas não conferem!");
				}				
				
				$sql="SELECT senha from usuario where CPF=? ";
                    $stmt = mysqli_prepare($conn,$sql);
                    if (!$stmt){
                        die("Impossivel preparar a consulta ao BD");
                    }
                    $bind = mysqli_stmt_bind_param($stmt,"s",$CPF); 
                    if (!$bind){
                        die("Impossivel vincular dados à consulta");
                    }
                    $exec = mysqli_stmt_execute($stmt); 
                    if (!$exec){
                        die("Impossivel executar consulta");
                    }
                    $result = mysqli_stmt_bind_result($stmt,$senhaBD);
                    if (!$result){
                        die("Não foi possivel recuperar dados da consulta");
                    }
                    $fetch = mysqli_stmt_fetch($stmt);
                    if (!$fetch){
                        die("Não conseguiu associar dados de retorno");
                    }
                    if ($fetch == null){
                        die("Esse CPF não foi encontrado no banco de dados.");
                    }                    
                    mysqli_stmt_close($stmt);
                    if(ChecaSenha($senhaAtual, $senhaBD)){
						$sql="Update usuario set ";
						$sql.="nomeCompleto=?,sexo=?,dtNasc=?,senha=? ";  
						$sql.=" where CPF=? ";  
						$stmt = mysqli_prepare($conn,$sql); //conexao aberta via require, que utiliza o prepare (SQL preparado)
						if (!$stmt){
							die("Impossivel preparar a consulta ao BDDDD");
						}
						$bind = mysqli_stmt_bind_param($stmt,"sssss",$nomeCompleto,$sexo,$dtNasc,$senhaNova1,$CPF); 
						if (!$bind){
							die("Impossivel vincular dados à consulta");
						}	
						$senhaNova1 = FazSenha($CPF,$senhaNova1);				
						$exec = mysqli_stmt_execute($stmt); // execucao do comando preparado
						if (!$exec){
							die("Impossivel executar consulta");
						}							
						mysqli_stmt_close($stmt);
						echo("Dados alterados!");
					} else{
							die("Senha atual não confere com a cadastrada");
						}                                   
			?>								
			<?php echo("<br><br>Operador= ".$_SESSION['cpf']);?>				
		</div>
	</body>
</html>