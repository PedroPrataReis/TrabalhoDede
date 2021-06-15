<?php
header("Content-Type: text/html; charset=utf-8", true);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>CRUD Restaurante Boa Forma</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link href="css/toastr.css" rel="stylesheet"/>
<script src="jquery/jquery-3.3.1.min.js"></script>
<script src="popper/popper.min.js"></script>
<script src="bootstrap4/js/bootstrap.min.js"></script>
<script src="funcoes/toastr.min.js"></script>
<script src="funcoes/funcao_toastr.js"></script>
</head>
<body>
<div id="tudo">
<div id="conteudo">
    <?php require_once 'funcoes/cabecalho.php';?>
    <div id='principal'>
<?php
try
{
    // abre conexão com o banco
    require_once 'funcoes/conexao.php';
    // executa uma instrução SQL de consulta
    $result = $conn->query("SELECT * FROM tb_produto");
    $count = $result->rowCount();
    echo "<h2>Cardápio da Loja</h2>";
    if ($count > 0) {
        // percorre os resultados via fetch(), caso tenha pelo menos um registro
        echo "<table>";
        echo "<tr>\n";
        echo "<td>\n";
        echo "<b>Código</b>\n";
        echo "</td>\n";
        echo "<td>\n";
        echo "<b>Nome</b>\n";
        echo "</td>\n";
        echo "<td>\n";
        echo "<b>Preço</b>\n";
        echo "</td>\n";
        echo "<td>\n";
        echo "<b>Descrição</b>\n";
        echo "</td>\n";
        echo "<td>\n";
        echo "<tr class='tr_div'><td colspan='4'></td></tr>\n";
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            // exibe os dados na tela, acessando o objeto retornado
            echo "<tr>\n";
            echo "<td>\n";
            echo $row->codigo_produto . "&nbsp;\n";
            echo "</td>\n";
            echo "<td>\n";
            echo $row->nome_produto . "&nbsp;\n";
            echo "</td>\n";
            echo "<td>\n";
            echo $row->preco_produto . "&nbsp;\n";
            echo "</td>\n";
            echo "<td>\n";
            echo $row->descricao_produto . "&nbsp;\n";
            echo "</td>\n";
        }
    } else {
        $destino = "function () {window.location='index.php';}";
        echo "<script>sendToastr('Nenhuma receita foi encontrada! <br /> Clique para continuar!','error',$destino)</script>";
    }
    echo "</table>";
    // fecha a conexão
    $conn = null;
} catch (PDOException $e) {
    $destino = "function () {window.location='index.php';}";
    echo "<script>sendToastr($e->getMessage(),'error',$destino)</script>";
    die(); // interrompe o processamento do lado do servidor
}
?>
</div>
<?php require_once 'funcoes/menu.php';?>
<div class="clear"></div>
</div>
<div id="rodape">
	<p>Restaurante Boa Forma - Receitas Especiais</p>
</div>
</div>
</body>
</html>