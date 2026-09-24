<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['selected_food']) && !empty($_POST['selected_food'])) {
        $_SESSION['selected_foods'] = $_POST['selected_food'];
    } else {
        $_SESSION['selected_foods'] = [];
    }
    header("Location: ../views/dashboard.php");
    exit();
}
?>