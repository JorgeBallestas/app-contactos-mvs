<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}
require_once __DIR__ . '/../../controllers/ContactController.php';

if (isset($_GET['id'])) {
    $contactCtrl = new ContactController();
    $contactCtrl->delete($_GET['id']);
}
header("Location: index.php");
exit;
