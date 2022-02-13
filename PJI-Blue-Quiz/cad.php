<!DOTYPE html>

<html lang="pt-br">
    <head>
        <link rel="stylesheet" type="text/css" href="./css/cad.css">
        <title>Blue Quiz - Cadastrar</title>
    </head>
<body>
    <div class="logo">
        <img src="./img/Blue_mini.png"/>
        </div>
    <form method="get" action="proccad.php">
        <h1>Cadastro</h1>
        <input id="nome_usuário" type="text" name="nome_usuário" placeholder="Usuário" maxlength="255" required/>
        <input id="email" type="text" name="email" placeholder="Email" maxlength="255" required/>
        <input id="senha" type="password" name="senha" placeholder="Senha" maxlength="100" required/>
        <input id="csenha" type="password" name="csenha" placeholder="Confirmar Senha" required/>
        <button type="submit">Cadastrar</button>
    </form>

    <script>
        var nome_usuário = document.getElementById('nome_usuário');
        var email = document.getElementById('email');
        var senha = document.getElementById('senha');
        var csenha = document.getElementById('csenha');

        nome_usuário.addEventListener('focus',()=>{
            nome_usuário.style.borderColor = "#1E4D8B";
        });
        nome_usuário.addEventListener('blur',()=>{
            nome_usuário.style.borderColor = "#ccc";
        });

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

        csenha.addEventListener('focus',()=>{
            csenha.style.borderColor = "#1E4D8B";
        });
        csenha.addEventListener('blur',()=>{
            csenha.style.borderColor = "#ccc";
        });
    </script>
</body>
</html>