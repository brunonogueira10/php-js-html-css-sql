<?php

@include 'config.php';

session_start();


if (!isset($_SESSION['admin_name'])) {
    header('location:login_form.php');
    exit;
}


if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM utilizadores WHERE id = ?");
    $stmt->bind_param('i', $user_id);

    if ($stmt->execute()) {
        echo "Utilizador eliminado com sucesso!";
        header("Location: admin_page.php");
        exit;
    } else {
        echo "Erro ao eliminar o utilizador.";
    }

    $stmt->close();
} else {
    echo "Nenhum utilizador selecionado para eliminação.";
}
?>
