<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $matricula = $_POST["matricula"];
    $dtNasc = $_POST["dtNasc"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $fone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $cep = $_POST["cep"];

    $arquivoAlunoIn = fopen("alunosNovos.txt", "r") or die("Erro na abertura do arquivo");
    while (!feof($arquivoAlunoIn)) {
        $linhas[] = fgets($arquivoAlunoIn);
    }
    fclose($arquivoAlunoIn);

    $arquivoAlunoOut = fopen("alunosNovos.txt", "w") or die("Erro na abertura do arquivo");
    $x = 0;
    //$linha = "";
    foreach ($linhas as $linha) {
        $colunaDados = explode(";", $linha);
        if ($colunaDados[1] == $matricula) {
            $txt = "$nome;$matricula;$dtNasc;$email;$cpf;$fone;$endereco;$cidade;$estado;$cep\n";
        } else {
            $txt = $linha;
        }
        fwrite($arquivoAlunoOut, $txt);
    }
    fclose($arquivoAlunoOut);
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Alterar Aluno</h1>
<br>
<br>
<form action="ex13_buscarAlunoNoArquivo.php" method=POST>
    Matricula: <input type=text name="matricula" >
    <br><br>
    <input type="submit" value="Alterar">
</form>
<br>
</body>
</html>
