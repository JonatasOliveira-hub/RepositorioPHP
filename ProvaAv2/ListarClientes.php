<?php
session_start();
ob_start();
include_once './postgres_connection.php';
$stmt = $dbconn->prepare("SELECT id, nome, endereco, postalcode, pais, cpf, passaporte, email, datanascimento FROM clientes ORDER BY id");
$stmt->execute();

if (($stmt) and ($stmt->rowCount() != 0)) {
    while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $encode = $linha;
    }
} else {
    echo "Nenhum cliente encontrado.<br>";
}

echo json_encode($encode, JSON_UNESCAPED_UNICODE);
?>
