<!DOCTYPE html><!--1º versão do cadastro, não utilizável em produto final-->
<html>
	<head>
		<title>Cadastro - Tela 2</title>

		<style type="text/css">
			body{
				background-color:  #6600ff;
				color: #5cd6d6;
			}
			#primary{
				margin-left: 40pt;
				margin-right: 40pt;
				margin-top: 20pt;
				background-color: #404040;
				padding: 10pt;
			}

			h1{
				background-color: #b3b3b3;
				color: #cc0000	; 
				padding: 5pt;
			}

			#voltar{
				color: black;
				background-color: yellow; 
				border-radius: 3pt;
			}
		</style>
	</head>
		<!--<div id = "primary">
				<body>
				<H1>Resultado do cadastro</H1>
				<br>

				<?php 
				/*	$nomeCompleto=$_POST['nomeCompleto'];//os vetores (definidos entre []) foram definidos no campo "name" do cad01
					if (strlen($nomeCompleto) <= 3) {
						echo ("O nome não foi preenchido corretamente, no mínimo necessita de 4 letras. Retorne para preencher!<br>");
					}else {
						echo ("Nome completo: $nomeCompleto <br>");
					}				
					//(utilizado na situacao 1)$sexo=$_POST['sexo'];
					//situacao 1
					/*
						echo ("Sexo: $sexo <br>");
					if ($sexo=="0") { 
						die("Você precisa escolher uma opção no campo sexo!");mata o programa para que o dispositivo não execute mais nada
						echo ("Você precisa escolher uma opção no campo sexo!");	
					}*/
					//checagem dos campos radio (situacao 2)
					/*$sex=$_POST['sexo']; //dados do cad01
					if (!isset($sex)){
						echo ("Você precisa escolher uma opção no campo sexo! <br>");
					}else{
						echo ("Sexo: $sex <br>");
					}
					$data=$_POST['nasc'];//$data é uma variavel local, criada para realizar a ligação com o nascimento atraves do metodo post.
					if(!isset($data)){
						echo("Preencha o campo com a data de seu nascimento!");
					}else{
						echo ("Nacimento: $data <br>");
					}
					*/
				?>
					<br>
					<a href="cad01.php" id = "voltar">Voltar ao formulário</a>
			</div> -->
		</body>
</html>