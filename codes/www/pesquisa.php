<?php
    require("sess_start.php");
    require("conectaBd.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Menu principal</title>
    </head>
    <body>
            <h1>Menu principal</h1> <br>
            <ul class="topnav">
				<li><a href="index.php"> HOME</a></li>
                <li><a href="pesquisa.php"> Pesquisa</a></li>
                <li class="right"><a href="sair.php" id="sair">SAIR</a></li>
		    </ul>
        <div class="doc">
            <form method="POST" name="result" action="resultado.php">
                <input type="text" name="pes">
                <input type="submit" name="envioDados" value="Procurar"> 
            </form>
                <?php
                    
                    echo("<br><br>Operador CPF= ".$_SESSION['cpf']);
                ?>

        </div>
    </body>
</html>