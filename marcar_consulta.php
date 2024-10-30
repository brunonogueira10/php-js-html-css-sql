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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id']; 
    } else {
        die("Erro: ID do usuário não encontrado na sessão.");
    }

    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $mensagem = "";

    $observacoes = isset($_POST['observacoes']) ? mysqli_real_escape_string($conn, $_POST['observacoes']) : '';

   
    $sql_insert = "INSERT INTO consultas (user_id, data, horario, observacoes) VALUES ('$user_id', '$data', '$horario', '$observacoes')";

    if ($conn->query($sql_insert) === TRUE) {
        $mensagem = "Consulta marcada com sucesso!";
    } else {
        $mensagem = "Erro ao marcar consulta: " . $conn->error;
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
    <title>Marcar Consulta</title>
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    padding: 20px;
    flex-direction: column;
}

h3 {
    font-size: 2rem;
    color: #3498db;
    text-align: center;
    margin-bottom: 1.5rem;
    text-transform: uppercase;
}

.mensagem-sucesso {
    background-color: #d4edda;
    color: #155724;
    padding: 1rem;
    border: 1px solid #c3e6cb;
    border-radius: 5px;
    width: 100%;
    max-width: 500px;
    text-align: center;
    font-weight: bold;
    margin-bottom: 1.5rem;
}

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

input[type="date"],
input[type="time"],
textarea {
    width: 100%;
    padding: 0.8rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 1rem;
    transition: border-color 0.3s ease;
}

input[type="date"]:focus,
input[type="time"]:focus,
textarea:focus {
    border-color: #3498db;
    outline: none;
}

textarea {
    resize: none;
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
    margin-top: 1rem;
    transition: background-color 0.3s ease;
}

.new-botao-submit:hover {
    background-color: #1f3a93;
}

p {
    text-align: center;
    margin-top: 1rem;
    color: #555;
    font-size: 1rem;
}

p a {
    color: #3498db;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

p a:hover {
    color: #1f3a93;
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

    .mensagem-sucesso {
        font-size: 0.9rem;
    }
}

    </style>
</head>
<body>
      <?php if (!empty($mensagem)) : ?>
        <div class="mensagem-sucesso">
            <?php echo $mensagem; ?>
        </div>
    <?php endif; ?>
    <form method="POST" action="">
        <h3>Marcar Outra Consulta</h3>
        <label for="data">Data da Consulta:</label>
        <input type="date" id="data" name="data" required><br><br>

        <label for="horario">Hora da Consulta:</label>
        <input type="time" id="horario" name="horario" required><br><br>

        <label for="observacoes">Observações:</label>
        <textarea id="observacoes" name="observacoes" rows="4" cols="50" placeholder="Digite suas observações"></textarea><br><br>

        <input type="submit" value="Marcar Consulta" class="new-botao-submit">
        <p>Já marcou sua consulta? <a href="user_page.php">Volte Aqui</a></p>
    </form>
</body>
</html>
