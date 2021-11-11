<?php
//$id = 0;
if($_SERVER["REQUEST_METHOD"]=="POST"){
$id = $_POST["id"];

$sql = "SELECT id_pergunta, descricao_pergunta, qunt_pontos, grau_dificuldade FROM perguntas WHERE id_pergunta = $id" ;
$result_perg = $dbconn -> prepare($sql);
$result_perg->execute();
    echo "id: $id <br>";
        echo "Pergunta: $descricao_pergunta <br>";
        echo "Quantidade de pontos da pergunta: $qunt_pontos <br>";
        echo "Grau de dificuldade da pergunta: $grau_dificuldade <br>";
        echo "<hr>";
    }

include_once './postgres_connection.php'
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
        <h1>Listar todas as perguntas</h1>
        
        <form name="ListarUmaPergunta" method="POST" action="ListarUmaPergunta.php">
            
            <label>Id da pergunta: </label>
            <input type="number" name="id" id="id" placeholder="Digite o numero da pergunta"><br><br>
            <input type="submit" value="ListPerguntaEspecifica" name="ListPerguntaEspecifica"> 
        </form> 
    </body>
</html>