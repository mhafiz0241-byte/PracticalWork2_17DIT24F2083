<?php
session_start();
require_once '../config/conn.php';
require_once '../models/User.php';

$userModel = new User($conn);
$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($action === 'login') {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (empty($username) || empty($password)) {
            header("Location: ../views/auth/login.php?error=" . urlencode("Sila isi semua medan!"));
            exit();
        }

        $user = $userModel->login($username, $password);

        if ($user) {
            // Berjaya Log Masuk -> Cipta Session
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../views/menu.php");
            exit();
        } else {
            header("Location: ../views/auth/login.php?error=" . urlencode("Username atau password salah!"));
            exit();
        }
    } 

    elseif ($action === 'register') {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $confirm_password = trim($_POST['confirm_password']);

        if (empty($username) || empty($password) || empty($confirm_password)) {
            header("Location: ../views/auth/register.php?error=" . urlencode("Sila isi semua medan!"));
            exit();
        }

        if ($password !== $confirm_password) {
            header("Location: ../views/auth/register.php?error=" . urlencode("Password tidak padan!"));
            exit();
        }

        if ($userModel->isUsernameTaken($username)) {
            header("Location: ../views/auth/register.php?error=" . urlencode("Username telah wujud!"));
            exit();
        }

        if ($userModel->register($username, $password)) {
            header("Location: ../views/auth/login.php?success=" . urlencode("Pendaftaran berjaya! Sila log masuk."));
            exit();
        } else {
            header("Location: ../views/auth/register.php?error=" . urlencode("Gagal mendaftar akaun."));
            exit();
        }
    }
}
?>