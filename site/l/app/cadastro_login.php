<?php
//
// Define as variáveis locais
//
$usuario = '';
$senha = '';
// Só entrará neste bloco do IF após o envio pelo formulário - o campo form_operação será criado no formulário abaixo

if ($_POST['form_cadastro'] == "cadastrar") 
{
    try
    {
// abre conexão com o banco
        require_once 'conexao.php';
        
// recebe os dados do formulário
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
// verifica se já existe um registro na tabela para o código informado (chave duplicada)		
		$statement = $conexao->prepare('INSERT INTO tb_login(usuario, senha) VALUES
		(:usuario, :senha)');
        
        $statement->bindValue(':usuario', $usuario);
        $statement->bindValue(':senha', $senha);

        if ($statement->execute()) {
            header("Location: ../");
        }
	} catch (Exception $e) {
        // caso ocorra uma exceção, exibe na tela
        header("Location: ../../login/erro.php");
        die();
    }
}
?>