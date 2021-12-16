<?php
session_start();
ob_start();
include_once './postgres_connection.php';
$nome = $_GET["nome"];
$endereco = $_GET["endereco"];
$cep = $_GET["cep"];
$pais = $_GET["pais"];
$cpf = $_GET["cpf"];
$passaporte = $_GET["passaporte"];
$email = $_GET["email"];
$dtnascimento = $_GET["nasc"];

$sql = "INSERT INTO  clientes (nome, endereco, postalcode, pais, cpf, passaporte, email, datanascimento)
    VALUES (:nome, :endereco, :cep, :pais, :cpf, :passaporte, :email, :nasc)";

$cad_cliente = $dbconn->prepare($sql);

//atribuição dos parâmetros para o insert
$cad_cliente->bindParam(':nome', $nome);
$cad_cliente->bindParam(':endereco', $endereco);
$cad_cliente->bindParam(':cep', $cep);
$cad_cliente->bindParam(':pais', $pais);
$cad_cliente->bindParam(':cpf', $cpf);
$cad_cliente->bindParam(':passaporte', $passaporte);
$cad_cliente->bindParam(':email', $email);
$cad_cliente->bindParam(':nasc', $dtnascimento);
$cad_cliente->execute();

//BUSCANDO O OBJETO QUE CADASTREI
/* $stmt = $dbconn->prepare("SELECT id_pergunta, descricao_pergunta, qunt_pontos, grau_dificuldade FROM perguntas WHERE descricao_pergunta = :pergunta");
$stmt->execute(array(
    ':pergunta' => $pergunta
));

if (($stmt) and ($stmt->rowCount() != 0)) {
    while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $encode = $linha;
    }
} else {
    echo "Nenhum cliente encontrado.<br>";
}

echo json_encode($encode, JSON_UNESCAPED_UNICODE); */

?>
