<!DOCTYPE html>
<html lang="pt-br">
	<head>
        
		    <title>Burger Queen - Usuários | Pesquisa</title>
        
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
                try{

                include '../../app/sql_injection.php';

                $pesquisa = limpar($_POST['pesquisa'],true);
                $campo = limpar($_POST['campo']);
                
                $ComandoSQL='';
                $result='';
                
                require_once '../../app/conexao.php';

                switch ($campo) {                    
                    case 'user':

                        $ComandoSQL = "SELECT * FROM tb_login WHERE usuario LIKE '%$pesquisa%'";

                        break;
                    
                    default:
                        
                        echo"<h1>nao foi possivel encontrar um resultado</h1>";
                    
                    break;
                }

                $result = $conexao->query($ComandoSQL);

                echo"<h1 class='TituloCadastrados'>Usuários</h1>
                            
                <form method='POST' action='./pesquisa/' name='form_pesquisa'>

                    <label for='pesquisa' class='LabelPesquisa'>Pesquisar:</label>
                    <input name='pesquisa' type='text' id='pesquisa' required='required' class='InputPesquisa'>

                    <input type='hidden' id='campo' value='user'>

                    <input type='submit' value='Buscar' id='BotaoPesquisar'>
                    <br><br>

                </form>

                <table class='TabelaCadastrados'>
                <tr>
                    <th class='THTabelaCadastrados'>Usuario</th>
                    <th class='THTabelaCadastrados'>Tipo</th>
                    <th class='THTabelaCadastrados'>Alterar</th>
                    <th class='THTabelaCadastrados'>Excluir</th>
                </tr>
                ";
                
                function nvl($n){
                    if($n==1){
                        $n = str_replace('1', 'Funcionário', $n);
                        return $n;
                    }else{
                        $n = str_replace('0', 'Cliente', $n);
                        return $n;
                    }
                }

                while ($i = $result->fetch(PDO::FETCH_OBJ)) {
                    echo"<tr>
                    <td class='TDTabelaCadastrados'>".$i->usuario."</td>
                    <td class='TDTabelaCadastrados'>".nvl($i->nivel)."</td>
                    <td class='TDTabelaCadastrados'><a href='../alterar/index.php?cd=".$i->usuario."&&re=0'><img src='../../imagens/editar.png' class='Alterar'></a></td>
                    <td class='TDTabelaCadastrados'><a href='../../app/excluir_login.php?cd=".$i->usuario."&&re=0'><img src='../../imagens/excluir.png' class='Excluir'></a></td>
                    </tr>";                                    
                }
                
                echo"</table>";

                echo"<br><br><a href='../consultar.php?pag=0' id='botao'>Voltar</a>";
                } catch (Exception $e) {
                    // caso ocorra uma exceção, exibe na tela
                    header("Location: ../../../erro.php");
                    die();
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