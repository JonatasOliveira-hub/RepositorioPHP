<?php
session_start();
ob_start();
include_once './postgres_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pergunta = $_POST["id_pergunta"];
    $stmt = $dbconn->prepare('DELETE FROM perguntas WHERE id_pergunta = :id_pergunta');
    $stmt->execute(array(
        ':id_pergunta'   => $id_pergunta
    ));
    if ($stmt->rowCount() > 0) {
        echo "<p style=color:green;> Pergunta removida com sucesso!  </p>";
    } else {
        echo "<p style=color:red;> Pergunta não removida com sucesso!  </p>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Remover Pergunta</title>
</head>

<body>
    <h1>Remover Livro</h1>

    <a href="ListarPerguntas.php">Listar</a><br>
    <a href="CriarPergunta.php">Criar Pergunta</a><br>
    <a href="ListarUmaPergunta.php">Listar uma pergunta</a><br>
    <a href="editar.php">Editar pergunta</a><br>
    <form name="RemoverPergunta" method="POST" action="">

        <label>Id da pergunta: </label>
        <input type="number" name="id_pergunta" id="id_pergunta" placeholder="Digite o id da pergunta"><br><br>

        <input type="submit" value="Remover Pergunta" name="Remover Pergunta" class="btn btn-success"><br><br>
    </form>
    </div>

</body>

</html>