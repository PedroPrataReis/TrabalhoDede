<!DOCTYPE html>
<html lang="pt-br">
	<head>
        
		<title>Burger Queen - Entrar</title>
        
		<meta charset="UTF-8">
        <meta name="author" content="Pedro Prata e José Eduardo">
        
        <link rel="stylesheet" href="../l/index.css">
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        
        <script src="../l/index.js" type="text/javascript"></script>
        
        <link rel="icon" href="../l/imagens/icon.png">

        <?php
            @session_start();
            if(isset($_SESSION['usuario'])) {
                header("Location: ../l/sobre");
                exit;
            } else {}
        ?>
        
	</head>
	<body>    
    <table>
    <tr>
        
        <td id="ContMenu">
            <table id="TabelaMenu">
                <thead>
                <tr><th id="NomeMenu">
                    
                    <a href="../">BurgerQueen</a>
                    
                </th></tr>
                </thead>
                <tbody>
                <tr><td  class="ItemMenu">
                    
                    <a href="../">Home</a>
                    
                </td></tr>
                <tr><td  class="ItemMenu">
                    
                    <a href="../cardapio/consultar.php?pag=0">Cardápio</a>
                    
                </td></tr>
                <tr><td  class="ItemMenu">
                    
                    <a href="../sobre/">Sobre nós</a>
                    
                </td></tr>
                </tbody>
            </table>
        </td>
        
        
        
        <td id="ContSite">
            
            <nav>
                <a href="../" id="NomeSite">BurgerQueen</a>
                <a href="../login/" id="BotaoLogin"><div>Entrar</div></a>
            </nav>
                
                <div class="DivIncluir">

                    <h1 class="TituloIncluir">Log In</h1>
                    <form method="POST" action="../l/app/verifica_login.php" name="form_login">
                        <table class="TabelaIncluir">
                            <tr>
                                <td class="LabelIncluir">
                                    <label for="usuario">
                                        Usuário:
                                    </label><span class="Paragrafo">-</span>
                                </td>

                                <td>
                                    <input type="text" name="usuario" id="usuario" required="required">
                                </td>
                            </tr>
                            <tr>
                                <td class="LabelIncluir">
                                    <label for="senha">
                                        Senha:
                                    </label><span class="Paragrafo">-</span>
                                </td>

                                <td>
                                    <input type="password" name="senha" id="senha" required="required">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <br>
                                    <input type="hidden" name="form_login" value="entrar">
                                    <input type="submit" value="Entrar">
                                </td>
                            </tr>
                        </table>
                    </form>
                    
                </div>
                
            <footer class="FooterSemConteudo">
                <span id="TextoFooter">© Burger Queen 2021</span>
                <div id="Redes">
                    <a href="../sobre/" class="LinkSocial">
                        <img src="../l/imagens/twitter.png" class="Social">
                    </a>
                    <a href="../sobre/" class="LinkSocial">
                        <img src="../l/imagens/facebook.png" class="Social">
                    </a>
                    <a href="../sobre/" class="LinkSocial">
                        <img src="../l/imagens/intagram.png" class="Social">
                    </a>
                </div>
            </footer>
        </td>
        
    </tr>
    </table>
        
	</body>
</html>