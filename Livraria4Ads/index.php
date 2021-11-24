<?php
include_once './postgres_connection.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <title>Livraria Cristo Vive</title>
</head>

<body>
    <h1>Bem Vindo a Livraria</h1>

    <form action="login.php" method="POST">
        <!--Colocar o CSS  -->
        <?php
        if (isset($_SESSION['nao_autenticado'])) :
        ?>
            <p>ERRO: Usuário ou senha inválidos.</p>
        <?php
        endif;
        unset($_SESSION['nao_autenticado']);
        ?>
        <input name="usuario" name="text" placeholder="Seu usuário">
        <input name="senha" type="password" placeholder="Sua senha">
        <button type="submit"> Entrar </button>

    </form>

</body>

</html>