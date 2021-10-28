<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $AntigaPalavra = $_POST["AntigaPalavra"];
    $NovaPalavra = $_POST["NovaPalavra"];

    //Realiza a abertura do arquivo
    $arquivoAluno = fopen("alunosNovos.txt", "r") or die("Erro na abertura do arquivo");

    //Ler o arquivo
    $cabecalho =  fgets($arquivoAluno);
    $linhas = explode(";", file_get_contents("./{$cabecalho}"));
}


?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Alterar Aluno</h1>
<br>
<a href="ex13_inserirAluno.php">Inserir Aluno</a><br>
<a href="ex13_alterarAluno.php">Alterar Aluno</a><br>
<a href="ex13_listarAlunos.php">Listar Alunos</a><br>
<a href="ex13_excluirAluno.php">Excluir Aluno</a><br>
<a href="ex13_detalheAluno.php">Detalhe de Aluno</a><br>
<br>
<form action="ex13_alterarAluno.php" method=POST>
    Palavra a ser alterada: <input type=text name="AntigaPalavra"> <br>
    Palavra nova: <input type=text name="NovaPalavra"> <br>
    <br><br>
    <input type="submit" value="Alterar">
</form>
<br>
</body>
</html>