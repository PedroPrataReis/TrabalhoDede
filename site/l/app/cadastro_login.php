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
        include 'sql_injection.php';
        
// recebe os dados do formulário
        $usuario = limpar($_POST['usuario'],true);
        $senha = md5(limpar($_POST['senha']));
        $l = limpar($_POST['l']);
        $nivel = 0;

// abre conexão com o banco
        require_once 'conexao.php';

// verifica se já existe um registro na tabela para o código informado (chave duplicada)		
		$statement = $conexao->prepare('INSERT INTO tb_login(usuario, senha, nivel) VALUES
		(:usuario, :senha, :nivel)');
        
        $statement->bindValue(':usuario', $usuario);
        $statement->bindValue(':senha', $senha);
        $statement->bindValue(':nivel', $nivel);

        if ($statement->execute()) {
            if($l=='l'){
                header("Location: ../cadastrar/consultar.php?pag=0");
            }elseif ($l=='nl') {
                header("Location: ../../cadastrar/concluido.php");
            }else{
                header("Location: ../../erro.php");
            }
            
        }
	} catch (Exception $e) {
        // caso ocorra uma exceção, exibe na tela
        //header("Location: ../../erro.php");
        die();
    }
}
?>