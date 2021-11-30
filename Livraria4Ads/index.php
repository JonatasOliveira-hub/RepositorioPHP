<?php
include_once './postgres_connection.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="CSS/signin.css" rel="stylesheet">

    <title>Livraria Cristo Vive</title>
</head>

<body class="text-center">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div class="container" style="background-color: #42dea4;  width: 500px; height: 420px;">
        <h1 class="h3 mb-3 font-weight-normal">Bem vindo a livraria Cristo Vive</h1>
        <form class="form-signin" action="login.php" method="POST">
            <?php
            if (isset($_SESSION['nao_autenticado'])) :
            ?>
                <p>ERRO: Usuário ou senha inválidos.</p>
            <?php
            endif;
            unset($_SESSION['nao_autenticado']);
            ?>

            <input name="usuario" type="text" class="form-control" placeholder="Seu usuário">

            <input name="senha" type="password" class="form-control" placeholder="Sua senha">


            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
            <p class="mt-5 mb-3 text-muted">&copy; 1995-2021</p>

        </form>
    </div>
</body>

</html>