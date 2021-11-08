<?php
    require("funcoes.php");
    require("sess_start.php");
?>
<!DOCTYPE html>
<!--
Servidor de envio de e-mails (SMTP)	
smtp.gmail.com
Requer SSL: Sim
Requer TLS: Sim (se disponível)
Requer autenticação: Sim
Porta para SSL: 465
Porta para TLS/STARTTLS: 587
-->
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Envio Email</title>
    </head>
    <body>
        <h1>Envio email</h1><br>
        <ul class="topnav">
                <li><a href="index.php"> HOME</a></li>
                <li><a href="menupri.php">MENU</a></li>
                <li><a class="active" href="envioEmail.php"> Envio Email</a></li>
                <li class="right"><a href="sair.php" id="sair">SAIR</a></li>
        </ul>
    </body>
</html>