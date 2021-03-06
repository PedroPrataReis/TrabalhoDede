<!DOCTYPE html>
<html lang="pt-br">
	<head>
        
		<title>Burger Queen - Sobre Nós</title>
        
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
            if(isset($_SESSION['usuario']) && $_SESSION['nivel'] == 1) {
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
                <?php
                if(isset($_SESSION['usuario'])) {}else{echo'
                <tr><td  class="ItemMenu">
                    
                    <a href="../cadastrar/">Cadastrar-se</a>
                    
                </td></tr>';}?>
                <tr><td  class="ItemMenu">
                    
                    <a href="../sobre/">Sobre nós</a>
                    
                </td></tr>
                </tbody>
            </table>
        </td>
        
        
        
        <td id="ContSite">
            
            <nav>
                <a href="../" id="NomeSite">BurgerQueen</a>
                <?php
                    if(isset($_SESSION['usuario'])){
                        echo'<a href="../l/app/logout.php" id="BotaoLogin"><div>Sair</div></a>';
                    }else{
                        echo'<a href="../login/" id="BotaoLogin"><div>Entrar</div></a>';
                    }
                ?>
            </nav>
                
                <div id="TextoSobre">
                    
                    <h1 id="TituloSobre">Sobre o Burger Queen</h1>
                    
                    <span class="Paragrafo">-------</span>O Burger Queen é um estabelecimento fictício, criado pelos alunos Pedro Prata e José Eduardo para fazer o trabalho de Teoria da Programação e Laboratório de Programação do professor Dedé. Como o estabelecimento não existe, as redes socias do Burger Queen também não existem.
                    
                    <br><br><span class="Paragrafo">-------</span>Por enquanto o site só possui a homepage, essa página com um texto sobre o site, a página com o cardápio e a página de clientes. Futuramente o site possuirá novas funcionalidades e páginas, além de um sistema de login.
                    
                    <br><br><span class="Paragrafo">-------</span>Como o site não existe, esse texto não tem nenhuma utilidade real, servindo puramente para ocupar espaço e possibilitar a existência da página "sobre nós", deixando o site com uma aparência mais completa.
                    
                </div>
                
            <footer>
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
        <?php
            //mostrar login
            if(isset($_SESSION['usuario'])) {
                echo"<img src='../l/imagens/logado.png' id='logado'>";
                $user = $_SESSION['usuario'];
                if ($_SESSION['nivel'] == 1){
                    $nivel = "Funcionario";
                }else{
                    $nivel = "Cliente";
                }
                echo "<span id='user'>$user | $nivel</span>";
            }
        ?>
	</body>
</html>