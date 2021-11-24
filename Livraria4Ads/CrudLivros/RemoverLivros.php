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
</head>

<body>

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

        <input type="submit" value="Remover Livro" name="Remover Livro"><br><br>
    </form>
    <a href="../index.php">Home</a><br>
    <a href="../atribuicoesGerente.php">Pagina anterior</a><br>

    <a href="./CadastrarLivro.php">Cadastrar Novo Livro</a><br>
    <a href="./AlterarLivro.php">Alterar Livros</a><br>
    <a href="./ListarLivros.php">Exibir Livros</a><br>

    <a href="CadastrarCliente.php">Cadastrar Novo Cliente</a><br>
    <a href="RemoverCliente.php">Remover Cliente</a><br>
    <a href="AlterarCliente.php">Alterar Cliente</a><br>
    <a href="BuscarCliente.php">Buscar Cliente</a><br>

    <a href="CadastrarFuncionario.php">Cadastrar Novo Funcionário</a><br>
    <a href="AlterarFuncionario.php">Alterar Funcionário</a><br>
    <a href="RemoverFuncionario.php">Excluir Funcionário</a><br>
    <a href="BuscarFuncionario.php">Buscar Funcionário</a><br>

    <h2><a href="../logout.php">Sair</a></h2>
</body>

</html>