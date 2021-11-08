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
                        $cpf=$_POST['cpf']; //vem do login 1 (name)
                        $senha=$_POST['pwd']; //vem do login 1 (name)                        
                        //login 
                        require("conectaBd.php");
                        $sql="SELECT nomeCompleto,senha from usuario where cpf='$cpf'"; 
                        //echo("SQL: ".$sql); //teste do sql
                        $dataset=mysqli_query($conn,$sql);//faz a pesquisa no BD |dataset (dados disposotos em um conjunot de informaçoes)
                        if(!$dataset){
                            die("A pesquisa não foi executada");
                        }
                        $qtde=mysqli_num_rows($dataset);//qual o numero de linhas existentes neste dataset
                        //echo("Qtde: ".$qtde);//se for 1, esta encontrando a senha no BD
                        if($qtde == 0){
                            die("Essa combinação de login/senha não foi encontrada no BD");
                        }
                        $linhaBD=mysqli_fetch_assoc($dataset);//demosntra a recuperação da linha de informação (pois o php encara os campos [colunas] do sql como vetores)
                        //echo(print_r($linhaBD,true));//print_r demostra qualquer variável na tela, true é pra colocar a variável
                        $senhaBD = $linhaBD['senha']; 
                        $nomeCompletoBD = $linhaBD ['nomeCompleto'];
                       // echo("Senha encontrada: ".$senhaBD);
                        //echo("Senha digitada: ".$senha);
                        if($senha == $senhaBD){//$senha vem do post     
                            echo("Você está no sistema $nomeCompletoBD :) <br><br>");
                            if (!session_start()){ /*O not "!" inverte a lógica, portanto se for não verdadeiro irá executar o bloco*/
                                die("Impossivel prosseguir!! Sessão não foi iniciada");
                            }
                            $_SESSION ['id']=session_id();
                            $_SESSION['cpf']=$cpf;
                        }else{
                            echo("Retorne para <a href='login01.php' class='link'>Login</a> e tente novamente");
                        }
                        //$_SESSION=array();                        
                        echo("<br><br>Usuário RM= ".$_SESSION['cpf']);

                    ?>
            </div>
    </body>
</html>