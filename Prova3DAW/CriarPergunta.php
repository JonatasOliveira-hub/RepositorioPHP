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
        <a href = "ListarPerguntas.php">Listar</a><br>
        <a href = "CriarPergunta.php">Criar Pergunta</a><br>
        <a href = "ListarUmaPergunta.php">Listar uma pergunta</a><br>
        <h1>Criar Perguntas</h1>
        <?php
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if (!empty($dados['CriaPergunta'])) {
               
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
                    $sql = "INSERT INTO perguntas (descricao_pergunta, qunt_pontos, grau_dificuldade) VALUES (:pergunta, :qunt_pontos, :grau_dificuldade)";
                    $cad_perg = $dbconn-> prepare($sql);

                    //atribuição dos parâmetros para o insert
                    $cad_perg -> bindParam(':pergunta', $dados['pergunta']);
                    $cad_perg -> bindParam(':qunt_pontos', $dados['qunt_pontos']);
                    $cad_perg -> bindParam(':grau_dificuldade', $dados['grau_dificuldade']);
                    $cad_perg->execute();
                    if($cad_perg -> rowCount()){
                        echo "<p style=color:green;> Pergunta cadastrada com sucesso!  </p>";
                    }else {
                        echo "<p style=color:red;> Pergunta não cadastrada com sucesso! </p>";
                    }
                }
            }
        ?>
        <form name="CriarPergunta" method="POST" action="">
            
            <label>Pergunta: </label>
            <input type="text" name="pergunta" id="pergunta" placeholder="Digite sua pergunta"><br><br>
       
            <label>Quantidade de pontos: </label>
            <input type="number" name="qunt_pontos" id="qunt_pontos" placeholder="Digite a quantidade de pontos para a pergunta"><br><br>

            <B>Qual o grau de dificuldade da pergunta?</B><br>       
            <input type=radio name=grau_dificuldade value="fácil"> Fácil
            <input type=radio name=grau_dificuldade value="média"> Média
            <input type=radio name=grau_dificuldade value="difícil"> Difícil
            <input type=radio name=grau_dificuldade value="muito difícil"> Muito difícil
            <br><br>

            <input type="submit" value="CriaPergunta" name="CriaPergunta">
        </form>
    </body>
</html>
