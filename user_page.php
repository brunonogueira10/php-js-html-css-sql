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

?>

<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Página Utilizador</title>
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/1c3789949c.js" crossorigin="anonymous"></script>


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
}

header {
    background-color: #1f3a93;
    padding: 1rem 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

header nav ul {
    list-style: none;
    display: flex;
    justify-content: center;
    gap: 20px;
}

header nav ul li a {
    color: white;
    font-size: 1.2rem;
    text-decoration: none;
    padding: 10px;
    transition: color 0.3s ease;
}

header nav ul li a:hover {
    color: #3498db;
}

.container {
    max-width: 1100px;
    margin: 2rem auto;
    padding: 2rem;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.content {
    text-align: center;
    margin-bottom: 2rem;
}

h1 {
    font-size: 2.5rem;
    color: #1f3a93;
    margin-bottom: 1rem;
}

h1 span {
    color: #3498db;
}

p {
    font-size: 1.2rem;
    margin-bottom: 1.5rem;
    color: #555;
}

.btn {
    background-color: #3498db;
    color: white;
    padding: 0.8rem 1.5rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s ease;
    display: inline-block;
    text-decoration: none;
}

.btn:hover {
    background-color: #1f3a93;
}

h2 {
    text-align: center;
    font-size: 2rem;
    color: #3498db;
    margin-bottom: 1.5rem;
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

form {
    margin-bottom: 2rem;
    max-width: 600px; 
    margin-left: auto;
    margin-right: auto;
}

form label {
    font-weight: bold;
    margin-bottom: 0.5rem;
    display: block;
    color: #1f3a93;
}

form input[type="text"],
form input[type="email"],
form input[type="date"],
form input[type="time"],
form textarea {
    width: 100%;
    padding: 0.8rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 1rem;
    transition: border-color 0.3s ease;
}

form input[type="text"]:focus,
form input[type="email"]:focus,
form input[type="date"]:focus,
form input[type="time"]:focus,
form textarea:focus {
    border-color: #3498db;
    outline: none;
}

form input[type="submit"],
.new-botao-submit {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 0.7rem 1.5rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
    border-radius: 5px;
    display: block;
    width: 100%;
    margin-top: 1rem;
}

form input[type="submit"]:hover,
.new-botao-submit:hover {
    background-color: #1f3a93;
}


a[href="user_page_edit.php"] {
    display: inline-block;
    background-color: #3498db;
    color: white;
    padding: 0.6rem 1.2rem;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s ease, color 0.3s ease;
}

a[href="user_page_edit.php"]:hover {
    background-color: #1f3a93;
    color: #ffffff;
}


h3 {
    text-align: center;
    margin-top: 2rem;
    font-size: 1.8rem;
    color: #1f3a93;
}


.user-table {
    width: 100%;
    max-width: 1000px; 
    border-collapse: collapse;
    border-radius: 5px;
    overflow: hidden;
    margin: 0 auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.user-table th,
.user-table td {
    padding: 1rem;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.user-table th {
    background-color: #1f3a93;
    color: white;
    text-transform: uppercase;
}

.user-table td {
    background-color: #ecf0f1;
}

.user-table a {
    color: #3498db;
    text-decoration: none;
    transition: color 0.3s ease;
}

.user-table a:hover {
    color: #1f3a93;
}

#map {
    width: 100%;
    max-width: 800px;
    height: 400px;
    border-radius: 10px;
    margin: 0 auto 2rem auto; 
}

#company-info {
    margin-top: 2rem;
    padding: 1.5rem;
    background-color: #ecf0f1;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    max-width: 800px; 
    margin-left: auto;
    margin-right: auto;
}

#company-info p {
    font-size: 1.1rem;
    color: #1f3a93;
}

footer {
    background-color: #1f3a93;
    color: white;
    padding: 1.5rem 0;
    text-align: center;
    box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
}

footer p {
    margin-bottom: 10px;
    color: white;
}

footer .icon_footer {
    margin: 0 10px;
    color: white;
    font-size: 1.5rem;
    transition: color 0.3s ease;
}

footer .icon_footer:hover {
    color: #3498db;
}

/* Responsividade */
@media (max-width: 768px) {
    header nav ul {
        flex-direction: column;
        text-align: center;
    }

    .container {
        padding: 1rem;
    }

    .user-table th, .user-table td {
        padding: 0.5rem;
    }

    form {
        max-width: 100%; /* No mobile, o formulário usa 100% da largura */
    }

    #map {
        max-width: 100%; /* No mobile, o mapa usa 100% da largura */
    }

    #company-info {
        max-width: 100%; /* No mobile, a informação da empresa usa 100% da largura */
    }
}

   </style>
</head>
<body>
   

