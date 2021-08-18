<?php
//
// Define as variáveis locais
//
$usuario = '';
$senha = '';
$l = '';
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
        $l = $_POST['l'];
// verifica se já existe um registro na tabela para o código informado (chave duplicada)		
		$statement = $conexao->prepare('INSERT INTO tb_login(usuario, senha) VALUES
		(:usuario, :senha)');
        
        $statement->bindValue(':usuario', $usuario);
        $statement->bindValue(':senha', $senha);

        if ($statement->execute()) {
            if($l=='l'){
                header("Location: ../cadastrar/concluido.php");
            }elseif ($l=='nl') {
                header("Location: ../../cadastrar/concluido.php");
            }else{
                header("Location: ../../login/erro.php");
            }
            
        }
	} catch (Exception $e) {
        // caso ocorra uma exceção, exibe na tela
        header("Location: ../../login/erro.php");
        die();
    }
}
?>