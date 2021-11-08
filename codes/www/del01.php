<?php
    require("sess_start.php");
    require("conectaBd.php");
    $ativo="S";
    if (isset($_SESSION['ativo'])) {
        $ativo="N";
        unset($_SESSION['ativo']);
    }
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
        <h2>Escolha um usuário para remover</h2>
        <div class="doc">
            <?php //não precisa de slq injection
                $sql = "select * from usuario ";
                if ($ativo=="S"){$sql.=("where ativo='S'");} 
                $dataset = mysqli_query($conn, $sql);//chama as variaveis de conexao
                if(!$dataset){
                    die("Não foi possivel recuperar dados do banco");
                }
                $qtde = mysqli_num_rows($dataset);
                if($qtde == 0){
                    echo("Não há registros cadastrados,para a exclusão!");
                }else{//chamada de campos na tela por o laço while
                echo("<form name='frmDel' action='del02.php' method='POST'>");
                echo("<input type='checkbox' name='chkAtivo' value='X' onclick='form.submit()'");
                if ($ativo == "N"){echo("checked");}
                echo(">Mostrar registros deletados<br>");                            
                    echo("<table class='table'><tr>");
                    echo("<th></th>");    
                    echo("<th>CPF</th>");
                        echo("<th>Nome completo</th>");
                        echo("<th>Sexo</th>");
                        echo("<th>Data de nascimento</th>");
                    echo("</tr>");
                    $i =0;//numerando vetor
                    while($linhaBD=mysqli_fetch_assoc($dataset)){
                     //Ira retornar $linhaBD ['CPF']; (em vetores)   
                     //Ira retornar $linhaBD ['senha']; (em vetores)   
                     //Ira retornar $linhaBD ['nomeCompleto']; (em vetores)   
                     //Ira retornar $linhaBD ['sexo']; (em vetores)
                     //Ira retornar $linhaBD ['dtNasc']; (em vetores)
                     //Ira retornar $linhaBD ['operador']; (em vetores)
                    echo("<tr>");//coluna de escolha do tipo radio
                        echo("<td><input type='radio' 
                            value='".$linhaBD['CPF']."' 
                            name='rdCPF'></td>");   //numerando vetor
                        $i++;//numerando vetor
                        echo("<td>".$linhaBD['CPF']."</td>");
                        echo("<td>".$linhaBD['nomeCompleto']."</td>");
                        echo("<td>".$linhaBD['sexo']."</td>");
                        echo("<td>".$linhaBD['dtNasc']."</td>");
                    echo("</tr>");
                    
                    }
                    echo("</table> <br>");
                    echo("<input type='submit' value='REMOVER' >");
                    echo("</form>");
                }
                echo("<br><br>Operador CPF= ".$_SESSION['cpf']);
            ?>
        </div>            
    </body>
</html>