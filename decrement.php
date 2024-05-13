<?php
require_once 'includes/database.php';

$id = $_GET['id'];

$db = new Database();
$db->decrementInstallments($id);

header('Location: index.php');
exit();
?>
