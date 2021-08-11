<?php

    require_once './conexao.php';

    $id = $_GET['id'];
    $re = $_GET['re'];

    $comandoSQL = "DELETE FROM tb_cliente WHERE id =". $id;

    $conexao->query($comandoSQL);

    $l = $conexao->query("SELECT id FROM tb_cliente");
    $linhas = $l->rowCount();
    $linhas = $linhas + 1;

    if($linhas%5==1 && $linhas!=1){
        $re = $re - 1;
    }

    header("Location: ../clientes/consultar.php?pag=".$re);

?>