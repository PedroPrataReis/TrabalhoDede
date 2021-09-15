<?php
//
// Define as variáveis locais
//
$email_cliente = "";
$nome_cliente = "";
$telefone_cliente = "";
$bairro = "";
$rua = "";
$numero = "";
$ComandoSQL = "";

    try
    {
        include 'sql_injection.php';
        
// recebe os dados do formulário
        $id = limpar($_POST['id']);
        $email_cliente = limpar($_POST['email_cliente'],false,true,false,true);
        $nome_cliente = limpar($_POST['nome_cliente'],true);
        $telefone_cliente = limpar($_POST['telefone_cliente']);
        $bairro = limpar($_POST['bairro'],true);
        $rua = limpar($_POST['rua'],true);
        $numero = limpar($_POST['numero']);
        $re = limpar($_POST['re']);

// abre conexão com o banco
        require_once 'conexao.php';

// verifica se já existe um registro na tabela para o código informado (chave duplicada)		
		$statement = $conexao->prepare('UPDATE tb_cliente SET email_cliente = :email_cliente, nome_cliente = :nome_cliente, telefone_cliente = :telefone_cliente, bairro = :bairro, rua = :rua, numero = :numero WHERE id='.$id);
        
        $statement->bindValue(':email_cliente', $email_cliente);
        $statement->bindValue(':nome_cliente', $nome_cliente);
        $statement->bindValue(':telefone_cliente', $telefone_cliente);
        $statement->bindValue(':bairro', $bairro);
        $statement->bindValue(':rua', $rua);
        $statement->bindValue(':numero', $numero);

        if ($statement->execute()) {
            header("Location: ../clientes/consultar.php?pag=".$re);
        }
	} catch (Exception $e) {
        // caso ocorra uma exceção, exibe na tela
        header("Location: ../../erro.php");
        die();
    }
?>