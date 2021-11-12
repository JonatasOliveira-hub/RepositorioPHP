<?php
include_once './postgres_connection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exibir todas as perguntas</title>
    </head>
    <body>
        <a href = "ListarPerguntas.php">Listar</a><br>
        <a href = "CriarPergunta.php">Criar Pergunta</a><br>
        <a href = "ListarUmaPergunta.php">Listar uma pergunta</a><br>
        <a href = "editar.php">Editar pergunta</a><br>
        <h1>Listar todas as perguntas</h1>
        
        <?php
        $sql = "SELECT id_pergunta, descricao_pergunta, qunt_pontos, grau_dificuldade FROM perguntas";
        $result_perg = $dbconn -> prepare($sql);
        $result_perg->execute();

        if( ($result_perg) AND ($result_perg->rowCount() != 0) ){
            while ($linha = $result_perg->fetch(PDO::FETCH_ASSOC)) {
                extract($linha);
                echo "id: $id_pergunta <br>";
                echo "Pergunta: $descricao_pergunta <br>";
                echo "Quantidade de pontos da pergunta: $qunt_pontos <br>";
                echo "Grau de dificuldade da pergunta: $grau_dificuldade <br>";
                echo "<hr>";
            }
        }else {
            echo "Nenhum aluno encontrado.<br>";
        }
        ?>
    </body>
</html>