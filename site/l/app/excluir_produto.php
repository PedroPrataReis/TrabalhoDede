<?php

    require_once './conexao.php';

    $cd = $_GET['cd'];
    $re = $_GET['re'];

    $comandoSQL = "DELETE FROM tb_produto WHERE codigo_produto =". $cd;

    $conexao->query($comandoSQL);

    $l = $conexao->query("SELECT codigo_produto FROM tb_produto");
    $linhas = $l->rowCount();
    $linhas = $linhas + 1;

    if($linhas%5==1 && $linhas!=1){
        $re = $re - 1;
    }

    header("Location: ../cardapio/consultar.php?pag=".$re);

?>