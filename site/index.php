<!DOCTYPE html>
<html lang="pt-br">
	<head>
        
		<title>Burger Queen</title>
        
		<meta charset="UTF-8">
        <meta name="author" content="Pedro Prata e José Eduardo">
        
        <link rel="stylesheet" href="l/index.css">
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        
        <script src="l/index.js" type="text/javascript"></script>
        
        <link rel="icon" href="l/imagens/icon.png">

        <?php
            @session_start();
            if(isset($_SESSION['usuario'])) {
                header("Location: l/");
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
                    
                    <a href="./">BurgerQueen</a>
                    
                </th></tr>
                </thead>
                <tbody>
                <tr><td  class="ItemMenu">
                    
                    <a href="./">Home</a>
                    
                </td></tr>
                <tr><td  class="ItemMenu">
                    
                    <a href="cardapio/consultar.php?pag=0">Cardápio</a>
                    
                </td></tr>
                <tr><td  class="ItemMenu">
                    
                    <a href="cadastrar/">Cadastrar</a>
                    
                </td></tr>
                <tr><td  class="ItemMenu">
                    
                    <a href="sobre/">Sobre nós</a>
                    
                </td></tr>
                </tbody>
            </table>
        </td>
        
        
        
        <td id="ContSite">
            
            <nav>
                <a href="./" id="NomeSite">BurgerQueen</a>
                <a href="login/" id="BotaoLogin"><div>Entrar</div></a>
            </nav>
                
            
                <div id="TextoBurgerQueen">
                    <h1 id="TituloBurgerQueen">BurgerQueen</h1>
                    <span class="Paragrafo">-------</span>Aqui no Burger Queen nós prezamos pela qualidade dos nossos lanches, fazendo deliciosos hamburgeres de todos os tipos para agradar a todos os gostos, e pela qualidade do nosso atendimento ao nossos clientes, com um site onde é possivel ver os nossos lanches disponiveis para serem pedidos e entregues direto para sua casa. Por enquanto a função de pedir não esta de pedir não está disponivel no site, então os pedidos devem ser realizados por telefone.
                </div>
            
            
                <table id="TabelaPedidos">
                    
                    <thead>
                    <tr>
                        <th colspan="2" id="MaisPedidos">
                        
                            Mais Pedidos
                        
                        </th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <tr>
                        <td><a href="cardapio/consultar.php?pag=0"><div class="ItemPedidos">
                            
                            X Burger
                            
                        </div></a></td>
                        <td><a href="cardapio/consultar.php?pag=0"><div class="ItemPedidos">
                            
                            X Egg
                            
                        </div></a></td>
                    </tr>
                    
                    <tr>
                        <td><a href="cardapio/consultar.php?pag=0"><div class="ItemPedidos">
                            
                            X Bacon
                            
                        </div></a></td>
                        <td><a href="cardapio/consultar.php?pag=0"><div class="ItemPedidos">
                            
                            X Tudo
                            
                        </div></a></td>
                    </tr>
                    
                    <tr>
                        <td><a href="cardapio/consultar.php?pag=0"><div class="ItemPedidos">
                            
                            X Egg Bacon
                            
                        </div></a></td>
                        <td><a href="cardapio/consultar.php?pag=0"><div class="ItemPedidos">
                            
                            Chicken Burger
                            
                        </div></a></td>
                    </tr>
                    
                    <tr>
                        <td><a href="cardapio/consultar.php?pag=0"><div class="ItemPedidos">
                            
                            Burger
                            
                        </div></a></td>
                        <td><a href="cardapio/consultar.php?pag=0"><div class="ItemPedidos">
                            
                            Salada Burger
                            
                        </div></a></td>
                    </tr>
                </tbody>
                </table>
            
            
            
            <footer>
                <span id="TextoFooter">© Burger Queen 2021</span>
                <div id="Redes">
                    <a href="sobre/" class="LinkSocial">
                        <img src="l/imagens/twitter.png" class="Social">
                    </a>
                    <a href="sobre/" class="LinkSocial">
                        <img src="l/imagens/facebook.png" class="Social">
                    </a>
                    <a href="sobre/" class="LinkSocial">
                        <img src="l/imagens/intagram.png" class="Social">
                    </a>
                </div>
            </footer>
        </td>
        
    </tr>
    </table>
        
	</body>
</html>