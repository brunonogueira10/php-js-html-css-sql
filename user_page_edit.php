<?php
@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}


$conn = mysqli_connect('localhost','root','','user_db');
if ($conn->connect_error) {
die("Conexão falhou: " . $conn->connect_error)
;}



    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM utilizadores WHERE id = '$user_id'";
    $result = mysqli_query($conn, $query);
    $user_data = mysqli_fetch_assoc($result);
    $mensagem = "";



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_id = $_SESSION['user_id'];
        $name = $_POST['name'];
        $apelido = $_POST['apelido'];
        $email = $_POST['email'];
    
        
        $sql_update = "UPDATE utilizadores SET name = '$name', apelido = '$apelido', email = '$email' WHERE id = '$user_id'";
    
        if ($conn->query($sql_update) === TRUE) {
            $mensagem = "Dados atualizados com sucesso!";
        } else {
            $mensagem = "Erro ao atualizar dados: " . $conn->error;
        }
    }
    
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Dados</title>
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
    line-height: 1.6;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.mensagem-sucesso {
    background-color: #d4edda;
    color: #155724;
    padding: 1rem;
    border: 1px solid #c3e6cb;
    border-radius: 5px;
    text-align: center;
    font-weight: bold;
    margin-bottom: 1rem;
}

h2 {
    text-align: center;
    font-size: 2rem;
    color: #3498db;
    margin-bottom: 1.5rem;
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
    margin-bottom: 0.5rem;
    color: #1f3a93;
}

input[type="text"],
input[type="email"] {
    width: 100%;
    padding: 0.8rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 1rem;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="email"]:focus {
    border-color: #3498db;
    outline: none;
}

button {
    width: 100%;
    padding: 0.8rem;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 1rem;
}

button:hover {
    background-color: #1f3a93;
}

a {
    display: inline-block;
    margin-top: 1rem;
    text-decoration: none;
    font-size: 1rem;
    color: #3498db;
    transition: color 0.3s ease;
    margin-right: 10px;
}

a:hover {
    color: #1f3a93;
}

@media (max-width: 768px) {
    form {
        padding: 1.5rem;
    }

    h2 {
        font-size: 1.5rem;
    }

    button {
        font-size: 0.9rem;
    }

    a {
        font-size: 0.9rem;
    }
}
</style>
    </head>
    <body>
        <form action="" method="post">
        <?php if (!empty($mensagem)) : ?>
            <div class="mensagem-sucesso"><?php echo $mensagem; ?></div>
        <?php endif; ?>
        <h2>Editar Dados</h2>
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required value="<?php echo $user_data['name']; ?>">
            <br>
            <label for="apelido">Apelido:</label>
            <input type="text" id="apelido" name="apelido" required value="<?php echo $user_data['apelido']; ?>">
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="<?php echo $user_data['email']; ?>">
            <br>
            <button type="submit">Atualizar</button>
            <br>
            <a href="logout.php">Logout</a>
            <a href="user_page.php">Voltar</a>
        </form>
        
    </body>
    </html>