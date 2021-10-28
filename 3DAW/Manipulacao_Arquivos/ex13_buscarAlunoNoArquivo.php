<?php
    $matricula = "";
    $linhas = array();
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $matricula = $_GET["matricula"];
    }
    $arquivoAluno = fopen("alunosNovos.txt", "r") or die("Erro na abertura do arquivo");
    $cabecalho =  fgets($arquivoAluno);
    $x = 0;
    $colunaDados = array();
    $achei = false;
    while (!feof($arquivoAluno)) {
        $linhas[] = fgets($arquivoAluno);
        echo $linhas[$x];
        echo "<br>";
        $colunaDados = explode(";", $linhas[$x]);
        echo "matricula arquivo: $colunaDados[1] / matricula aluno:  $matricula<br>";
        if ($colunaDados[1] == $matricula) {
            echo "<br>ACHEI";
            $achei = true;
            break;
        }
        $x++;
    }
    if (!$achei) {
        echo "matricula: $matricula não encontrada";
    } else {
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
        <h1>Alterar Aluno</h1>
        <br>
        <form action="ex13_alterarAlunoNoMesmoArquivo.php" method=POST>
            Matricula: <input type=text name="matricula" value='<?php echo $colunaDados[1]; ?>'> <br>
            nome: <input type=text name="nome" value='<?php echo $colunaDados[0]; ?>'> <br>
            email: <input type=text name="email" value='<?php echo $colunaDados[3]; ?>'> <br>
            data nascimento: <input type=text name="dtNasc" value='<?php echo $colunaDados[2]; ?>'> <br>
            cpf: <input type=text name="cpf" value='<?php echo $colunaDados[4]; ?>'> <br>
            telefone:<input type=text name="telefone" value='<?php echo $colunaDados[5]; ?>'> <br>
            endereço: <input type=text name="endereco" value='<?php echo $colunaDados[6]; ?>'> <br>
            cidade: <input type=text name="cidade" value='<?php echo $colunaDados[7]; ?>'> <br>
            estado: <input type=text name="estado" value='<?php echo $colunaDados[8]; ?>'> <br>
            cep: <input type=text name="cep" value='<?php echo $colunaDados[9]; ?>'> <br>
            <br><br>
            <input type="submit" value="Alterar">
        </form>
        <br>
</body>
</html>
<?php    }
?>