<?php
include_once '../postgres_connection.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Exibir todos os livros</title>
</head>

<body>
   <h1>Exibir livros</h1>

    <?php
    $sql = "SELECT cod_livro, nome, autor, editora, quantidade_estoque, cod_de_barras FROM tb_livro";
    $result_perg = $dbconn->prepare($sql);
    $result_perg->execute();

    if (($result_perg) and ($result_perg->rowCount() != 0)) {
        while ($linha = $result_perg->fetch(PDO::FETCH_ASSOC)) {
            extract($linha);
            echo "Código do livro: $cod_livro <br>";
            echo "Nome do Livro: $nome <br>";
            echo "Autor do Livro: $autor <br>";
            echo "Editora do Livro: $editora <br>";
            echo "Quantidade de livros no estoque: $quantidade_estoque <br>";
            echo "Código de barras do livro: $cod_de_barras <br>";
            echo "<hr>";
        }
    } else {
        echo "Nenhum aluno encontrado.<br>";
    }
    ?>
    <a href="../index.php">Home</a><br>
    <a href="../atribuicoesGerente.php">Pagina anterior</a><br>

    <a href="./CadastrarLivro.php">Cadastrar Novo Livro</a><br>
    <a href="./RemoverLivros.php">Excluir Livros</a><br>
    <a href="./AlterarLivro.php">Alterar Livros</a><br>

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