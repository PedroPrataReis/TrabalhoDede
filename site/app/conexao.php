<?php

// instancia objeto PDO, conectando no mysql

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'bd_trabalho';
try {
    // cria o objeto PDO de conexão com o servidor de banco de dados 
    $conexao = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8", $username, $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    // configura os tipos de erros a serem mostrados pelo exception
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //    echo 'Conexao efetuada com sucesso!';
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>