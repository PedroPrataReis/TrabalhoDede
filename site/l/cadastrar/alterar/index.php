<!DOCTYPE html>
<html lang="pt-br">
	<head>
        
		<title>Burger Queen - Usuários | Alterar</title>
        
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
            if(isset($_SESSION['usuario']) && $_SESSION['nivel'] == 1) {} else {
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
                    
                    <a href="../../cadastrar/">Usuários</a>
                    
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
                include '../../app/sql_injection.php';

                $cd = limpar($_GET['cd']);
                $re = limpar($_GET['re']);

                require_once '../../app/conexao.php';
                    
                $ComandoSQL = "SELECT * FROM tb_login WHERE usuario ='". $cd."'";

                $u=$conexao->query($ComandoSQL);

                while($row = $u->fetch(PDO::FETCH_OBJ)){

                echo'
                    <h1 class="TituloIncluir">Alteração Usuários</h1>
                    <form method="POST" action="../../app/alteracao_login.php">
                    <input type="hidden" name="usuario" value="'.$row->usuario.'">
                    <input type="hidden" name="re" value="'.$re.'">
                    <table class="TabelaIncluir">
                        <tr>
                        <td class="LabelIncluir"><label for="usuario">Usuario:</label><span class="Paragrafo">-</span></td>
                        <td>
                            <input name="usuario" type="text" id="usuario" size="30" required="required" value="'.$row->usuario.'">
                        </td>
                        </tr>
                        <tr>
                        <td class="LabelIncluir"><label for="senha">Senha:</label><span class="Paragrafo">-</span></td>
                        <td>
                            <input type="password" name="senha" id="senha" size="30"  required="required">
                        </td>
                        </tr>
                        <tr>
                        <td class="LabelIncluir"><label>Tipo:</label><span class="Paragrafo">-</span></td>
                        <td>
                            <input type="radio" name="nivel" id="nivel" required="required" value="0"> Cliente 
                            <span class="Paragrafo">-</span>
                            <input type="radio" name="nivel" id="nivel" required="required" value="1"> Funcionário 
                        </td>
                        </tr>
                        
                        <td colspan="2">
                            <br>
                            <input type="hidden" name="usuario_antigo" value="'.$row->usuario.'">
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
        <?php
            //mostrar login
            if(isset($_SESSION['usuario'])) {
                echo"<img src='../../imagens/logado.png' id='logado'>";
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