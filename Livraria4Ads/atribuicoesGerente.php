<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Atribuiçoes do gerente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="CSS/jumbotron.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Perfil Gerencial da Biblioteca</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
            </ul>
        </div>
    </nav>

    <main role="main">

        <!-- Principal jumbotron, para a principal mensagem de marketing ou call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Olá, <?php echo $_SESSION['usuario']; ?>, você é um <?php echo $_SESSION['descricao_nivel']; ?>(a)</h1>
                <p>Nesse perfil, você tem acesso a todas as funcionalidades do sistema.</p>
            </div>
        </div>

        <div class="container">
            <!-- Exemplo de linha de colunas -->
            <div class="row">
                <div class="col-md-4">
                    <h2>Cadastrar Novo Livro</h2>
                    <p>Realiza o cadastro de um novo livro no sistema.</p>
                    <p><a class="btn btn-secondary" href="./CrudLivros/CadastrarLivro.php" role="button">Cadstrar Livro &raquo;</a></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h2>Alterar dados de um livro</h2>
                    <p>Realiza a alteração de um livro no sistema.</p>
                    <p><a class="btn btn-secondary" href="./CrudLivros/AlterarLivro.php" role="button">Alterar Livros &raquo;</a></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h2>Excluir Livros</h2>
                    <p>Realiza a exclusão de um livro no sistema.</p>
                    <p><a class="btn btn-secondary" href="./CrudLivros/RemoverLivros.php" role="button">Excluir Livros &raquo;</a></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h2>Cadastrar Novo Cliente</h2>
                    <p>Realiza o cadastro de um novo cliente no sistema.</p>
                    <p><a class="btn btn-secondary" href="./CrudClientes/CadastrarCliente.php" role="button">Cadastrar Novo Cliente &raquo;</a></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h2>Remover Cliente</h2>
                    <p>Realiza a exclusão dos dados de um cliente no sistema.</p>
                    <p><a class="btn btn-secondary" href="./CrudClientes/RemoverCliente.php" role="button">Remover Cliente &raquo;</a></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h2>Alterar Cliente</h2>
                    <p>Realiza a alteração dos dados de um cliente no sistema.</p>
                    <p><a class="btn btn-secondary" href="./CrudClientes/AlterarCliente.php" role="button">Alterar dados do cliente &raquo;</a></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h2>Buscar Cliente</h2>
                    <p>Exibe os dados de um cliente no sistema.</p>
                    <p><a class="btn btn-secondary" href="./CrudClientes/ListarCliente.php" role="button">Buscar Cliente &raquo;</a></p>
                </div>
            </div>

            <!--
            <a href="CadastrarFuncionario.php">Cadastrar Novo Funcionário</a><br>
            <a href="AlterarFuncionario.php">Alterar Funcionário</a><br>
            <a href="RemoverFuncionario.php">Excluir Funcionário</a><br>
            <a href="BuscarFuncionario.php">Buscar Funcionário</a><br> -->

            <h2><a href="logout.php">Sair</a></h2>
            <hr>

        </div> <!-- /container -->

    </main>

    <footer class="container">
        <p>&copy; Companhia 1995-2021</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
</body>

</html>