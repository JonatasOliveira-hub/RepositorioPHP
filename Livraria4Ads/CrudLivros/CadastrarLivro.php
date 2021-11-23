<?php
include_once '../postgres_connection.php'
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastrar novo livro</title>
</head>

<body>
    <h1>Cadastrar Novo Livro</h1>
    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (!empty($dados['CadastraLivro'])) {

        $empyt_input = false;
        //Remoção de espaços vazios no final e inicio
        $dados = array_map('trim', $dados);

        //Verifica se os campos estão vazios
        if (in_array("", $dados)) {
            $empyt_input = true;
            echo "<br>Necessário preencher todos os campos. <br>";
        }

        //inserção no banco 
        if (!$empyt_input) {
            $sql = "INSERT INTO tb_livro(nome, autor, editora, quantidade_estoque, cod_de_barras)
                        VALUES (:nomeLivro, :nomeAutor, :nomeEditora, :qtdEstoque, :codBarras)";
            $cad_livro = $dbconn->prepare($sql);

            //atribuição dos parâmetros para o insert
            $cad_livro->bindParam(':nomeLivro', $dados['nomeLivro']);
            $cad_livro->bindParam(':nomeAutor', $dados['nomeAutor']);
            $cad_livro->bindParam(':nomeEditora', $dados['nomeEditora']);
            $cad_livro->bindParam(':qtdEstoque', $dados['qtdEstoque']);
            $cad_livro->bindParam(':codBarras', $dados['codBarras']);
            $cad_livro->execute();
            if ($cad_livro->rowCount()) {
                echo "<p style=color:green;> Livro cadastrado com sucesso  <br><br>";
            } else {
                echo "<p style=color:red;> Livro não cadastrado com sucesso! <br><br>";
            }
        }
    }
    ?>
    <form name="CadastraLivro" method="POST" action="">
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

        <input type="submit" value="Cadastrar" name="CadastraLivro"><br><br>

    </form>
    <a href="../index.php">Home</a><br>
    <a href="../atribuicoesGerente.php">Pagina anterior</a><br>
    
    <a href="AlterarLivros.php">Alterar Livros</a><br>
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