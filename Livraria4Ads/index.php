<?php
include_once './postgres_connection.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Livraria Cristo Vive</title>
</head>

<body>    
    <h1>Bem Vindo a Livraria</h1>
   
   <form action="login.php" method="POST">
       <!--Colocar o CSS  -->
    <?php
    if (isset($_SESSION['nao_autenticado'])):
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