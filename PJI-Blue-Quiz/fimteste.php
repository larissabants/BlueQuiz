<?php
require_once 'concad.php';

session_start();

if(!isset($_SESSION['logado'])):
	header('Location: entrar.php');
endif;

$nome_usuário = $_SESSION['nome_usuário'];
$sql = "SELECT * FROM usuário WHERE nome_usuário = '$nome_usuário'";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($conexao);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <link rel="stylesheet" href="./css/fimtest.css">

    <title>Blue Quiz - Final</title>
    </head>
    <body id="body-pd">
        <header class="header" id="header">
        
                    <img src="./img/Blue_mini2.png" alt="">
                
        </header>

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">

                <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
                </div>

                    <div class="nav__list">
                    

                         <div class="img_user">
                        <img src="./img/img_user_pad.png" alt="">
                         </div>
                        <br>

                        <a  class="nav__link">
                        <span class="nav__name"><?php echo $dados['nome_usuário']; ?> </span>
                        </a>

                        <a href="meucad.php" class="nav__link">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Meu Cadastro</span>
                        </a>

                        <a href="initeste.php" class="nav__link">
                            <i class='bx bx-folder nav__icon' ></i>
                            <span class="nav__name">Iniciar Teste</span>
                        </a>

                        
                    </div>
               
<br>
<br>
<br>
            <div>
                <a href="ajuda.php" class="nav__link">
                <i class='bx bx-message-square-detail nav__icon' ></i>
                <span class="nav__name">Ajuda</span>
                </a>
                <a href="sair.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Sair</span>
                </a>
            </div>
            </nav>
        </div>

        <div class="painel">

            <div class="content text_bemv">

                <h1> <?php echo $dados['nome_usuário']; ?> você se encaixou muito bem em Exatas!</h1>
            
            </div>

            <div class="content video">

            <iframe width="560" height="315" src="https://www.youtube.com/embed/aA72nMkdwHo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                
            </div>

            <div class="content text_boas">
            
            <div onclick="acao()" class="btn">Avaliar</div>
            <div class="modal">
            <p>Clique em um rostinho!</p>
                <div class= "imgs">
                    <ul>
                <li><a href="initeste.php"><img src="./img/gostei.png"/></a></li>
                <li><a href="initeste.php"><img src="./img/ngostei.png"/></a></li><br>
                
            </ul>
            
            </div><br><br>
            
            </div>
        
        <script src="./js/initeste.js"></script>
        <script src="./js/fimteste.js"></script>
    </body>
</html>