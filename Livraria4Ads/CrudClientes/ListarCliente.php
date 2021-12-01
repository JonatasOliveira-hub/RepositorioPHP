<?php
include_once '../postgres_connection.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Exibir todos os livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
   <h1>Exibir Cliente</h1>

    <?php
    $sql = "SELECT  cod_cliente, nome, telefone, celular, cpf, endereco, email FROM tb_cliente";
    $result_perg = $dbconn->prepare($sql);
    $result_perg->execute();

    if (($result_perg) and ($result_perg->rowCount() != 0)) {
        while ($linha = $result_perg->fetch(PDO::FETCH_ASSOC)) {
            extract($linha);
            echo "Código do Cliente: $cod_cliente <br>";
            echo "Nome do Cliente: $nome <br>";
            echo "Telefone do cliente: $telefone <br>";
            echo "Celular do cliente: $celular <br>";
            echo "Cpf dp cliente: $cpf <br>";
            echo "Endereço do cliente: $endereco <br>";
            echo "Email do cliente: $email <br>";
            echo "<hr>";
        }
    } else {
        echo "Nenhum aluno encontrado.<br>";
    }
    ?>
   <a href="../index.php">Home</a><br>
    <a href="../atribuicoesGerente.php">Pagina anterior</a><br>

    <a href="../CrudLivros/CadastrarLivro.php">Cadastrar Novo Livro</a><br>
    <a href="../CrudLivros/AlterarLivro.php">Alterar Livros</a><br>
    <a href="../CrudLivros/ListarLivros.php">Exibir Livros</a><br>
    <a href="../CrudLivros/RemoverLivros.php">Remover Livros</a><br>

    <a href="./CadastrarCliente.php">Cadastrar Novo Cliente</a><br>
    <a href="./AlterarCliente.php">Alterar Cliente</a><br>
    <a href="./RemoverCliente.php">Remover Cliente</a><br>

    <a href="CadastrarFuncionario.php">Cadastrar Novo Funcionário</a><br>
    <a href="AlterarFuncionario.php">Alterar Funcionário</a><br>
    <a href="RemoverFuncionario.php">Excluir Funcionário</a><br>
    <a href="BuscarFuncionario.php">Buscar Funcionário</a><br>

    <h2><a href="../logout.php">Sair</a></h2>
</body>

</html>