<?php
session_start();
include('postgres_connection.php');

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: index.php');
    exit();
}
/* Proteção contra sql injection.
Proteção contra acesso direto ao login.
*/
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "select id_usuario, usuario from Tb_Usuario where usuario = '{$usuario}' and senha = MD5('{$senha}')";
$result = $dbconn->prepare($sql);
$result->execute();
$result->rowCount();
if ($result->rowCount()) {
    $_SESSION['usuario'] = $usuario;
    header('Location: painel.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
}
?>