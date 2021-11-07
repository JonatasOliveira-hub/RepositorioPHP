<?php
include_once './postgres_connection.php'
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alunos</title>
    </head>
    <body>
        <h1>Cadastrar</h1>
        <?php
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if (!empty($dados['CadastrarAluno'])) {
               
                $empyt_input = false;
                //Remoção de espaços vazios no final e inicio
                $dados = array_map('trim', $dados);
               
                //Verifica se os campos estão vazios
                if(in_array("", $dados)){
                    $empyt_input = true;
                    echo "<br>Necessário preencher todos os campos. <br>";
                }
               
                //inserção no banco 
                if(!$empyt_input){
                    $sql = "INSERT INTO alunos (Matricula, NomeAluno) VALUES (:matricula, :nome)";
                    $cad_aluno = $dbconn-> prepare($sql);

                    //atribuição dos parâmetros para o insert
                    $cad_aluno -> bindParam(':matricula', $dados['matricula']);
                    $cad_aluno -> bindParam(':nome', $dados['nome']);
                    $cad_aluno->execute();
                    if($cad_aluno -> rowCount()){
                        echo "Aluno cadastrado com sucesso  <br>";
                    }else {
                        echo "Usuario não cadastrado com sucesso! <br>";
                    }
                }
            }
        ?>
        <form name="CadastraAluno" method="POST" action="">
            <label>Matricula: </label>
            <input type="text" name="matricula" id="matricula" placeholder="Sua matricula"><br><br>
       
            <label>Nome: </label>
            <input type="text" name="nome" id="nome" placeholder="Nome Completo"><br><br>     

            <input type="submit" value="Cadastrar" name="CadastrarAluno"> 
    </body>
</html>