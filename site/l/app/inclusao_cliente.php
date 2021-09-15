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

// Só entrará neste bloco do IF após o envio pelo formulário - o campo form_operação será criado no formulário abaixo

if ($_POST['form_operacao'] == "inclusao_cliente") 
{
    try
    {
        include 'sql_injection.php';

// recebe os dados do formulário
        $email_cliente = limpar($_POST['email_cliente'],false,true,false,true);
        $nome_cliente = limpar($_POST['nome_cliente'],true);
        $telefone_cliente = limpar($_POST['telefone_cliente']);
        $bairro = limpar($_POST['bairro'],true);
        $rua = limpar($_POST['rua'],true);
        $numero = limpar($_POST['numero']);

// abre conexão com o banco
        require_once 'conexao.php';

// verifica se já existe um registro na tabela para o código informado (chave duplicada)		
		$statement = $conexao->prepare('INSERT INTO tb_cliente(email_cliente, nome_cliente, telefone_cliente, bairro, rua, numero) VALUES
		(:email_cliente, :nome_cliente, :telefone_cliente, :bairro, :rua, :numero)');
        
        $statement->bindValue(':email_cliente', $email_cliente);
        $statement->bindValue(':nome_cliente', $nome_cliente);
        $statement->bindValue(':telefone_cliente', $telefone_cliente);
        $statement->bindValue(':bairro', $bairro);
        $statement->bindValue(':rua', $rua);
        $statement->bindValue(':numero', $numero);

        $l = $conexao->query("SELECT id FROM tb_cliente");
        $linhas = $l->rowCount();

        $linhas = floor($linhas/5);

        if ($statement->execute()) {
            header("Location: ../clientes/consultar.php?pag=".$linhas);
        }
	} catch (Exception $e) {
        // caso ocorra uma exceção, exibe na tela
        header("Location: ../../erro.php");
        die();
    }
}
?>