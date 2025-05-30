<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Funcionários - CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="custom-navbar">
        <div class="container-navbar d-flex justify-content-between align-items-center">
            <span class="navbar-brand fw-bold">Funcionários</span>
            <div class="dropdown">
                <button class="dropbtn">Menu</button>
                <div class="dropdown-content">
                    <a href="index.php">Início</a>
                    <a href="cadastrar_funcionario.php">Cadastrar Funcionário</a>
                    <a href="consulta_funcionario.php">Consultar Funcionário</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card p-5 text-center">
                    <h1 class="mb-4">Bem-vindo ao Sistema de Funcionários</h1>
                    <p class="lead mb-4">Utilize o menu acima para cadastrar, consultar ou visualizar funcionários.</p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        Moises João Ferreira | TDESN - V3
    </footer>
</body>
</html>