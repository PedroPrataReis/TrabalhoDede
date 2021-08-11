<!DOCTYPE html>
<html lang="pt-br">
	<head>
        
		<title>Burger Queen - Cardápio</title>
        
		<meta charset="UTF-8">
        <meta name="author" content="Pedro Prata e José Eduardo">
        
        <link rel="stylesheet" href="../index.css">
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        
        <script src="../index.js" type="text/javascript"></script>
        
        <link rel="icon" href="../imagens/icon.png">
        
        <?php
            @session_start();
            if(isset($_SESSION['usuario'])) {} else {
                header("Location: ../../login/erro.php");
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
                    
                    <a href="../">BurgerQueen</a>
                    
                </th></tr>
                </thead>
                <tbody>
                <tr><td  class="ItemMenu">
                    
                    <a href="../">Home</a>
                    
                </td></tr>
                <tr><td  class="ItemMenu">
                    
                    <a href="../clientes/">Clientes</a>
                    
                </td></tr>
                <tr><td  class="ItemMenu">
                    
                    <a href="../cardapio/">Cardápio</a>
                    
                </td></tr>
                <tr><td  class="ItemMenu">
                    
                    <a href="../cadastrar/">Cadastrar</a>
                    
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
                <a href="../app/logout.php" id="BotaoLogin"><div>Sair</div></a>
            </nav>
                
                <div class="DivIC">
                    
                    <h1 class="TituloIC">Cardápio</h1>
                    
                    <a href="incluir/" class="BotaoIC">
                        <div>Incluir</div>
                    </a>
                    <a href="./consultar.php?pag=0" class="BotaoIC">
                        <div>Consultar</div>
                    </a>
                    
                </div>
                
            <footer  class="FooterSemConteudo">
                <span id="TextoFooter">© Burger Queen 2021</span>
                <div id="Redes">
                    <a href="../sobre/" class="LinkSocial">
                        <img src="../imagens/twitter.png" class="Social">
                    </a>
                    <a href="../sobre/" class="LinkSocial">
                        <img src="../imagens/facebook.png" class="Social">
                    </a>
                    <a href="../sobre/" class="LinkSocial">
                        <img src="../imagens/intagram.png" class="Social">
                    </a>
                </div>
            </footer>
        </td>
        
    </tr>
    </table>
        
	    <img src="../imagens/logado.png" id="logado">
        
	</body>
</html>