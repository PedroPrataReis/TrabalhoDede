<!DOCTYPE html>
<html lang="pt-br">
	<head>
        
		    <title>Burger Queen - Clientes | Alterar</title>
        
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

              $id = $_GET['id'];
              $re = $_GET['re'];
                    
              $ComandoSQL = "SELECT * FROM tb_cliente WHERE id = ".$id;

              $u=$conexao->query($ComandoSQL);

              while($row = $u->fetch(PDO::FETCH_OBJ)){

                echo'
                  <h1 class="TituloIncluir">Alteração Cliente</h1>
                  <form method="POST" action="../../app/alteracao_cliente.php">
                  <input type="hidden" name="id" value="'.$row->id.'">
                  <input type="hidden" name="re" value="'.$re.'">
                    <table class="TabelaIncluir">
                      <tr>
                        <td class="LabelIncluir"><label for="email_cliente">Email:</label><span class="Paragrafo">-</span></td>
                        <td>
                          <input name="email_cliente" type="text" id="email_cliente" size="30" required="required" value="'.$row->email_cliente.'">
                        </td>
                      </tr>
                      <tr>
                        <td class="LabelIncluir"><label for="nome_cliente">Nome:</label><span class="Paragrafo">-</span></td>
                        <td>
                          <input name="nome_cliente" type="text" id="nome_cliente" size="30" required="required" value="'.$row->nome_cliente.'">
                        </td>
                      </tr>
                      <tr>
                        <td class="LabelIncluir"><label for="telefone_cliente">Telefone:</label><span class="Paragrafo">-</span></td>
                        <td>
                          <input type="text" name="telefone_cliente" id="telefone_cliente" size="30"  required="required" value="'.$row->telefone_cliente.'">
                        </td>
                      </tr>
                      <tr>
                        <td class="LabelIncluir"><label for="bairro">Bairro:</label><span class="Paragrafo">-</span></td>
                        <td>
                          <input type="text" name="bairro" id="bairro"  size="30"  required="required" value="'.$row->bairro.'">
                        </td>
                      </tr>
                      <tr>
                        <td class="LabelIncluir"><label for="rua">Rua:</label><span class="Paragrafo">-</span></td>
                        <td>
                          <input type="text" name="rua" id="rua"  size="30" required="required" value="'.$row->rua.'">
                        </td>
                      </tr>
                      <tr>
                        <td class="LabelIncluir"><label for="numero">Número:</label><span class="Paragrafo">-</span></td>
                        <td>
                          <input type="text" name="numero" id="numero"  size="30"  required="required" value="'.$row->numero.'">
                        </td>
                      </tr>

                      <tr>
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
        
	    <img src="../../imagens/logado.png" id="logado">
        
	</body>
</html>