<?php require 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <script type="text/javascript" src="assets/javascript/jquery-3.5.0.min.js"></script>
    <script type="text/javascript" src="assets/javascript/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/javascript/script.js"></script>
    <title>Classificados</title>
</head>

<body>
    <nav class="navbar bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="./" class="navbar-brand">Classificados</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['cLogin']) && empty($_SESSION['cLogin']) == false): ?>
                    <li><a href="meus-anuncios.php">Meus anúncios</a></li>
                    <li><a href="sair.php">Sair</a></li>
                <?php else: ?>
                    <li><a href="cadastre-se.php">Cadastre-se</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>