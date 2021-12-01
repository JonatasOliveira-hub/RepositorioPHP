<?php
session_start();
ob_start();
include_once './postgres_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_pergunta"];
    $descricao_pergunta = $_POST["descricao_pergunta"];
    $qunt_pontos = $_POST["qunt_pontos"];
    $grau_dificuldade = $_POST["grau_dificuldade"];

    $stmt = $dbconn->prepare('UPDATE perguntas SET descricao_pergunta = :descricao_pergunta, qunt_pontos = :qunt_pontos, grau_dificuldade = :grau_dificuldade WHERE id_pergunta = :id');
    $stmt->execute(array(
        ':id'   => $id,
        ':descricao_pergunta' => $descricao_pergunta,
        ':qunt_pontos' => $qunt_pontos,
        ':grau_dificuldade' => $grau_dificuldade,
    ));
    if ($stmt->rowCount() > 0) {
        echo "<p style=color:green;> Pergunta editada com sucesso!  </p>";
    } else {
        echo "<p style=color:red;> Pergunta não editada com sucesso!  </p>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Alunos-Editar</title>
</head>

<body>
    <a href="ListarPerguntas.php">Listar</a><br>
    <a href="CriarPergunta.php">Criar Pergunta</a><br>
    <a href="ListarUmaPergunta.php">Listar uma pergunta</a><br>
    <a href="editar.php">Editar pergunta</a><br>
    <a href="RemoverPergunta.php">Remover pergunta</a><br>
    <h1>Editar</h1>

    <form name="EditarPergunta" method="POST" action="">

        <label>Id da pergunta: </label>
        <input type="number" name="id_pergunta" id="id_pergunta" placeholder="Digite o id da pergunta"><br><br>

        <label>Pergunta: </label>
        <input type="text" name="descricao_pergunta" id="descricao_pergunta" placeholder="Digite sua pergunta"><br><br>

        <label>Quantidade de pontos: </label>
        <input type="number" name="qunt_pontos" id="qunt_pontos" placeholder="Digite a quantidade de pontos para a pergunta"><br><br>

        <B>Qual o grau de dificuldade da pergunta?</B><br>
        <input type=radio name=grau_dificuldade value="fácil"> Fácil
        <input type=radio name=grau_dificuldade value="média"> Média
        <input type=radio name=grau_dificuldade value="difícil"> Difícil
        <input type=radio name=grau_dificuldade value="muito difícil"> Muito difícil
        <br><br>

        <input type="submit" value="EditarPergunta" name="editarPergunta">
    </form>
</body>

</html>