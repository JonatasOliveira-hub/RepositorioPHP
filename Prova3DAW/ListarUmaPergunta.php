<?php
include_once './postgres_connection.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
$id = $_POST["id"];
$consulta = $dbconn->query("SELECT id_pergunta, descricao_pergunta, qunt_pontos, grau_dificuldade FROM perguntas WHERE id_pergunta = $id");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "id: $id <br>";
        echo "Pergunta:  {$linha['descricao_pergunta']} <br>";
        echo "Quantidade de pontos da pergunta: {$linha['qunt_pontos']} <br>";
        echo "Grau de dificuldade da pergunta:{$linha['grau_dificuldade']} <br>";
        echo "<hr>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exibir uma pergunta</title>
    </head>
    <body>
        <a href = "ListarPerguntas.php">Listar</a><br>
        <a href = "CriarPergunta.php">Criar Pergunta</a><br>
        <a href = "ListarUmaPergunta.php">Listar uma pergunta</a><br>
        <a href = "editar.php">Editar pergunta</a><br>
        <h1>Listar uma pergunta</h1>
        
        <form name="ListarUmaPergunta" method="POST" action="ListarUmaPergunta.php">
            
            <label>Id da pergunta: </label>
            <input type="number" name="id" id="id" placeholder="Digite o numero da pergunta"><br><br>
            <input type="submit" value="ListPerguntaEspecifica" name="ListPerguntaEspecifica"> 
        </form> 
    </body>
</html>