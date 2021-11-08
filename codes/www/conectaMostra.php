<?php
   require("conectaBd.php");
   require("sess_start.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Mostra registro</title>
</head>
<body>
	<h1>Mostrado registros</h1>
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
			<form method="POST">
				<table class="table">
					<tr>
						<th>CPF</th>
						<th>NOME COMPLETO</th>
						<th>sEXO</th>
						<th>Data de nasc</th>
					</tr>				
					<?php
						while ($linhaBd=mysqli_fetch_assoc($dataset)) {
						    $CPF = $linhaBd['CPF'];
						    $nomeCompleto = $linhaBd['nomeCompleto'];
						    $sexo = $linhaBd['sexo'];
						    $data = $linhaBd['dtNasc'];	
					?>		
						<tr>
							<td><?php echo($CPF);?></td>
							<td><?php echo($nomeCompleto);?></td>
							<td><?php echo($sexo);?></td>
							<td><?php echo($data);?></td>

						</tr>
					<?php
					}
					?>
				</table>
			</form>
								
			<?php
					echo("<br><br>Operador= ".$_SESSION['cpf']);
			?>
    
	</div>

</body>
</html>					