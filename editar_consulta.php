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

   
    $sql = "SELECT data, horario FROM consultas WHERE id = '$consulta_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $data = $row['data'];
        $horario = $row['horario'];
    } else {
        echo "<p>Consulta não encontrada.</p>";
        exit();
    }
} else {
    echo "<p>ID da consulta não fornecido.</p>";
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nova_data = $_POST['data'];
    $novo_horario = $_POST['horario'];

    $sql_update = "UPDATE consultas SET data = '$nova_data', horario = '$novo_horario' WHERE id = '$consulta_id'";

    if ($conn->query($sql_update) === TRUE) {
        echo "<p>Consulta atualizada com sucesso!</p>";
        header('Location: user_page.php'); 
    } else {
        echo "<p>Erro ao atualizar consulta: " . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Consulta</title>
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

h3 {
    font-size: 2rem;
    color: #3498db;
    text-align: center;
    margin-bottom: 1.5rem;
    text-transform: uppercase;
}


form {
    background-color: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

label {
    display: block;
    font-weight: bold;
    color: #1f3a93;
    margin-bottom: 0.5rem;
}

input[type="date"],
input[type="time"] {
    width: 100%;
    padding: 0.8rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 1rem;
    transition: border-color 0.3s ease;
}

input[type="date"]:focus,
input[type="time"]:focus {
    border-color: #3498db;
    outline: none;
}


.new-botao-submit {
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

.new-botao-submit:hover {
    background-color: #1f3a93;
}


.mensagem {
    background-color: #d4edda;
    color: #155724;
    padding: 1rem;
    border: 1px solid #c3e6cb;
    border-radius: 5px;
    text-align: center;
    font-weight: bold;
    margin-bottom: 1.5rem;
}

.mensagem.erro {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}


@media (max-width: 768px) {
    form {
        padding: 1.5rem;
    }

    h3 {
        font-size: 1.5rem;
    }

    .new-botao-submit {
        font-size: 0.9rem;
    }
}

    </style>
</head>
<body>
    <form method="POST" action="">
        <h3>Editar Consulta</h3>
        <label for="data">Data da Consulta:</label>
        <input type="date" id="data" name="data" value="<?php echo $data; ?>" required><br><br>

        <label for="horario">Hora da Consulta:</label>
        <input type="time" id="horario" name="horario" value="<?php echo $horario; ?>" required><br><br>

        <input type="submit" value="Atualizar Consulta" class="new-botao-submit">
    </form>
</body>
</html>
