<?php

include_once("concad.php");

$rusuario = $_GET['nome_usuário'];
$remail = $_GET['email'];
$rsenha  = $_GET['senha'];
$rcsenha = $_GET['csenha'];

$sql="insert into usuário(nome_usuário,email,senha) values ('$rusuario','$remail','$rsenha')";
$salvar= mysqli_query($conexao,$sql);

$linhas = mysqli_affected_rows($conexao);

header('Location: bemv.php');
mysqli_close($conexao);

?>