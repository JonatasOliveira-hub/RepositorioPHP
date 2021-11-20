<?php
include('verifica_login.php');
/* Para pegar o que veio do login.php
aproveitando a session, foi passado o usuario. */
?>
<h2>Olá, <?php echo $_SESSION['usuario']; ?></h2>
<h2><a href="logout.php">Sair</a></h2>
