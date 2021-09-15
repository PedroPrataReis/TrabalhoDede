<?php
//
// Define as variáveis locais
//
$usuario_antigo = "";
$usuario = "";
$senha = "";
$nivel = "";
$ComandoSQL = "";

    try
    {
        include 'sql_injection.php';
    
// recebe os dados do formulário
        $usuario = limpar($_POST['usuario'],true);
        $senha = md5(limpar($_POST['senha']));
        $nivel = limpar($_POST['nivel']);
        $re = limpar($_POST['re']);
        $usuario_antigo = limpar($_POST['usuario_antigo'],true);
// abre conexão com o banco
        require_once 'conexao.php';

// verifica se já existe um registro na tabela para o código informado (chave duplicada)		
		$statement = $conexao->prepare('UPDATE tb_login SET usuario = :usuario, senha = :senha, nivel = :nivel WHERE usuario ="'. $usuario_antigo.'"');
        
        $statement->bindValue(':usuario', $usuario);
        $statement->bindValue(':senha', $senha);
        $statement->bindValue(':nivel', $nivel);

        if ($statement->execute()) {
            header("Location: ../cadastrar/consultar.php?pag=".$re);
        }
	} catch (Exception $e) {
        // caso ocorra uma exceção, exibe na tela
        header("Location: ../../erro.php");
        die();
    }
?>