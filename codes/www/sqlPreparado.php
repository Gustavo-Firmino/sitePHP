<?php // este arquivo não será executado, apenas é um guia para preparar o SQL 
    require("conectaBd.php"); //ofcere a variavel $conn que sera utilizada em mysqli_prepare
    $sql = "SELECT nomeCompleto, senha from usuario where CPF =? ";//indicacao de parametro ? sem ''
    $stmt = mysqli_prepare($conn,$sql);
    if (!$stmt){
        die("Impossivel preparar a consulta ao BD");
    }

    $bind = mysqli_stmt_bind_param($stmt,"s",$cpf);
    if (!$bind){
        die("Impossivel vincular dados à consulta");
    }

    $exec = mysqli_stmt_execute($stmt);
    if (!$exec){
        die("Impossivel executar consulta");
    }

    $result = mysqli_stmt_bind_result($stmt,$nomeCompleto,$senhaBD);
    if (!$result){
        die("Não foi possivel recuperar dados da consulta");
    }

    $fetch = mysqli_stmt_fetch($stmt);
    if (!$fetch){
        die("Não conseguiu associar dados de retornoooooooooo");
    }
    //após tudo funcionar 
    //$nomeCompleto -> nomeCompleto que veio do BD
    //$senhaBD -> senha que veio do BD

    //fechamento do slq preparado
    mysqli_stmt_close($stmt);

?>