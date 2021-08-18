<!DOCTYPE html>
<html lang="pt-br">
	<head>
        
		<title>Burger Queen - Cardápio | Incluir</title>
        
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
                    
                    <h1 class="TituloIncluir">Cadastro do Produto</h1>
                      <form method="POST" action="../../app/inclusao_produto.php" name="form_inclusao">
                        <table class="TabelaIncluir">
                          <tr>
                            <td class="LabelIncluir"><label for="nome_produto">Nome:</label><span class="Paragrafo">-</span></td>
                            <td>
                              <input name="nome_produto" type="text" id="nome_produto" size="30" required="required">
                            </td>
                          </tr>
                          <tr>
                            <td class="LabelIncluir"><label for="preco_produto">Preço:</label><span class="Paragrafo">-</span></td>
                            <td>
                              <input name="preco_produto" id="preco_produto" type="text"  size="30" required="required">
                            </td>
                          </tr>
                          <tr>
                            <td class="LabelIncluir"><label for="descricao_produto">Descrição:</label><span class="Paragrafo">-</span></td>
                            <td>
                              <input name="descricao_produto" id="descricao_produto" type="text"  size="30"  required="required">
                            </td>
                          </tr>
                          <tr>
                            <td colspan='2'>
                                <br />
                                <input type="hidden" name="form_operacao" value="inclusao_produto">
                                <input type="submit" name="enviar" value="Enviar">
                            </td>
                          </tr>
                          </table>
                      </form>
                    
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
        <?php
            $user = $_SESSION['usuario'];
            echo "<span id='user'>$user</span>";
        ?>
        
	</body>
</html>