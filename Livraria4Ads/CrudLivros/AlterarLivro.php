<?php
session_start();
ob_start();
include_once '../postgres_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cod_livro = $_POST["cod_livro"];
    $nome = $_POST["nomeLivro"];
    $autor = $_POST["nomeAutor"];
    $editora = $_POST["nomeEditora"];
    $qtd_estoque = $_POST["qtdEstoque"];
    $cod_de_barras = $_POST["codBarras"];

    $stmt = $dbconn->prepare('UPDATE tb_livro SET nome=:nomeLivro, autor=:nomeAutor, editora=:nomeEditora, quantidade_estoque=:qtdEstoque, cod_de_barras=:codBarras WHERE cod_livro = :cod_livro');
    $stmt->execute(array(
        ':cod_livro'   => $cod_livro,
        ':nomeLivro' => $nome,
        ':nomeAutor' => $autor,
        ':nomeEditora' => $editora,
        ':qtdEstoque' => $qtd_estoque,
        ':codBarras' => $cod_de_barras,
    ));
    if ($stmt->rowCount() > 0) {
        echo "<p style=color:green;> Livro editado com sucesso!  </p>";
    } else {
        echo "<p style=color:red;> Livro não editado com sucesso!  </p>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Alterar Livro</title>
</head>

<body>

    <h1>Alterar Livro</h1>

    <form name="AlterarLivro" method="POST" action="">

        <label>Código do livro: </label>
        <input type="number" name="cod_livro" id="cod_livro" placeholder="Código do livro"><br><br>

        <label>Nome do livro: </label>
        <input type="text" name="nomeLivro" id="nomeLivro" placeholder="Nome do livro"><br><br>

        <label>Autor do livro: </label>
        <input type="text" name="nomeAutor" id="nomeAutor" placeholder="Nome do autor"><br><br>

        <label>Editora do livro: </label>
        <input type="text" name="nomeEditora" id="nomeEditora" placeholder="Nome da editora"><br><br>

        <label>Quantidade em estoque: </label>
        <input type="number" name="qtdEstoque" id="qtdEstoque" placeholder="Quantidade no estoque"><br><br>

        <label>Código de barras: </label>
        <input type="number" name="codBarras" id="codBarras" placeholder="Código de barras"><br><br>

        <input type="submit" value="AlterarLivro" name="AlterarLivro"><br><br>
    </form>
    <a href="../index.php">Home</a><br>
    <a href="../atribuicoesGerente.php">Pagina anterior</a><br>

    <a href="CadastrarLivro.php">Cadastrar Novo Livro</a><br>
    <a href="RemoverLivros.php">Excluir Livros</a><br>
    <a href="ListarLivros.php">Exibir Livros</a><br>

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