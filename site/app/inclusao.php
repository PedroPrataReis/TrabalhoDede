<?php
header("Content-Type: text/html; charset=utf-8", true);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>

<?php
//
// Define as variáveis locais
//
$codigo_produto = "";
$nome_produto = "";
$preco_produto = "";
$descricao_produto = "";
$destino = '';
$ComandoSQL = "";

// Só entrará neste bloco do IF após o envio pelo formulário - o campo form_operação será criado no formulário abaixo

if ($_POST['form_operacao'] == "inclusao_produto") 
{
    try
    {
// abre conexão com o banco
        require_once 'conexao.php';
// recebe os dados do formulário
        $codigo_produto = $_POST['codigo_produto'];
        $nome_produto = $_POST['nome_produto'];
        $preco_produto = $_POST['preco_produto'];
        $descricao_produto = $_POST['descricao_produto'];
// verifica se já existe um registro na tabela para o código informado (chave duplicada)		
		$result = $conexao->query("SELECT * FROM tb_produto where codigo_produto = $codigo_produto");
		$count = $result->rowCount();
		if ($count > 0) {
			$destino = "function () {window.location='http://localhost/if/Dede/site/cardapio/incluir/';}";
			echo "Código de produto já cadastrado!";
		}	
		$statement = $conexao->prepare('INSERT INTO tb_produto VALUES
		(:codigo_produto,:nome_produto,:preco_produto,:descricao_produto)');
        $statement->bindValue(':codigo_produto', $codigo_produto);
        $statement->bindValue(':nome_produto', $nome_produto);
        $statement->bindValue(':preco_produto', $preco_produto);
        $statement->bindValue(':descricao_produto', $descricao_produto);
        $statement->execute();

	} catch (PDOException $e) {
        // caso ocorra uma exceção, exibe na tela
		$destino = "function () {window.location='index.php';}";
		echo "<script>alert('Erro!')</script>";
        die();
    }
	$destino = "function () {window.location='inclusao_receitas.php';}";
	echo "<script>alert('Produto cadastrado com sucesso!!, $destino)</script>";
}
?>
