<?php
    try
    {
        include 'sql_injection.php';

        $cd = limpar($_GET['cd']);
        $re = limpar($_GET['re']);

        require_once './conexao.php';

        $comandoSQL = "DELETE FROM tb_produto WHERE codigo_produto =". $cd;

        $conexao->query($comandoSQL);

        $l = $conexao->query("SELECT codigo_produto FROM tb_produto");
        $linhas = $l->rowCount();
        $linhas = $linhas + 1;

        if($linhas%5==1 && $linhas!=1){
            $re = $re - 1;
        }

        header("Location: ../cardapio/consultar.php?pag=".$re);
    } catch (Exception $e) {
        // caso ocorra uma exceção, exibe na tela
        header("Location: ../../erro.php");
        die();
    }
?>