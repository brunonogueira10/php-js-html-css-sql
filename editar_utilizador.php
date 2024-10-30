<?php

@include 'config.php';

session_start();


if (!isset($_SESSION['admin_name'])) {
    header('location:login_form.php');
    exit;  
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

   
    $stmt = $conn->prepare("SELECT name, apelido, email, user_type FROM utilizadores WHERE id = ?");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->bind_result($name, $apelido, $email, $user_type);
    $stmt->fetch();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['id'];
    $name = $_POST['name'];
    $apelido = $_POST['apelido'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];

    
    $stmt = $conn->prepare("UPDATE utilizadores SET name = ?, apelido = ?, email = ?, user_type = ? WHERE id = ?");
    $stmt->bind_param('ssssi', $name, $apelido, $email, $user_type, $user_id);
    
    if ($stmt->execute()) {
        echo "Dados atualizados com sucesso!";
        header("Location: admin_page.php");
        exit;
    } else {
        echo "Erro ao atualizar os dados.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição Utilizador</title>
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f0f4f8;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    padding: 20px;
}

h2 {
    font-size: 2rem;
    color: #3498db;
    text-align: center;
    margin-bottom: 1.5rem;
}

/* Estilo do formulário */
form {
    background-color: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    width: 100%;
}

label {
    display: block;
    font-weight: bold;
    color: #1f3a93;
    margin-bottom: 0.5rem;
}

input[type="text"],
input[type="email"],
select {
    width: 100%;
    padding: 0.8rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 1rem;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="email"]:focus,
select:focus {
    border-color: #3498db;
    outline: none;
}

/* Botão de submit */
button[type="submit"] {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 0.8rem;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #1f3a93;
}

/* Responsividade */
@media (max-width: 768px) {
    form {
        padding: 1.5rem;
    }

    h2 {
        font-size: 1.5rem;
    }

    button[type="submit"] {
        font-size: 0.9rem;
    }
}

    </style>
</head>
<body>
    <form method="POST" action="editar_utilizador.php">
        <input type="hidden" name="id" value="<?= $user_id ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="name" name="name" value="<?= $name?>" required><br>
        <label for="apelido">Apelido:</label>
        <input type="text" id="apelido" name="apelido" value="<?= $apelido?>" required><br>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="<?= $email?>" required><br>
        <label for="user_type">Função:</label>
        <select id="user_type" name="user_type">
            <option value="user" <?= ($user_type == 'user') ? 'selected' : '' ?>>Usuário</option>
            <option value="admin" <?= ($user_type == 'admin') ? 'selected' : '' ?>>Administrador</option>
        </select><br>
        <button type="submit">Atualizar Utilizador</button>
    </form>
</body>
</html>
