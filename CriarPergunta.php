<?php
include_once './postgres_connection.php'
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Perguntas</title>
    </head>
    <body>
        <a href = "index.php">Listar</a><br>
        <a href = "Cadastrar.php">Cadastrar</a><br>
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
                    $sql = "INSERT INTO perguntas (Matricula, NomeAluno) VALUES (:matricula, :nome)";
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
        <form name="CriarPergunta" method="POST" action="radio.php">
            
            <label>Pergunta: </label>
            <input type="text" name="pergunta" id="pergunta" placeholder="Digite sua pergunta"><br><br>
       


            <label>Quantidade de pontos: </label>
        <input type="number" name="qunt_pontos" id="qunt_pontos"   

            <input type="submit" value="Cadastrar" name="CadastrarAluno"> 
    </body>
</html>

 <input type="text" name="qunt_pontos" id="qunt_pontos" placeholder="Valor da pergunta"><br><br>
            <input type=radio name=qunt_pontos value="Windows 98"> Win 98
            <input type=radio name=qunt_pontos value="Windows XP"> Win XP
            <input type=radio name=qunt_pontos value="Linux"> Linux
            <input type=radio name=qunt_pontos value="Mac"> Mac
            <br><br>