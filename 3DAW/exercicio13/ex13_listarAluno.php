<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST["matricula"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $dt_nascimento = $_POST["dt_nascimento"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];
    $cidade = $_POST["cidade"];
    //Vou escreer os dados do formulário, em um arquivo
    //$dadosAluno = fopen("dadosNovoAluno.txt","w");
    $cabecalho = "matricula;nome;email;data Nascimento;cpf;endereco;cidade\n";
    //fwrite($dadosAluno, $cabecalho);
    $dadosEntrada = "$matricula;$nome;$email;$email;$dt_nascimento;$cpf;$endereco;$cidade\n";
    //fwrite($dadosAluno, $dadosEntrada);
    file_put_contents("dadosNovoAluno.txt",[$cabecalho, $dadosEntrada], FILE_APPEND);//usado para append
   // fclose($dadosAluno);
}
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <br>
        <a href="ex13_inserirAluno.php">Inserir Aluno</a><br>
        <a href="ex13_alterarAluno.php">Alterar Aluno</a><br>
        <a href="ex13_listarAluno.php">Listar Aluno</a><br>
        <a href="ex13_excluirAluno.php">Excluir Aluno</a><br>
        <a href="ex13_detalheAluno.php">Detalhe de Aluno</a><br>
        <form action="ex13_inserirAluno.php" method=POST>
            Matricula:<input type=text name="matricula"><br>
            nome:<input type=text name="nome"><br>
            email:<input type=text name="email"><br>
            data nascimento:<input type=text name="dt_nascimento"><br>
            cpf:<input type=text name="cpf"><br>
            endereço:<input type=text name="endereco"><br>
            cidade:<input type=text name="cidade"><br>
            <input type="submit" value="cadastrar">
        </form>
    </body>
</html>