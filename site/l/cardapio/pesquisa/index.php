<!DOCTYPE html>
<html lang="pt-br">
	<head>
        
		    <title>Burger Queen - Cardápio | Pesquisa</title>
        
		    <meta charset="UTF-8">
        <meta name="author" content="Pedro Prata e José Eduardo">
        
        <link rel="stylesheet" href="../../index.css">
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        
        <script src="../../index.js" type="text/javascript"></script>
        
        <link rel="icon" href="../../imagens/icon.png">
        
        <?php
            @session_start();
            if(isset($_SESSION['usuario'])) {} else {
                header("Location: ../../../login/erro.php");
                exit;
            }
        ?>
        
	</head>
	<body>    
    <table>
    <tr>
        
        <td id="ContMenu">
            <table id="TabelaMenu">
                <thead>
                <tr><th id="NomeMenu">
                    
                    <a href="../../">BurgerQueen</a>
                    
                </th></tr>
                </thead>
                <tbody>
                <tr><td  class="ItemMenu">
                    
                    <a href="../../">Home</a>
                    
                </td></tr>
                <tr><td  class="ItemMenu">
                    
                    <a href="../../clientes/">Clientes</a>
                    
                </td></tr>
                <tr><td  class="ItemMenu">
                    
                    <a href="../../cardapio/">Cardápio</a>
                    
                </td></tr>
                <tr><td  class="ItemMenu">
                    
                    <a href="../../cadastrar/">Cadastrar</a>
                    
                </td></tr>
                <tr><td  class="ItemMenu">
                    
                    <a href="../../sobre/">Sobre nós</a>
                    
                </td></tr>
                </tbody>
            </table>
        </td>
        
        
        
        <td id="ContSite">
            
            <nav>
                <a href="../../" id="NomeSite">BurgerQueen</a>
                <a href="../../app/logout.php" id="BotaoLogin"><div>Sair</div></a>
            </nav>
                
            <div class="DivIncluir">

            <?php
                require_once '../../app/conexao.php';

                $pesquisa = $_POST['pesquisa'];
                $campo = $_POST['campo'];
                
                $ComandoSQL='';
                $result='';
                

                switch ($campo) {                    
                    case 'nome':

                        $ComandoSQL = "SELECT * FROM tb_produto WHERE nome_produto LIKE '%$pesquisa%'";

                        break;
                    
                    case 'preco':
                        
                        $ComandoSQL = "SELECT * FROM tb_produto WHERE preco_produto LIKE '%$pesquisa%'";
                        
                        break;
                    
                    case 'descricao_produto':
                        
                        $ComandoSQL = "SELECT * FROM tb_produto WHERE descricao_produto LIKE '%$pesquisa%'";
                        
                        break;
                    
                    default:
                        
                        echo"<h1>nao foi possivel encontrar um resultado</h1>";
                    
                    break;
                }

                $result = $conexao->query($ComandoSQL);

                echo"<h1 class='TituloCadastrados'>Resultados</h1>

                <form method='POST' action='./' name='form_pesquisa'>

                    <label for='pesquisa' class='LabelPesquisa'>Pesquisar:</label>
                    <input name='pesquisa' type='text' id='pesquisa' required='required' class='InputPesquisa'>

                    <label for='campo' class='LabelPesquisa'>Campo:</label>
                    <select name='campo' id='campo' class='InputPesquisa'>
                        <option value='nome'>Nome</option>
                        <option value='preco'>Preço</option>
                        <option value='descricao_produto'>Descrição</option>
                    </select>

                    <input type='submit' value='Buscar' id='BotaoPesquisar'>
                    <br><br>

                </form>

                <table class='TabelaCadastrados'>
                    <tr>
                        <th class='THTabelaCadastrados'>Nome</th>
                        <th class='THTabelaCadastrados'>Preço</th>
                        <th class='THTabelaCadastrados'>Descrição</th>
                        <th class='THTabelaCadastrados'>Alterar</th>
                        <th class='THTabelaCadastrados'>Excluir</th>
                    </tr>
                ";
                
                while ($i = $result->fetch(PDO::FETCH_OBJ)) {
                    echo"<tr>
                    <td class='TDTabelaCadastrados'>".$i->nome_produto."</td>
                    <td class='TDTabelaCadastrados'>".$i->preco_produto."</td>
                    <td class='TDTabelaCadastrados'>".$i->descricao_produto."</td>
                    <td class='TDTabelaCadastrados'><a href='../alterar/index.php?cd=".$i->codigo_produto."&&re=0'><img src='../../imagens/editar.png' class='Alterar'></a></td>
                    <td class='TDTabelaCadastrados'><a href='../../app/excluir_produto.php?cd=".$i->codigo_produto."&&re=0'><img src='../../imagens/excluir.png' class='Excluir'></a></td>
                    </tr>";                                    
                }
                
                echo"</table>";

                echo"<br><br><a href='../consultar.php?pag=0' id='botao'>Voltar</a>";

            ?>

            </div>
                
            <footer class="FooterSemConteudo">
                <span id="TextoFooter">© Burger Queen 2021</span>
                <div id="Redes">
                    <a href="../../sobre/" class="LinkSocial">
                        <img src="../../imagens/twitter.png" class="Social">
                    </a>
                    <a href="../../sobre/" class="LinkSocial">
                        <img src="../../imagens/facebook.png" class="Social">
                    </a>
                    <a href="../../sobre/" class="LinkSocial">
                        <img src="../../imagens/intagram.png" class="Social">
                    </a>
                </div>
            </footer>
        </td>
        
    </tr>
    </table>
        
	    <img src="../../imagens/logado.png" id="logado">
        
	</body>
</html>