<header id="navbar">
        <nav>
            <ul>
                <li><a href="home.php"><i class="fa-solid fa-house"></i>Home</a></li>
                <li><a href="portfolio.php"><i class="fa-regular fa-address-book"></i>Portfolio</a></li>
                <li><a href="#marcar-consulta"><i class="fa-solid fa-money-check-dollar"></i>Consultas</a></li>
                <li><a href="#contact"><i class="fa-solid fa-mobile-retro"></i>Contacto</a></li>
            </ul>
        </nav>
</header>




<div class="container">

   <div class="content">
      <h1>Bem Vindo, <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>Essa é a página de Utilizador </p>
      <a href="logout.php" class="btn">Logout</a>
   </div>
</div>

<h3>Os teus Dados:</h3>
<?php
    // Obter os dados do usuário logado
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM utilizadores WHERE id = '$user_id'";
    $result = mysqli_query($conn, $query);
    $user_data = mysqli_fetch_assoc($result);



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obter os dados do usuário logado
        $user_id = $_SESSION['user_id'];
        $name = $_POST['name'];
        $apelido = $_POST['apelido'];
        $email = $_POST['email'];
    
        // Atualizar os dados do usuário no banco de dados
        $sql_update = "UPDATE utilizadores SET name = '$name', apelido = '$apelido', email = '$email' WHERE id = '$user_id'";
    
        if ($conn->query($sql_update) === TRUE) {
            echo "<p>Dados atualizados com sucesso!</p>";
        } else {
            echo "<p>Erro ao atualizar dados: " . $conn->error . "</p>";
        }
    }
?>
    
    <form action="" method="post">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" disabled value="<?php echo $user_data['name']; ?>">
        <br>
        <label for="apelido">Apelido:</label>
        <input type="text" id="apelido" name="apelido" disabled value="<?php echo $user_data['apelido']; ?>">
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" disabled value="<?php echo $user_data['email']; ?>">
        <br>
        <a href="user_page_edit.php">Editar Dados</a>
    </form>


    <div id="contact">
        <h2>Entre em contacto:</h2>
        <div id="map" style="width: 100%; height: 400px;"></div>
        <div id="company-info">
            <p><strong>Empresa :</strong> John Doe Corporation</p>
            <p><strong>Address:</strong> 1234 John Street, Porto, Portugal</p>
            <p><strong>Phone:</strong> +351 123 456 789</p>
            <p><strong>Email:</strong> contact@example.com</p>
        </div>
    </div>

<h3 id="marcar-consulta">Marcar Consulta</h3>
    <form method="POST" action="marcar_consulta.php">
        <label for="data">Data da Consulta:</label>
        <input type="date" id="data" name="data" required><br><br>
        
        <label for="horario">Hora da Consulta:</label>
        <input type="time" id="horario" name="horario" required><br><br>
        <label for="observacoes">Observações:</label>
        <textarea id="observacoes" name="observacoes" rows="4" cols="50" placeholder="Digite suas observações"></textarea><br><br>
        

        <input type="submit" value="Marcar Consulta" class="new-botao-submit">
    </form>



<h3>Consultas Agendadas (Só é permitido editar a consulta antes de 72 horas)</h3>

<table class="user-table">
    <thead>
        <tr>
            <th>Data</th>
            <th>Hora</th>
            <th>Observações</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

        
            $sql = "SELECT id, data, horario, observacoes FROM consultas WHERE user_id = '$user_id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $consulta_id = $row['id'];
                    $data = $row['data'];
                    $horario = $row['horario'];
                    $observacoes = $row['observacoes'];

                    
                    $data_consulta = strtotime($data);
                    $data_atual = time();
                    $diferenca_horas = ($data_consulta - $data_atual) / 3600;

                    echo "<tr>";
                    echo "<td>$data</td>";
                    echo "<td>$horario</td>";
                    echo "<td>$observacoes</td>";
                    echo "<td>";

                    
                    if ($diferenca_horas > 72) {
                        echo "<a href='editar_consulta.php?id=$consulta_id'>Editar</a> | ";
                    }
                    echo "<a href='excluir_consulta.php?id=$consulta_id'>Excluir</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nenhuma consulta agendada.</td></tr>";
            }
        } else {
            echo "<p>Erro: ID do usuário não encontrado na sessão.</p>";
        }

        $conn->close();

        ?>
    </tbody>
</table>





    <footer>
        <p>&copy; 2024 Exemplo empresa</p>
        <a class="icon_footer" href="https://www.instagram.com/" target="_blank"><i
                class="fa-brands fa-instagram"></i></a>
        <a class="icon_footer" href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a>
        <a class="icon_footer" href="https://www.facebook.com/" target="_blank"><i
                class="fa-brands fa-facebook"></i></a>
    </footer>

    <script src="script.js"></script>

</body>
</html>