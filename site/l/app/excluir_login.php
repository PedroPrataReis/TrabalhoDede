<?php
    try
    {
        include 'sql_injection.php';

        $cd = limpar($_GET['cd']);
        $re = limpar($_GET['re']);

        require_once './conexao.php';

        $comandoSQL = "DELETE FROM tb_login WHERE usuario ='". $cd."'";
        $conexao->query($comandoSQL);
        $l = $conexao->query("SELECT usuario FROM tb_login");
        $linhas = $l->rowCount();
        $linhas = $linhas + 1;

        if($linhas%5==1 && $linhas!=1){
            $re = $re - 1;
        }
        header("Location: ../cadastrar/consultar.php?pag=".$re);
    } catch (Exception $e) {
        // caso ocorra uma exceção, exibe na tela
        header("Location: ../../erro.php");
        die();
    }
?>