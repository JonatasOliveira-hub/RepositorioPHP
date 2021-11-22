<?php
include('verifica_login.php');
/* Para pegar o que veio do login.php
aproveitando a session, foi passado o usuario.*/
?>
<h2>Olá, <?php echo $_SESSION['usuario']; ?>, você é um <?php echo $_SESSION['descricao_nivel']; ?>(a)</h2>
<?php
if ($_SESSION['descricao_nivel'] = 'Gerente') {
    header('Location: atribuicoesGerente.php');
}else{}
?>
<h2><a href="logout.php">Sair</a></h2>
