<?php
session_start();
ob_start();
include_once './postgres_connection.php';

$id = $_GET["id"];
$nome = $_GET["nome"];
$endereco = $_GET["endereco"];
$cep = $_GET["cep"];
$pais = $_GET["pais"];
$cpf = $_GET["cpf"];
$passaporte = $_GET["passaporte"];
$email = $_GET["email"];
$dtnascimento = date("Y-m-d", strtotime($_GET["nasc"]));

$stmt = $dbconn->prepare('UPDATE clientes SET nome=:nome, endereco=:endereco, postalcode=:cep, pais=:pais, 
    cpf=:cpf, passaporte=:passaporte, email=:email, datanascimento=:nasc WHERE id = :id');
$stmt->execute(array(
    ':id'   => $id,
    ':nome' => $nome,
    ':endereco' => $endereco,
    ':cep' => $cep,
    ':pais' => $pais,
    ':cpf' => $cpf,
    ':passaporte' => $passaporte,
    ':email' => $email,
    ':nasc' => $dtnascimento,
));

$stmt = $dbconn->prepare("SELECT id, nome, endereco, postalcode, pais, cpf, passaporte, email, datanascimento FROM clientes WHERE id = :id");
$stmt->execute(array(
    ':id' => $id
));

if (($stmt) and ($stmt->rowCount() != 0)) {
    while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $encode = $linha;
    }
} else {
    echo "Nenhum cliente encontrado.<br>";
}

echo json_encode($encode, JSON_UNESCAPED_UNICODE);
?>