<?php
    try
    {
        include 'sql_injection.php';

        $id = limpar($_GET['id']);
        $re = limpar($_GET['re']);

        require_once './conexao.php';

        $comandoSQL = "DELETE FROM tb_cliente WHERE id =". $id;

        $conexao->query($comandoSQL);

        $l = $conexao->query("SELECT id FROM tb_cliente");
        $linhas = $l->rowCount();
        $linhas = $linhas + 1;

        if($linhas%5==1 && $linhas!=1){
            $re = $re - 1;
        }

        header("Location: ../clientes/consultar.php?pag=".$re);
    } catch (Exception $e) {
        // caso ocorra uma exceção, exibe na tela
        header("Location: ../../erro.php");
        die();
    }
?>