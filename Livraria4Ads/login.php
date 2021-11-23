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

//$sql = "select id_usuario, usuario from Tb_Usuario where usuario = '{$usuario}' and senha = MD5('{$senha}')";
//Adicionar o nivel do usuario. De acordo com o nivel, ele pode realizar o crud.
$sql = "SELECT tbu.usuario, tbu.senha, tbnu.descricao_nivel AS descricao_nivel
FROM Tb_Usuario tbu
INNER JOIN Tb_Nivel_Usuario tbnu 
ON tbu.nivel_usuario = tbnu.id_nivel
WHERE  usuario = '{$usuario}' AND senha = MD5('{$senha}')";

$result = $dbconn->prepare($sql);
$result->execute();
//Dei um fetch,  para pegar a linha retornada.
$linha = $result->fetch(PDO::FETCH_ASSOC);
$result->rowCount();
if ($result->rowCount()) {
    $_SESSION['usuario'] = $usuario;
    //Guardei a linha na sessão.
    $descricao_nivel = $linha['descricao_nivel'];
    $_SESSION['descricao_nivel'] = $descricao_nivel;
    //Se for gerente, tem acesso irrestrito
    header('Location: painel.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
}
?>