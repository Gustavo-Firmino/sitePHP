<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Publicação da matéria!</title>
    </head>
    <body>
        <h1>NOTÍCIAS</h1><br>    
        <ul class="topnav">
				<li><a href="index.php"> HOME</a></li>
                <li><a href="menupri.php">MENU</a></li>
                <li><a class="active" href="noticias02.php"> NOTÍCIAS</a></li>
                <li class="right"><a href="sair.php" id="sair">SAIR</a></li>
		</ul>        
        <h2>Verificação do conteúdo que está prestes a ser adicionado!</h2> 
        <div class="doc"> 
            <?php
                print_r($_POST);
            ?>
        </div>         
        
    </body>
</html>