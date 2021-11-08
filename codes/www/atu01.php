<?php
	require("sess_start.php");
	require("conectaBd.php");
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
		<h1>Atualizar registros</h1><br>
		<ul class="topnav">
				<li><a href="index.php"> HOME</a></li>
                <li><a href="menupri.php">MENU</a></li>
                <li><a class="active" href="atu01.php"> ATUALIZAR</a></li>
                <li class="right"><a href="sair.php" id="sair">SAIR</a></li>
		</ul>
		<div class="doc">
			<?php
				$sql = "select * from usuario";
				$dataset = mysqli_query($conn,$sql);
				if (!$dataset) {
					die("Impossivel recuperar registros!");
				}
				if (mysqli_num_rows($dataset)==0) {
					die("Nenhum usuario cadastrado no banco de dados!");
				} 
			?>
			<form action="atu02.php" name="frmAtu01" method="POST">
				<table class="table">
					<tr>
						<th></th>
						<th>CPF</th>
						<th>NOME COMPLETO</th>
					</tr>				
					<?php
						while ($linhaBd=mysqli_fetch_assoc($dataset)) {
						    $CPF = $linhaBd['CPF'];
						    $nomeCompleto = $linhaBd['nomeCompleto'];	
					?>		
						<tr>
							<td><input type="radio" name="rdCPF" value="<?php echo($CPF);?>"></td>
							<td><?php echo($CPF);?></td>
							<td><?php echo($nomeCompleto);?></td>
						</tr>
					<?php
					}
					?>
				</table>
				<br><input type="submit" value="ATUALIZAR">
			</form>
								
			<?php
					echo("<br><br>Operador= ".$_SESSION['cpf']);
			?>
				
		</div>
	</body>
</html>