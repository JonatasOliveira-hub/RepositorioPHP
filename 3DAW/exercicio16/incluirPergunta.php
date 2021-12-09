<?php
session_start();
ob_start();
include_once './postgres_connection.php';
$pergunta = $_GET["pergunta"];
$pontos = $_GET["pontos"];
$grau = $_GET["grau"];

//    echo "Pergunta: " . $pergunta . "<br>";
//    echo "pontos: " . $pontos . "<br>";
//    echo "grau: " . $grau . "<br>";
//  JSON: {"pergunta":"quem descobriu o Brasil?","pontos":"2","grau":"facil"}
//$resposta = "{\"pergunta\":\"$pergunta\",\"pontos\":\"$pontos\",\"grau\":\"$grau\"}";
//$resposta2 = "{\"pergunta\":\"" . $pergunta . "\",\"pontos\":\"" . $pontos . "\",\"grau\":\"" . $grau . "\"}";


$sql = "INSERT INTO perguntas (descricao_pergunta, qunt_pontos, grau_dificuldade) VALUES (:pergunta, :qunt_pontos, :grau_dificuldade)";
$cad_perg = $dbconn->prepare($sql);

//atribuição dos parâmetros para o insert
$cad_perg->bindParam(':pergunta', $pergunta);
$cad_perg->bindParam(':qunt_pontos', $pontos);
$cad_perg->bindParam(':grau_dificuldade', $grau);
$cad_perg->execute();

//BUSCANDO O OBJETO QUE CADASTREI
$stmt = $dbconn->prepare("SELECT id_pergunta, descricao_pergunta, qunt_pontos, grau_dificuldade FROM perguntas WHERE descricao_pergunta = :pergunta");
$stmt->execute(array(
    ':pergunta' => $pergunta
));

if (($stmt) and ($stmt->rowCount() != 0)) {
    while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $encode = $linha;
    }
} else {
    echo "Nenhum aluno encontrado.<br>";
}

echo json_encode($encode, JSON_UNESCAPED_UNICODE);

/*retornar um código de confirmação (JSON) para a página do html. 
retornar o próprio objeto que eu inseri.
Após a realização de uma operação, chamar um arquivo que valida o objeto na tabela e retorna o objeto para a pagina html
Procurar como fazer essa parada. 
Componente que auxilia Sinfone = hibernate = jpa = spring data(nunca usei)
*/