<?php
//
// Define as variáveis locais
//
$codigo_produto = "";
$nome_produto = "";
$preco_produto = "";
$descricao_produto = "";
$ComandoSQL = "";

// Só entrará neste bloco do IF após o envio pelo formulário - o campo form_operação será criado no formulário abaixo

if ($_POST['form_operacao'] == "inclusao_produto") 
{
    try
    {
        include 'sql_injection.php';

// recebe os dados do formulário
        $nome_produto = limpar($_POST['nome_produto'],true,true,true);
        $preco_produto = limpar($_POST['preco_produto'],false,true);
        $descricao_produto = limpar($_POST['descricao_produto'],true);

// abre conexão com o banco
        require_once 'conexao.php';

// verifica se já existe um registro na tabela para o código informado (chave duplicada)		
		$statement = $conexao->prepare('INSERT INTO tb_produto(nome_produto,preco_produto,descricao_produto) VALUES
		(:nome_produto,:preco_produto,:descricao_produto)');
        $statement->bindValue(':nome_produto', $nome_produto);
        $statement->bindValue(':preco_produto', $preco_produto);
        $statement->bindValue(':descricao_produto', $descricao_produto);
        
        $l = $conexao->query("SELECT codigo_produto FROM tb_produto");
        $linhas = $l->rowCount();

        $linhas = floor($linhas/5);
        
        if ($statement->execute()) {
            header("Location: ../cardapio/consultar.php?pag=".$linhas);
        }
	} catch (Exception $e) {
        // caso ocorra uma exceção, exibe na tela
        header("Location: ../../erro.php");
        die();
    }
}
?>