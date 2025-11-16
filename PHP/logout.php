<?php
session_start();

if (isset($_SESSION['usuario'])) {
    session_unset();

    session_destroy();

    header("Location: ../html/index.php");
    exit;
}
?>