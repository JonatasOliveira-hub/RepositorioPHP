<?php
include_once '../postgres_connection.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastrar novo livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div class="container" style="background-color: gray;  width: 550px; height: 420px;">
        <h1>Cadastrar Novo Cliente</h1>
        <?php
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($dados['CadastraCliente'])) {

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
                $sql = "INSERT INTO tb_cliente(nome, telefone, celular, cpf, endereco, email)
                        VALUES (:nomeCliente, :telefone, :celular, :cpf, :enderecoCli, :enderecoMail)";
                $cad_livro = $dbconn->prepare($sql);

                //atribuição dos parâmetros para o insert
                $cad_livro->bindParam(':nomeCliente', $dados['nomeCliente']);
                $cad_livro->bindParam(':telefone', $dados['telefone']);
                $cad_livro->bindParam(':celular', $dados['celular']);
                $cad_livro->bindParam(':cpf', $dados['cpf']);
                $cad_livro->bindParam(':enderecoCli', $dados['enderecoCli']);
                $cad_livro->bindParam(':enderecoMail', $dados['enderecoMail']);
                $cad_livro->execute();
                if ($cad_livro->rowCount()) {
                    echo "<p style=color:green;> Cliente cadastrado com sucesso  <br><br>";
                } else {
                    echo "<p style=color:red;> Cliente não cadastrado com sucesso! <br><br>";
                }
            }
        }
        ?>
        <form name="CadastraCliente" method="POST" action="">
            <label>Nome do cliente: </label>
            <input type="text" name="nomeCliente" id="nomeCliente" placeholder="Nome do Cliente"><br><br>

            <label>Número de telefone residencial do cliente: </label>
            <input type="number" name="telefone" id="telefone" placeholder="Número de telefone"><br><br>

            <label>Número de celular do cliente: </label>
            <input type="number" name="celular" id="celular" placeholder="Celular"><br><br>

            <label>Cpf do cliente: </label>
            <input type="text" name="cpf" id="cpf" placeholder="Cpf do cliente"><br><br>

            <label>Endereço do cliente: </label>
            <input type="text" name="enderecoCli" id="enderecoCli" placeholder="Código de barras"><br><br>
            
            <label>Email do cliente: </label>
            <input type="email" name="enderecoMail" id="enderecoMail" placeholder="E-mail"><br><br>

            <input type="submit" value="Cadastrar" name="CadastraCliente" class="btn btn-success"><br><br>

        </form><br><br>
    </div>
    <a href="../index.php">Home</a><br>
    <a href="../atribuicoesGerente.php">Pagina anterior</a><br>

    <a href="./AlterarLivro.php">Alterar Livros</a><br>
    <a href="./RemoverLivros.php">Excluir Livros</a><br>
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