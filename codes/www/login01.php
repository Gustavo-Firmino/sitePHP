<!DOCTYPE html>
        <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Login</title>
        <script>
            function valida(){
                    msg = "";
                    if(document.frm_login.cpf.value == ""){
                        msg+="Preencha o CPF!\n";
                    }
                    if(document.frm_login.pwd.value == ""){
                        msg+="Preencha a senha!\n";
                    }
                    if(!msg ==""){
                        alert(msg);
                        return false;
                    }else{
                        return true; //irá para o evento onsubmit
                    }
                    
            }
        </script>
    </head>
    <body onload="document.login.cpf.focus()">
        <h1>Login!</h1> <br>
        <ul class="topnav">
				<li><a href="index.php"> HOME</a></li>
				<li><a class="active"  href="login01.php">LOGIN</a></li>
				<li class="right"><a href="sair.php" id="sair">SAIR</a></li>
		</ul>
        <div class="doc">
            <form name="login" method="POST" action="login02.php" onsubmit="return valida()">
                <label for="cpf">CPF:</label> <br>
                <input type="text" id="cpf" name="cpf" value="" size="11" maxlength="11"><br> <br>
                <label for="pwd">SENHA:</label><br>
                <input type="password" id="pwd" name="pwd" value="" size="20" maxlength="50"> <br><br><br>
            <input type="submit" name="btn_envio" value="ENVIAR">
            </form>
        </div>
    </body>
</html>