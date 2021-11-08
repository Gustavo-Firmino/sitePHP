<!DOCTYPE html>
    <html lang="py-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="css/style.css">
            <title>Login 2</title>
        </head>
    <body>
        <h1>Login do sistema</h1> <br>
        <ul class="topnav">
			<li><a href="index.php"> HOME</a></li>
            <li><a href="menupri.php">MENU</a></li>
			<li><a class="active" href="login01.php"> LOGIN</a></li>
            <li class="right"><a href="sair.php" id="sair">SAIR</a></li>
	    </ul>
        <div class="doc">
                <?php
                require("crip2gr4.php");
                    $cpf=$_POST['cpf']; //vem do login 1 (name)
                    $senha=$_POST['pwd']; //vem do login 1 (name)                        
                    //login 
                    require("conectaBd.php");
                    $sql="SELECT nomeCompleto,senha from usuario where cpf=? "; //nao indica o texto $cpf; e sim apenas um parametro, representado por (?) 
                    //echo("SQL: ".$sql); //teste do sql
                    $stmt = mysqli_prepare($conn,$sql); //conexao aberta via require, que utiliza o prepare (SQL preparado)
                    if (!$stmt){
                        die("Impossivel preparar a consulta ao BD");
                    }

                    $bind = mysqli_stmt_bind_param($stmt,"s",$cpf); //vinculo de parametro de entrada, na string ao começo do programa há uma posicao de um campo por parametro "s" tal letra indica quantidade e tipo string 
                    if (!$bind){
                        die("Impossivel vincular dados à consulta");
                    }

                    $exec = mysqli_stmt_execute($stmt); // execucao do comando preparado
                    if (!$exec){
                        die("Impossivel executar consulta");
                    }
                    $result = mysqli_stmt_bind_result($stmt, $nomeCompletoBD,$senhaBD); //obter resuoltados da execucao do comando ($exec = mysqli_stmt_execute($stmt);)
                    if (!$result){
                        die("Não foi possivel recuperar dados da consulta");
                    }
                    $fetch = mysqli_stmt_fetch($stmt);
                    if (!$fetch){
                        die("Não conseguiu associar dados de retorno");
                    }
                    if ($fetch == null){
                        die("Essa combinação login/senha não foi possível de ser encontrada.");
                    }
                    //lembre-se: O fethc já já copiou os resultados indicados pelo bind_result
                    mysqli_stmt_close($stmt);

                //teste senha antigo
                    //(strlen($senhaBD)<100) and ($senha == $senhaBD)  //sem criptografia na senha que esta no BD //$senha vem do post

                    //pega $senha e compara com $senhaBD (ambas criptografadas); com criptografia no BD
                    if(ChecaSenha($senha, $senhaBD)) {     
                        echo("Você está no sistema  $nomeCompletoBD :) <br><br>");
                        if (!session_start()){ /*O not "!" inverte a lógica, portanto se for não verdadeiro irá executar o bloco*/
                            die("Impossivel prosseguir!! Sessão não foi iniciada");
                        }
                    $_SESSION ['id']=session_id();//dados para nao deixar a session vazia
                    $_SESSION['cpf']=$cpf; //recupera o dcpf do operador
                    $_SESSION['operador']=$cpf; //informacao relevante
                    $_SESSION['operadorNomeCompleto']=$nomeCompletoBD;//informacao relevante
                    }else{
                        echo("Retorne para <a href='login01.php' class='link'>Login</a> e tente novamente");
                    }
                    //$_SESSION=array();                        
                    echo("<br><br>Operador CPF= ".$_SESSION['cpf']);

                ?>
        </div>
    </body>
</html>