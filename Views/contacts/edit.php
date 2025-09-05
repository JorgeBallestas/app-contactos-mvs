<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}
require_once __DIR__ . '/../../controllers/ContactController.php';

$contactCtrl = new ContactController();
$message = "";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$contact = $contactCtrl->getOne($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($contactCtrl->update($_GET['id'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['notes'])) {
        header("Location: index.php");
        exit;
    } else {
        $message = "Error al actualizar contacto.";
    }
}
?>
<?php include("../layout.php"); ?>

<h2>Editar Contacto</h2>
<?php if ($message): ?><p><?= $message ?></p><?php endif; ?>

<form method="POST">
    <label>Nombre</label>
    <input type="text" name="name" value="<?= htmlspecialchars($contact['name']) ?>" required>

    <label>Email</label>
    <input type="email" name="email" value="<?= htmlspecialchars($contact['email']) ?>">

    <label>Teléfono</label>
    <input type="text" name="phone" value="<?= htmlspecialchars($contact['phone']) ?>">

    <label>Notas</label>
    <textarea name="notes"><?= htmlspecialchars($contact['notes']) ?></textarea>

    <button type="submit">Actualizar</button>
</form>

</div></body></html>
