<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php if(isset($_SESSION['usuario_id'])): ?>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Painel Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="categorias.php">Categorias</a></li>
                <li class="nav-item"><a class="nav-link" href="produtos.php">Produtos</a></li>
            </ul>
            <a href="logout.php" class="btn btn-outline-light btn-sm mt-2 mt-lg-0">Sair do Sistema</a>
        </div>
    </div>
</nav>
<?php endif; ?>

<div class="container">