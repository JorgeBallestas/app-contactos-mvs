<?php
session_start();
require_once __DIR__ . '/../../controllers/AuthController.php';

$auth = new AuthController();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($auth->register($_POST['username'], $_POST['password'])) {
        header("Location: login.php");
        exit;
    } else {
        $message = "Error al registrar usuario.";
    }
}
?>
<?php include("../layout.php"); ?>

<h2>Registro</h2>
<?php if ($message): ?><p><?= $message ?></p><?php endif; ?>

<form method="POST">
    <label>Usuario</label>
    <input type="text" name="username" required>

    <label>Contraseña</label>
    <input type="password" name="password" required>

    <button type="submit">Registrar</button>
</form>

<p><a href="login.php">Volver al login</a></p>

</div></body></html>
