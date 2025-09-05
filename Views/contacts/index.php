<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}
require_once __DIR__ . '/../../controllers/ContactController.php';

$contactCtrl = new ContactController();
$stmt = $contactCtrl->getAll($_SESSION['user_id']);
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../layout.php"); ?>

<h2>Mis Contactos</h2>

<?php if (count($contacts) == 0): ?>
    <p>No tienes contactos aún. <a href="create.php">Crear uno</a></p>
<?php else: ?>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Nombre</th><th>Email</th><th>Teléfono</th><th>Notas</th><th>Acciones</th>
        </tr>
        <?php foreach ($contacts as $c): ?>
        <tr>
            <td><?= htmlspecialchars($c['name']) ?></td>
            <td><?= htmlspecialchars($c['email']) ?></td>
            <td><?= htmlspecialchars($c['phone']) ?></td>
            <td><?= htmlspecialchars($c['notes']) ?></td>
            <td>
                <a href="edit.php?id=<?= $c['id'] ?>">Editar</a> |
                <a href="delete.php?id=<?= $c['id'] ?>" onclick="return confirm('¿Eliminar contacto?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

</div></body></html>
