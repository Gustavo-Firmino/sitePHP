<?php
    require("sess_start.php");
    require("conectaBd.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Deletear registros</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    </head>
    <body>
            <h1>Remover usuário</h1><br>
        <ul class="topnav">
                    <li><a href="index.php"> HOME</a></li>
                    <li><a href="menupri.php">MENU</a></li>
                    <li><a class="active" href="del01.php"> DELETAR REGISTROS</a></li>
                    <li class="right"><a href="sair.php" id="sair">SAIR</a></li>
        </ul>
            <h2>Resultados da remoção</h2>
        <div class="doc"> 
                <?php                    
                    //die( print_r($_POST));                   
                    if (isset($_POST['chkAtivo'])) {
                        $_SESSION['ativo']='N';
                        ob_clean();//outputbuffer clean = faz um "reload" da pag. para ver os outros usuarios
                        header("Location: del01.php");
                        exit();
                    }
                    $CPF = $_POST['rdCPF'];                     
                    //$sql = "DELETE from usuario where CPF='$CPF'"; //exclusao real
                    $sql = "UPDATE usuario set ativo='N' where CPF='$CPF'";//exclusao logica

                    //die("<br>$sql");
                    $dataset = mysqli_query($conn,$sql);
                    //conferir se foi marcado
                    if(!$dataset){
                        die("Não foi possivel remover usuario!");
                    }else{
                        echo("Usuario removido com sucesso!");
                    }    
                    
                    echo("<br><br>Operador CPF= ".$_SESSION['cpf']);
                ?>
        </div>
    </body>
</html>