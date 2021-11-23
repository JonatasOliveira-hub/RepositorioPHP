<?php
session_start();
ob_start();
include_once './postgres_connection.php';

$num=filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(empty($num)){
    $_SESSION['msg'] = "<p> Erro: Usuário não encontrado!</p>";
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alunos-Editar</title>
    </head>
    <body>
        <a href = "index.php">Listar</a><br>
        <a href = "Cadastrar.php">Cadastrar</a><br>
        <h1>Editar</h1>
       
      
    </body>
</html>