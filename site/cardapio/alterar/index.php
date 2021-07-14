<!DOCTYPE html>
<html lang="pt-br">
	<head>
        
		<title>Burger Queen - Cardápio | Alterar</title>
        
		<meta charset="UTF-8">
        <meta name="author" content="Pedro Prata e José Eduardo">
        
        <link rel="stylesheet" href="../../index.css">
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        
        <script src="../../index.js" type="text/javascript"></script>
        
        <link rel="icon" href="../../imagens/icon.png">
        
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
                    
                    <a href="../../login/">Entrar</a>
                    
                </td></tr>
                <tr><td  class="ItemMenu">
                    
                    <a href="../../cardapio/">Cardápio</a>
                    
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
                <a href="../../login/incluir/" id="BotaoLogin"><div>Entrar</div></a>
            </nav>
                
            <div class="DivIncluir">

            <?php
                require_once '../../app/conexao.php';

                $cd = $_GET['cd'];
                $re = $_GET['re'];
                    
                $ComandoSQL = "SELECT * FROM tb_produto WHERE codigo_produto = ".$cd;

                $u=$conexao->query($ComandoSQL);

                while($row = $u->fetch(PDO::FETCH_OBJ)){

                echo'
                    <h1 class="TituloIncluir">Alteração Produto</h1>
                    <form method="POST" action="../../app/alteracao_produto.php">
                    <input type="hidden" name="codigo_produto" value="'.$row->codigo_produto.'">
                    <input type="hidden" name="re" value="'.$re.'">
                    <table class="TabelaIncluir">
                        <tr>
                        <td class="LabelIncluir"><label for="nome_produto">Nome:</label><span class="Paragrafo">-</span></td>
                        <td>
                            <input name="nome_produto" type="text" id="nome_produto" size="30" required="required" value="'.$row->nome_produto.'">
                        </td>
                        </tr>
                        <tr>
                        <td class="LabelIncluir"><label for="preco_produto">Preço:</label><span class="Paragrafo">-</span></td>
                        <td>
                            <input type="text" name="preco_produto" id="preco_produto" size="30"  required="required" value="'.$row->preco_produto.'">
                        </td>
                        </tr>
                        <tr>
                        <td class="LabelIncluir"><label for="descricao_produto">Descrição:</label><span class="Paragrafo">-</span></td>
                        <td>
                            <input type="text" name="descricao_produto" id="descricao_produto"  size="30"  required="required" value="'.$row->descricao_produto.'">
                        </td>
                        </tr>
                        
                        <td colspan="2">
                            <br>
                            <input type="submit" name="enviar" value="Alterar">
                        </td>
                        </tr>
                    </table>
                    </form>
                ';
                }
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
        
	</body>
</html>