<?php
// recebe os dados do formulário
$ComandoSQL = "";
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// Abrir a conexão com o BD e verificar na tabela de usarios se login e senha estão corretos.
require_once 'conexao.php';
    $sql = "SELECT usuario, senha FROM tb_login WHERE (usuario = '".$usuario ."') AND (senha = '". $senha ."')";
    $query = $conexao->query($sql);
    if ($query->rowCount() == 1) {
        @session_start();
        $_SESSION['usuario'] = $usuario;
        header('Location: ../'); 
    }
else
{
    // inicializa a sessão
    @session_start();
    // limpa a sessão
    $_SESSION = array(); // colocando a session com um array vazio faz com ela
                     // fique vazia sem nenhuma variavel nela, liberando o espaço

    // destroy a sessão
    session_destroy();

    // redireciona o link para a página de aviso de erro ao autenticar usuário
        header("Location: ../../login/erro.php");
}
?>