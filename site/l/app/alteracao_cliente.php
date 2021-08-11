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
// abre conexão com o banco
        require_once 'conexao.php';
        
// recebe os dados do formulário
        $id = $_POST['id'];
        $email_cliente = $_POST['email_cliente'];
        $nome_cliente = $_POST['nome_cliente'];
        $telefone_cliente = $_POST['telefone_cliente'];
        $bairro = $_POST['bairro'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $re = $_POST['re'];
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
        header("Location: ../clientes/consultar.php?pag=".$re);
		echo "<script>alert('Erro".$e->getMessage()."')</script>";
        die();
    }
?>