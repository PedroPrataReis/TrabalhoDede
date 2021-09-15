<?php
//
// Define as variáveis locais
//
$nome_produto = "";
$preco_produto = "";
$descricao_produto = "";
$ComandoSQL = "";

    try
    {
        include 'sql_injection.php';
    
// recebe os dados do formulário
        $codigo_produto = limpar($_POST['codigo_produto']);
        $nome_produto = limpar($_POST['nome_produto'],true,true,true);
        $preco_produto = limpar($_POST['preco_produto'],false,true);
        $descricao_produto = limpar($_POST['descricao_produto'],true);
        $re = limpar($_POST['re']);

// abre conexão com o banco
        require_once 'conexao.php';

// verifica se já existe um registro na tabela para o código informado (chave duplicada)		
		$statement = $conexao->prepare('UPDATE tb_produto SET nome_produto = :nome_produto, preco_produto = :preco_produto, descricao_produto = :descricao_produto WHERE codigo_produto='.$codigo_produto);
        
        $statement->bindValue(':nome_produto', $nome_produto);
        $statement->bindValue(':preco_produto', $preco_produto);
        $statement->bindValue(':descricao_produto', $descricao_produto);

        if ($statement->execute()) {
            header("Location: ../cardapio/consultar.php?pag=".$re);
        }
	} catch (Exception $e) {
        // caso ocorra uma exceção, exibe na tela
        header("Location: ../../erro.php");
        die();
    }
?>