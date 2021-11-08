<?php
include_once './postgres_connection.php'
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exibir Alunos</title>
    </head>
    <body>
        <a href = "index.php">Listar</a><br>
        <a href = "Cadastrar.php">Cadastrar</a><br>
        <h1>Listar</h1>
        
        <?php
        $sql = "SELECT Matricula, NomeAluno, id FROM alunos";
        $result_alunos = $dbconn -> prepare($sql);
        $result_alunos->execute();

        if( ($result_alunos) AND ($result_alunos->rowCount() != 0) ){
            while ($linha = $result_alunos->fetch(PDO::FETCH_ASSOC)) {
                extract($linha);
                echo "ID: $id <br>";
                echo "Matricula: $matricula <br>";
                echo "NomeAluno: $nomealuno <br>";
                echo "<hr>";
            }
        }else {
            echo "Nenhum aluno encontrado.<br>";
        }
        ?>
    </body>
</html>