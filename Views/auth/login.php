<?php
session_start();
require_once __DIR__ . '/../../controllers/AuthController.php';

$auth = new AuthController();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($auth->login($_POST['username'], $_POST['password'])) {
        header("Location: ../contacts/index.php");
        exit;
    } else {
        $message = "Usuario o contraseña incorrectos.";
    }
}
?>
<?php include("../layout.php"); ?>

<h2>Iniciar Sesión</h2>
<?php if ($message): ?><p><?= $message ?></p><?php endif; ?>

<form method="POST">
    <label>Usuario</label>
    <input type="text" name="username" required>

    <label>Contraseña</label>
    <input type="password" name="password" required>

    <button type="submit">Entrar</button>
</form>

<p><a href="register.php">Registrarse</a></p>

</div></body></html>
