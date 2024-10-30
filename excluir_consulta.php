<?php
@include 'config.php';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'user_db');
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $consulta_id = $_GET['id'];

    $sql_delete = "DELETE FROM consultas WHERE id = '$consulta_id'";

    if ($conn->query($sql_delete) === TRUE) {
        header('Location: user_page.php');
        exit();
    } else {
        echo "<p>Erro ao excluir consulta: " . $conn->error . "</p>";
    }
} else {
    echo "<p>ID da consulta não fornecido.</p>";
}

$conn->close();
?>
