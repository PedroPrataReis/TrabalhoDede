<!DOCTYPE html>
<html lang="pt-br">
	<head>
        
		<title>Burger Queen - Cardápio | Consultar</title>
        
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
                
                <div class="DivCadastrados">
                    
                    <?php
                        require_once"../app/conexao.php";
                        try
                        {
                            $codigo_produto = "";
                            $nome_produto = "";
                            $preco_produto = "";
                            $descricao_produto = "";

                            $ComandoSQL = "select*from tb_produto";
                            $bq = $conexao->query($ComandoSQL);
                            
                            echo"<h1 class='TituloCadastrados'>Cardápio</h1>
                            
                            <form method='POST' action='./pesquisa/' name='form_pesquisa'>

                                <label for='pesquisa' class='LabelPesquisa'>Pesquisar:</label>
                                <input name='pesquisa' type='text' id='pesquisa' required='required' class='InputPesquisa'>

                                <label for='campo' class='LabelPesquisa'>Campo:</label>
                                <select name='campo' id='campo' class='InputPesquisa'>
                                    <option value='nome'>Nome</option>
                                    <option value='preco'>Preço</option>
                                    <option value='descricao'>Descrição</option>
                                </select>

                                <input type='submit' value='Buscar' id='BotaoPesquisar'>
                                <br><br>

                            </form>

                            <table class='TabelaCadastrados'>
                            <tr>
                                <th class='THTabelaCadastrados'>Nome</th>
                                <th class='THTabelaCadastrados'>Preço</th>
                                <th class='THTabelaCadastrados'>Descrição</th>
                                <th class='THTabelaCadastrados'>Alterar</th>
                                <th class='THTabelaCadastrados'>Excluir</th>
                            </tr>
                            ";

                            $linhas = $bq->rowCount();

                            if ($linhas == 0){
                                echo"<tr>
                                    <td class='TDTabelaCadastrados'><span class='Paragrafo'>-</span></td>
                                    <td class='TDTabelaCadastrados'><span class='Paragrafo'>-</span></td>
                                    <td class='TDTabelaCadastrados'><span class='Paragrafo'>-</span></td>
                                    <td class='TDTabelaCadastrados'><span class='Paragrafo'>-</span></td>
                                    <td class='TDTabelaCadastrados'><span class='Paragrafo'>-</span></td>
                                    </tr>";
                            }

                            $pagina = $_GET['pag'];
                            $contador=0;

                            while ($i = $bq->fetch(PDO::FETCH_OBJ)) {
                                if($contador>=$pagina*5 && $contador<($pagina*5+5)){
                                    echo"<tr>
                                    <td class='TDTabelaCadastrados'>".$i->nome_produto."</td>
                                    <td class='TDTabelaCadastrados'>".$i->preco_produto."</td>
                                    <td class='TDTabelaCadastrados'>".$i->descricao_produto."</td>
                                    <td class='TDTabelaCadastrados'><a href='./alterar/index.php?cd=".$i->codigo_produto."&&re=".$pagina."'><img src='../imagens/editar.png' class='Alterar'></a></td>
                                    <td class='TDTabelaCadastrados'><a href='../app/excluir_produto.php?cd=".$i->codigo_produto."&&re=".$pagina."'><img src='../imagens/excluir.png' class='Excluir'></a></td>
                                    </tr>";                                    
                                }
                                $contador++;
                            }

                            echo"</table><br><br>";

                            if($pagina>0){
                                $voltar=$pagina-1;
                                echo"<a href='./consultar.php?pag=".$voltar."' class='Seta'><img src='../imagens/voltar.png' class='Seta'></a>";
                                //echo"<a href='./consultar.php?pag=".$voltar."'> voltar </a>";
                            }else{
                                echo"<img src='../imagens/NVoltar.png' class='SetaApagada'>";
                                //echo" voltar ";
                            }
                            
                            $proximo=$pagina+1;
                            echo "<span class='npag'>".$proximo."</span>";
                            
                            if($proximo>=$linhas/5){
                                echo"<img src='../imagens/NProximo.png' class='SetaApagada'>";
                                //echo" proximo ";
                            }else{
                                echo"<a href='./consultar.php?pag=".$proximo."' class='Seta'><img src='../imagens/proximo.png' class='Seta'></a>";
                                //echo"<a href='./consultar.php?pag=".$proximo."'> proximo </a>";
                            }
                            
                            echo"<br><br><a href='incluir/' id='botao'>Incluir</a>";
                            
                        } catch (PDOException $e) {
                            echo"erro";
                        }
                    ?>
                
                </div>
                
            <footer class="FooterSemConteudo">
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
        <?php
            $user = $_SESSION['usuario'];
            echo "<span id='user'>$user</span>";
        ?>
        
	</body>
</html>