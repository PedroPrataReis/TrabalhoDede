<?php
//
// Define as variáveis locais
//
$ComandoSQL = "";
$usuario = '';
$senha = '';
$i='';
$nivel = '';

try{

    include 'sql_injection.php';

    // recebe os dados do formulário
    $usuario = limpar($_POST['usuario'],true);
    $senha = md5(limpar($_POST['senha']));

    // Abrir a conexão com o BD e verificar na tabela de usarios se login e senha estão corretos.
    require_once 'conexao.php';
        $sql = "SELECT usuario, senha, nivel FROM tb_login WHERE (usuario = '".$usuario ."') AND (senha = '". $senha ."')";
        $query = $conexao->query($sql);
        $i = $query->fetch(PDO::FETCH_OBJ);
        $nivel = $i->nivel;
        if ($query->rowCount() == 1) {
            @session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['nivel'] = $nivel;
            if ($nivel==1){
                header('Location: ../');
            }else{
                header('Location: ../../');
            }
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
} catch (Exception $e) {
    // caso ocorra uma exceção, exibe na tela
    header("Location: ../../erro.php");
    die();
}
?>