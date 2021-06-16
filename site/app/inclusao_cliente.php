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
// abre conexão com o banco
        require_once 'conexao.php';
        
// recebe os dados do formulário
        $email_cliente = $_POST['email_cliente'];
        $nome_cliente = $_POST['nome_cliente'];
        $telefone_cliente = $_POST['telefone_cliente'];
        $bairro = $_POST['bairro'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
// verifica se já existe um registro na tabela para o código informado (chave duplicada)		
		$statement = $conexao->prepare('INSERT INTO tb_cliente(email_cliente, nome_cliente, telefone_cliente, bairro, rua, numero) VALUES
		(:email_cliente, :nome_cliente, :telefone_cliente, :bairro, :rua, :numero)');
        
        $statement->bindValue(':email_cliente', $email_cliente);
        $statement->bindValue(':nome_cliente', $nome_cliente);
        $statement->bindValue(':telefone_cliente', $telefone_cliente);
        $statement->bindValue(':bairro', $bairro);
        $statement->bindValue(':rua', $rua);
        $statement->bindValue(':numero', $numero);
        
        if ($statement->execute()) {
            header("Location: ../login/consultar/");
        }
	} catch (Exception $e) {
        // caso ocorra uma exceção, exibe na tela
        header("Location: ../login/consultar/");
		echo "<script>alert('Erro".$e->getMessage()."')</script>";
        die();
    }
}
?>