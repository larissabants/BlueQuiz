<?php
require_once 'concad.php';

session_start();

if(isset($_POST['btn-entrar'])):
	$erros = array();
	$email = mysqli_escape_string($conexao, $_POST['email']);
	$senha = mysqli_escape_string($conexao, $_POST['senha']);

	if(isset($_POST['lembre-me'])):

		setcookie('email', $email, time()+3600);
		setcookie('senha', $senha, time()+3600);
	endif;

	if(empty($email) or empty($senha)):
		$erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
	else:

		$sql = "SELECT email FROM usuário WHERE email = '$email'";
		$resultado = mysqli_query($conexao, $sql);		

		if(mysqli_num_rows($resultado) > 0):
		    
		$sql = "SELECT * FROM usuário WHERE email = '$email' AND senha = '$senha'";



		$resultado = mysqli_query($conexao, $sql);

			if(mysqli_num_rows($resultado) == 1):
				$dados = mysqli_fetch_array($resultado);
				mysqli_close($conexao);
				$_SESSION['logado'] = true;
				$_SESSION['nome_usuário'] = $dados['nome_usuário'];
				header('Location: bemv.php');
			else:
				$erros[] = "<li> Email e senha não conferem </li>";
			endif;

		else:
			$erros[] = "<li> Conta inexistente </li>";
		endif;

	endif;

endif;
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/entrar.css">
        <title>Blue Quiz - Entrar</title>
        <meta charset="utf-8">
    </head>
    
<body>
    
    <div class="logo">
        <img src="./img/Blue_mini.png"/>
        </div>
  
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<input id="email" type="text" name="email" placeholder="Email" maxlength="235" required value="<?php echo isset($_COOKIE['login']) ? $_COOKIE['login'] : '' ?>">
<input id="senha" type="password" name="senha" placeholder="Senha" maxlength="235" required value="<?php echo isset($_COOKIE['senha']) ? $_COOKIE['senha'] : '' ?>">
Lembre me: <input type="checkbox" name="lembre-me"><br>
<button type="submit" name="btn-entrar"> Entrar </button>
<?php 
if(!empty($erros)):
	foreach($erros as $erro):
		echo $erro;
	endforeach;
endif;
?>
</form>

    <script>
        var email = document.getElementById('email');
        var senha = document.getElementById('senha');

        email.addEventListener('focus',()=>{
            email.style.borderColor = "#1E4D8B";
        });
        email.addEventListener('blur',()=>{
            email.style.borderColor = "#ccc";
        });
        senha.addEventListener('focus',()=>{
            senha.style.borderColor = "#1E4D8B";
        });
        senha.addEventListener('blur',()=>{
            senha.style.borderColor = "#ccc";
        });
    </script>
    
</body>
</html>
