<?php
 $hostname="localhost";
 $user ="root";
$password="";
$database="bluequiz";
$conexao=mysqli_connect($hostname,$user,$password,$database);

if(!$conexao){
    print "ERROOOORRR";
}
?>