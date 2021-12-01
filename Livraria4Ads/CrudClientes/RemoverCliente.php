<?php
session_start();
ob_start();
include_once '../postgres_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cod_cliente = $_POST["cod_cliente"];
    $cpf = $_POST["cpf"];

    $stmt = $dbconn->prepare('DELETE FROM tb_cliente WHERE cod_cliente = :cod_cliente AND cpf=:cpf');
    $stmt->execute(array(
        ':cod_cliente'   => $cod_cliente,
        ':cpf' => $cpf
    ));
    if ($stmt->rowCount() > 0) {
        echo "<p style=color:green;> Cliente removido com sucesso!  </p>";
    } else {
        echo "<p style=color:red;> Cliente não removido com sucesso!  </p>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Remover Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div class="container" style="background-color: gray;  width: 500px; height: 420px;">
        <h1>Remover Cliente</h1>

        <form name="RemoverCliente" method="POST" action="">

            <label>Código do cliente: </label>
            <input type="number" name="cod_cliente" id="cod_cliente" placeholder="Código do cliente"><br><br>

           <label>Cpf do cliente: </label>
            <input type="text" name="cpf" id="cpf" placeholder="Cpf cliente"><br><br>

            <input type="submit" value="Remover Cliente" name="Remover Cliente" class="btn btn-success"><br><br>
        </form>
    </div>
    <a href="../index.php">Home</a><br>
    <a href="../atribuicoesGerente.php">Pagina anterior</a><br>

    <a href="../CrudLivros/CadastrarLivro.php">Cadastrar Novo Livro</a><br>
    <a href="../CrudLivros/AlterarLivro.php">Alterar Livros</a><br>
    <a href="../CrudLivros/ListarLivros.php">Exibir Livros</a><br>
    <a href="../CrudLivros/RemoverLivros.php">Remover Livros</a><br>

    <a href="./CadastrarCliente.php">Cadastrar Novo Cliente</a><br>
    <a href="./AlterarCliente.php">Alterar Cliente</a><br>
    <a href="./BuscarCliente.php">Buscar Cliente</a><br>

    <a href="CadastrarFuncionario.php">Cadastrar Novo Funcionário</a><br>
    <a href="AlterarFuncionario.php">Alterar Funcionário</a><br>
    <a href="RemoverFuncionario.php">Excluir Funcionário</a><br>
    <a href="BuscarFuncionario.php">Buscar Funcionário</a><br>

    <h2><a href="../logout.php">Sair</a></h2>
</body>

</html>