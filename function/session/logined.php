<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: index.php"); // Redirect ke halaman index jika sudah login
    exit();
}
?>