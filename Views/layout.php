<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestor de Contactos</title>
    <link rel="stylesheet" href="/public/style.css">
</head>
<body>
    <header>
        <h1>Gestor de Contactos</h1>
        <?php if (isset($_SESSION['username'])): ?>
            <nav>
                <a href="/views/contacts/index.php">Contactos</a>
                <a href="/views/contacts/create.php">Nuevo</a>
                <a href="/controllers/AuthController.php?logout=1">Salir</a>
            </nav>
        <?php endif; ?>
    </header>

    <div class="container">