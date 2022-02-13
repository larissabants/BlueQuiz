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

        <link rel="stylesheet" href="./css/ajudas.css">

    <title>Blue Quiz - Ajuda</title>
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
            <div >
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

        <div class="ajuda">
        <h1>-> Posso criar mais de um cadastro utilizando o mesmo nome de usuário? </h1>
        <p>Infelizmente, você não pode criar outro cadastro com o mesmo nome de usuário, para cada conta criada deve-se escolher nome e e-mail diferentes. </p>
        <br><h1>-> Qual foi a base para a criação das perguntas do teste? </h1>
        <p>As perguntas foram feitas com base em pesquisas e em outros testes vocacionais. </p>
        <br><h1>-> Posso refazer o meus testes? </h1>
        <p>Sim, você pode refazer o seu teste quantas vezes quiser!</p>
        <br><h1>-> Consigo ter acesso aos resultados de todos os testes que eu realizei?</h1>
        <p>Sim! Os resultados de todos os testes feitos no site estão localizados na aba “Usuário”. </p>
        <br><h1>-> Esqueci a minha senha o que devo fazer? </h1>
        <p>Clique no botão “Esqueci minha senha” na tela de login, e siga as instruções. </p>
        <br><h1>-> Posso alterar “meu nome de usuário? </h1>
        <p>Sim! Para altera-lo, basta ir a até a aba “Usuário” e clicar no seu atual nome de usuário.</p>
    </div>
        
        <script src="./js/initeste.js"></script>
    </body>
</html>