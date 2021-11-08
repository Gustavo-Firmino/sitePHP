<?php
    require("conectaBd.php");
    require("sess_start.php");
    require("crip2gr4.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultado Atualização</title>
    </head>
    <body>
        <h1>Usuário - Atualização</h1>
        
        <?php
            echo(print_r($_POST,true));
            $CPF = $_POST['CPF'];        
            $nomeCompleto = $_POST['nomeCompleto'];
            $senhaAtual = $_POST['senhaAtual'];
            $senhaNova1 = $_POST['senhaNova1'];
            $senhaNova2 = $_POST['senhaNova2'];
            $sexo = $_POST['sexo'];
            $dtNasc = $_POST['dtNasc'];
//verificação de campos vazios
            if(empty($CPF)){
                die("CPF não pode ser vazio!");
            }
            if(empty($nomeCompleto)){
                die("Nome completo não pode ser vazio!");
            }
            if(empty($senhaAtual)){
                die("A senha atual não pode ser vazia!");
            }
            if(empty($senhaNova1)){
                die("Senha nova não pode ser vazia!");
            }if(empty($senhaNova2)){
                die("Senha nova verificação não pode ser vazia!");
            }
            if(empty($sexo)){
                die("Sexo não pode ser vazio!");
            }
            if(empty($dtNasc)){
                die("A data não pode ser vazioa!");
            }
//verificação de senhas
            if($senhaNova1 != $senhaNova2){
                die("As novas senhas não conferem!");
            }
            $sql="SELECT senha from usuario where CPF=? ";
            $stmt = mysqli_prepare($conn,$sql);
            if (!$stmt){
                die("Impossivel preparar a consulta ao BD");
            }
            $bind = mysqli_stmt_bind_param($stmt,"s",$CPF); 
            if (!$bind){
                die("Impossivel vincular dados à consulta");
            }
            $exec = mysqli_stmt_execute($stmt); 
            if (!$exec){
                die("Impossivel executar consulta");
            }
            $result = mysqli_stmt_bind_result($stmt, $senhaBD);
            if (!$result){
                die("Não foi possivel recuperar dados da consulta");
            }
            $fetch = mysqli_stmt_fetch($stmt);
            if (!$fetch){
                die("Não conseguiu associar dados de retorno");
            }
            if ($fetch == null){
                die("Esse CPF não foi encontrado no banco de dados.");
            }
            mysqli_stmt_close($stmt);

            if(ChecaSenha($senhaAtual, $senhaBD)){
//sql preparado
                $sql = "UPDATE usuario set ";//set = ajuste
                $sql.= "  nomeCompleto=?, senha=?, sexo=?, dtNasc=? ";
                $sql .= " where CPF =? ";
                $stmt = mysqli_prepare($conn,$sql);
                if (!$stmt){
                    die("Impossivel preparar a consulta ao BDDDDDD");                 }
//passagem de parametros
                $bind = mysqli_stmt_bind_param($stmt,"sssss", $nomeCompleto, $senhaNova1, $sexo, $dtNasc, $CPF);
                if (!$bind){
                    die("Impossivel vincular dados à consulta");
                }
//criptografia da senha 
                $senhaNova1 = FazSenha($CPF, $senhaNova1);
                $exec = mysqli_stmt_execute($stmt);
                if (!$exec){
                    die("Impossivel executar consulta");
                }
//fechamento do slq preparado
                mysqli_stmt_close($stmt);
            }else{
                die("Senha atual não confere com a cadastrada!");
            }
        ?>
    </body>
</html>