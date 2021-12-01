<?php
session_start();
ob_start();
include_once '../postgres_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cod_cliente = $_POST["cod_cliente"];
    $nome = $_POST["nomeCliente"];
    $tel = $_POST["telResidencial"];
    $cel = $_POST["numCel"];
    $cpf = $_POST["numCpf"];
    $residencia = $_POST["residencia"];
    $email = $_POST["email"];

    $stmt = $dbconn->prepare('UPDATE tb_cliente SET nome=:nomeCliente, telefone=:telResidencial, celular=:numCel, cpf=:numCpf, endereco=:residencia, email=:email WHERE cod_cliente = :cod_cliente');
    $stmt->execute(array(
        ':cod_cliente'   => $cod_cliente,
        ':nomeCliente' => $nome,
        ':telResidencial' => $tel,
        ':numCel' => $cel,
        ':numCpf' => $cpf,
        ':residencia' => $residencia,
        ':email' => $email,
    ));
    if ($stmt->rowCount() > 0) {
        echo "<p style=color:green;> Cliente editado com sucesso!  </p>";
    } else {
        echo "<p style=color:red;> Cliente não editado com sucesso!  </p>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Alterar Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div class="container" style="background-color: gray;  width: 550px; height: 500px;">
        <h1>Alterar Livro</h1>

        <form name="AlterarCliente" method="POST" action="">

            <label>Código do cliente: </label>
            <input type="number" name="cod_cliente" id="cod_cliente" placeholder="Código do Cliente"><br><br>

            <label>Nome do cliente: </label>
            <input type="text" name="nomeCliente" id="nomeCliente" placeholder="Nome do Cliente"><br><br>

            <label>Telefone do cliente: </label>
            <input type="text" name="telResidencial" id="telResidencial" placeholder="Telefone Residencial"><br><br>

            <label>Número de celular do cliente: </label>
            <input type="text" name="numCel" id="numCel" placeholder="Número de celular"><br><br>

            <label>Cpf: </label>
            <input type="text" name="numCpf" id="numCpf" placeholder="Cpf"><br><br>

            <label>Endereço do cliente: </label>
            <input type="text" name="residencia" id="residencia" placeholder="Endereço da residência"><br><br>

            <label>Endereço de email do cliente: </label>
            <input type="email" name="email" id="email" placeholder="Email do cliente"><br><br>

            <input type="submit" value="AlterarCliente" name="AlterarCliente" class="btn btn-success"><br><br>
        </form>
    </div>
    <a href="../index.php">Home</a><br>
    <a href="../atribuicoesGerente.php">Pagina anterior</a><br>

    <a href="../CrudLivros/CadastrarLivro.php">Cadastrar Novo Livro</a><br>
    <a href="../CrudLivros/RemoverLivros.php">Excluir Livros</a><br>
    <a href="../CrudLivros/ListarLivros.php">Exibir Livros</a><br>
    <a href="../CrudLivros/AlterarLivro.php">Alterar Livro</a><br>


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