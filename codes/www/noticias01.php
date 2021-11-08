<?php
    require("sess_start.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Noticias</title>
</head>
<body>
        <h1>NOTÍCIAS</h1><br>    
        <ul class="topnav">
				<li><a href="index.php"> HOME</a></li>
                <li><a href="menupri.php">MENU</a></li>
                <li><a class="active" href="noticias01.php"> NOTÍCIAS</a></li>
                <li class="right"><a href="sair.php" id="sair">SAIR</a></li>
		</ul>        
        <h2>Adição de conteúdo!</h2> 
        <div class="doc">            
            <!--<form name="frm_NovaNoticia" action="noticias02.php" method="POST"><p>Form</p></form> -->                
            <div id="textEditor" name="textEditor"> 
            <form action="noticias02.php" method="POST" name="frm_text">
                <label for="titulo">Titulo: </label><input type="text"> <br><br>
                <label for="subtitulo">Subtitulo: </label> <input type="text"> <br><br>
                <label for="redator">Redator: </label> <input type="text" value="<?php
                echo($_SESSION['cpf']);
            ?>">
                <textarea name="textA" id="">
                    Aqui vai a materia, verifique como isso sai pelo post (php) 
                </textarea><br><br>     
                <input type="submit" name="envioTexto" value="ENVIAR"> 
            </form>
            <?php
                echo("<br><br>Operador CPF= ".$_SESSION['cpf']);
            ?>
        </div>
</body>
</html>