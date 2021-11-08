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
            </form>
                <?php
                //transmitir o array (input) para uma variavel, a partir disto, realizar uma pesquisa pelo comando select com a variavel obtida ".$."
                $sql = "select * from usuario";
                $dataset = mysqli_query($conn,$sql);
                if (!$dataset) {
                    die("Impossivel recuperar registros!");
                }
                if (mysqli_num_rows($dataset)==0) {
                    die("Nenhum usuario cadastrado no banco de dados!");
                } 

                $var = $_POST['pes'];
                $nome = $linhaBd['nomeCompleto'];
               // $encon = "select nomeCompleto from usuario WHERE nomeCompleto = ".$var;
                if($var == $nome){
                while ($linhaBd=mysqli_fetch_assoc($dataset)) {
                echo $nome;
                }
            }else{
                echo "Nao foi possivel encontrar este nome!";
            }
               
                

                    echo("<br><br>Operador CPF= ".$_SESSION['cpf']);
                ?>

        </div>
    </body>
</html>