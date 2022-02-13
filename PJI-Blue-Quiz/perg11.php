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


$con=mysqli_connect('localhost','root');

mysqli_select_db($con,'bluequiz');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <link rel="stylesheet" href="./css/perg.css">

    <title>Blue Quiz - Perguntas</title>
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

        <section id ="painel_questao">
        <div class= "painel">

                <div class ="questoes">
                <div >
                   

                    <?php

                    
                        $q="SELECT * FROM perguntas ORDER BY RAND() LIMIT 1";
                        $query=mysqli_query($con,$q);

                        while ($rows = mysqli_fetch_array($query)){
                            $idp=$rows['id_perguntas'];
                            ?>
                            <div class="questao">
                            <h1><?php echo $rows['enunciado_pergunta'] ?></h1>
                            
                            <?php

                                $q="SELECT * FROM alternativas WHERE fk_id_pergunta= $idp";
                                $query=mysqli_query($con,$q);

                                while ($rows = mysqli_fetch_array($query)){
                            ?>
                            <div class="alternativas">
                                    <input  type="radio" name="quizceck[]" >
                                    <p><?php echo $rows['enunciado_alternativa'];?></p>
                                    </div>

                        <?php
                        }
                    }
                    ?>
                    <form action="perg12.php">
                    <button class="button" id="prox">Próxima</button>
                    </form>
                </div>
                </div>
                

                
        </section>

        </div>
        
        <script src="./js/initeste.js"></script>
    </body>
</html>