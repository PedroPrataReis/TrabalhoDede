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
// abre conexão com o banco
        require_once 'conexao.php';
        
// recebe os dados do formulário
        $codigo_produto = $_POST['codigo_produto'];
        $nome_produto = $_POST['nome_produto'];
        $preco_produto = $_POST['preco_produto'];
        $descricao_produto = $_POST['descricao_produto'];
        $re = $_POST['re'];
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
        header("Location: ../cardapio/consultar.php?pag=".$re);
		echo "<script>alert('Erro".$e->getMessage()."')</script>";
        die();
    }
?>