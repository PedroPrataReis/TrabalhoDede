<!DOCTYPE html>
<html lang="pt-br">
	<head>
        
		<title>Burger Queen - Login | Consultar</title>
        
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
                <a href="../../login/" id="BotaoLogin"><div>Entrar</div></a>
            </nav>
                
                <div class="DivCadastrados">
                    
                    <?php
                        require_once"../../app/conexao.php";
                        try
                        {
                            $id = "";
                            $email_cliente = "";
                            $nome_cliente = "";
                            $telefone_cliente = "";
                            $bairro = "";
                            $rua = "";
                            $numero = "";
                            $ComandoSQL = "select*from tb_cliente";
                            $bq = $conexao->query($ComandoSQL);
                            
                            echo"<h1 class='TituloCadastrados'>Clientes Cadastrados</h1>
                            
                            <table class='TabelaCadastrados'>
                            <tr>
                                <th class='THTabelaCadastrados'>ID</th>
                                <th class='THTabelaCadastrados'>Email</th>
                                <th class='THTabelaCadastrados'>Nome</th>
                                <th class='THTabelaCadastrados'>Telefone</th>
                                <th class='THTabelaCadastrados'>Bairro</th>
                                <th class='THTabelaCadastrados'>Rua</th>
                                <th class='THTabelaCadastrados'>Numero</th>
                            </tr>
                            ";
                            
                            while ($i = $bq->fetch(PDO::FETCH_OBJ)) {
                                echo"<tr>";
                                echo"<td class='TDTabelaCadastrados'>".$i->id."</td>";
                                echo"<td  class='TDTabelaCadastrados'>".$i->email_cliente."</td>";
                                echo"<td  class='TDTabelaCadastrados'>".$i->nome_cliente."</td>";
                                echo"<td  class='TDTabelaCadastrados'>".$i->telefone_cliente."</td>";
                                echo"<td  class='TDTabelaCadastrados'>".$i->bairro."</td>";
                                echo"<td  class='TDTabelaCadastrados'>".$i->rua."</td>";
                                echo"<td  class='TDTabelaCadastrados'>".$i->numero."</td>";
                                echo"</tr>";
                            }
                            
                            echo"</table><br><br>
                            <a href='../incluir/' id='botao'>Incluir</a>
                            ";
                            
                        } catch (PDOException $e) {
                            echo"erro";
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