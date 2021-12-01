<?php
session_start();
ob_start();
include_once '../postgres_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cod_livro = $_POST["cod_livro"];
    $nome = $_POST["nomeLivro"];
    $autor = $_POST["nomeAutor"];
    $cod_de_barras = $_POST["codBarras"];

    $stmt = $dbconn->prepare('DELETE FROM tb_livro WHERE cod_livro = :cod_livro AND nome=:nomeLivro AND autor=:nomeAutor AND cod_de_barras=:codBarras');
    $stmt->execute(array(
        ':cod_livro'   => $cod_livro,
        ':nomeLivro' => $nome,
        ':nomeAutor' => $autor,
        ':codBarras' => $cod_de_barras,
    ));
    if ($stmt->rowCount() > 0) {
        echo "<p style=color:green;> Livro removido com sucesso!  </p>";
    } else {
        echo "<p style=color:red;> Livro não removido com sucesso!  </p>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Remover Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div class="container" style="background-color: gray;  width: 500px; height: 420px;">
        <h1>Remover Livro</h1>

        <form name="RemoverLivro" method="POST" action="">

            <label>Código do livro: </label>
            <input type="number" name="cod_livro" id="cod_livro" placeholder="Código do livro"><br><br>

            <label>Nome do livro: </label>
            <input type="text" name="nomeLivro" id="nomeLivro" placeholder="Nome do livro"><br><br>

            <label>Autor do livro: </label>
            <input type="text" name="nomeAutor" id="nomeAutor" placeholder="Nome do autor"><br><br>

            <label>Código de barras: </label>
            <input type="number" name="codBarras" id="codBarras" placeholder="Código de barras"><br><br>

            <input type="submit" value="Remover Livro" name="Remover Livro" class="btn btn-success"><br><br>
        </form>
    </div>
    <a href="../index.php">Home</a><br>
    <a href="../atribuicoesGerente.php">Pagina anterior</a><br>

    <a href="./CadastrarLivro.php">Cadastrar Novo Livro</a><br>
    <a href="./AlterarLivro.php">Alterar Livros</a><br>
    <a href="./ListarLivros.php">Exibir Livros</a><br>

    <a href="../CrudClientes/CadastrarCliente.php">Cadastrar Novo Cliente</a><br>
    <a href="../CrudClientes/RemoverCliente.php">Remover Cliente</a><br>
    <a href="../CrudClientes/AlterarCliente.php">Alterar Cliente</a><br>
    <a href="../CrudClientes/BuscarCliente.php">Buscar Cliente</a><br>

    <a href="CadastrarFuncionario.php">Cadastrar Novo Funcionário</a><br>
    <a href="AlterarFuncionario.php">Alterar Funcionário</a><br>
    <a href="RemoverFuncionario.php">Excluir Funcionário</a><br>
    <a href="BuscarFuncionario.php">Buscar Funcionário</a><br>

    <h2><a href="../logout.php">Sair</a></h2>
</body>

</html>