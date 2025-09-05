<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}
require_once __DIR__ . '/../../controllers/ContactController.php';

$contactCtrl = new ContactController();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($contactCtrl->create($_SESSION['user_id'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['notes'])) {
        header("Location: index.php");
        exit;
    } else {
        $message = "Error al guardar contacto.";
    }
}
?>
<?php include("../layout.php"); ?>

<h2>Nuevo Contacto</h2>
<?php if ($message): ?><p><?= $message ?></p><?php endif; ?>

<form method="POST">
    <label>Nombre</label>
    <input type="text" name="name" required>

    <label>Email</label>
    <input type="email" name="email">

    <label>Teléfono</label>
    <input type="text" name="phone">

    <label>Notas</label>
    <textarea name="notes"></textarea>

    <button type="submit">Guardar</button>
</form>

</div></body></html>
