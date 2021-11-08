<?php
    require("sess_start.php");
	require("crip2gr4.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cadastro - Tela 2</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	</head>
	<body>				
		<H1>Resultado do cadastro</H1> <br>
		<ul class="topnav">
			<li><a href="index.php"> HOME</a></li>
			<li><a href="menupri.php">MENU</a></li>
			<li><a class="active" href="cad01.php">CADASTRO</a></li>
			<li class="right"><a href="sair.php" id="sair">SAIR</a></li>
		</ul>
		<div class= "doc">	
			<?php 
			//os vetores (definidos entre []) foram definidos no campo "name" do cad01
			//campo operador
				if(!isset($_POST['cpf'])){
					echo"O CPF não foi preenchido";
				}
				$cpf=$_POST['cpf'];
				if (strlen($cpf)<11) {
					die ("Um CPF necessita de 11 digitos. Retorne!<br>");
				}else {
					echo"CPF: $cpf <br>";
				}
			//campo nome
				$nomeCompleto=$_POST['nome'];
				if (strlen($nomeCompleto)<=4) {
					die("O nome não foi preenchido corretamente. Retorne!<br>");
				}else{
					echo"Nome completo: $nomeCompleto <br>";
				}
			//campo password
				if(!isset($_POST['senha'])){
					die("Senha não foi transmitida!");
				}else{
					$senha=$_POST['senha'];	
					if (strlen($senha)<5) {
						die("Senha necessita de pelo menos 5 digitos. Retorne!<br>");
					}
				}
			//checagem do sexo 
				$sex=$_POST['sexo'];
				if (!isset($sex)){
					die("Você precisa escolher o campo sexo! Retorne.<br>");
				}else{
					echo"Sexo: $sex <br>";
				}
			//dataNasc
				$data=$_POST['date'];//$data é uma variavel local, criada para realizar a ligação com o nascimento atraves do metodo post.
				echo"Nacimento: $data <br>";	
			//mostra operador
				echo"<br>Operador CPF= ".$_SESSION['operador'];
				$operador=$_SESSION['operador'];//vairavel operador chama o cpf da sessaõ

			//require vem do conectaBd----------------------------------------------------------
				require("conectaBd.php");//ganha a variavel $conn
				echo("<br><br>Conseguiu conectar!<br>");
				//tentar cadastrar
				$sql ="INSERT INTO usuario ";
				$sql.="(CPF,nomeCompleto,senha,sexo,dtNasc,operador) ";
				$sql.="VALUES "; //todos os valores sao texto
				$sql.="(?,?,?,?,?,? ) "; //substituicao dos textos por parametros ?
				
				$stmt = mysqli_prepare($conn,$sql);
				if (!$stmt){
					die("Impossivel preparar o cadastro no BD");
				}
				//antes de bindar parametros no BD temos que preparar a senha
				$senha = FazSenha($cpf,$senha);//troca a digitada sem criptografia, pela criptografada
				$bind = mysqli_stmt_bind_param($stmt,"ssssss",$cpf,$nomeCompleto,$senha,$sex,$data,$operador);
				if (!$bind){
					die("Impossivel vincular dados ao cadastro");
				}
				$exec = mysqli_stmt_execute($stmt);
				if(!$exec){
					echo("Não consegui inserir os dados no Banco! <br> Retorne e tente novamente: <a class='link' href='cad01.php'>Cadastro</a>");
				}else{
					echo("Dados no Banco! Acesse o Menu<br>");
				}
				mysqli_stmt_close($stmt);

			?>				
		</div>
	</body>
</html>