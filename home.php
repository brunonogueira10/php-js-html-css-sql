<?php
@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
    header('location:login_form.php');
}

$sql = "SELECT id, titulo, resumo, data_publicacao FROM noticias ORDER BY data_publicacao DESC LIMIT 5";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/1c3789949c.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f9;
    color: #333;
    line-height: 1.6;
}

header {
    background-color: #007BFF;
    padding: 20px;
}

header nav ul {
    list-style-type: none;
    display: flex;
    justify-content: center;
    gap: 20px;
}

header nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 18px;
}

header nav ul li a:hover {
    text-decoration: underline;
}

h2 {
    font-size: 28px;
    color: #007BFF;
    text-align: center;
    margin: 20px 0;
}

.noticias-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    margin: 20px auto;
    padding: 20px;
    max-width: 1200px;
}

.noticia-resumida {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 300px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.noticia-resumida:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
}

.noticia-resumida h3 {
    font-size: 22px;
    margin-bottom: 10px;
    color: #333;
}

.noticia-resumida p {
    color: #555;
    margin-bottom: 10px;
}

.noticia-resumida small {
    color: #999;
}

.noticia-resumida a {
    text-decoration: none;
    color: #007BFF;
    font-weight: bold;
}

.noticia-resumida a:hover {
    color: #0056b3;
}

#quote {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    max-width: 600px;
    margin: 40px auto;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

#quote h2 {
    color: #333;
    margin-bottom: 20px;
}

#quote label {
    font-size: 16px;
    color: #555;
}

#quote input[type="number"],
#quote select {
    width: 100%;
    padding: 10px;
    margin: 10px 0 20px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
}

#quote input[type="checkbox"] {
    margin-right: 10px;
}

#quote button {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#quote button:hover {
    background-color: #0056b3;
}

#contact-form {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    max-width: 600px;
    margin: 40px auto;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

#contact-form h3 {
    color: #333;
    margin-bottom: 20px;
}

#contact-form label {
    font-size: 16px;
    color: #555;
}

#contact-form input,
#contact-form textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0 20px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
}

#contact-form button {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#contact-form button:hover {
    background-color: #0056b3;
}

footer {
    background-color: #007BFF;
    color: white;
    text-align: center;
    padding: 20px 0;
}

footer p {
    margin-bottom: 10px;
}

.icon_footer {
    color: white;
    margin-right: 10px;
    font-size: 34px;
}

.icon_footer:hover {
    color: #ddd;
}

@media (max-width: 768px) {
    .noticias-container {
        flex-direction: column;
        align-items: center;
    }

    .noticia-resumida {
        width: 90%;
    }

    #quote, #contact-form {
        width: 90%;
    }
}
    </style>

</head>
<body>
    
<header>
        <nav>
            <ul>
                <li><a href="home.php"><i class="fa-solid fa-house"></i>-Home</a></li>
                <li><a href="portfolio.php"><i class="fa-regular fa-address-book"></i>-Portfolio</a></li>
                <li><a href="user_page.php"><i class="fa-solid fa-child-reaching"></i>-Perfil</a></li>
                <li><a href="admin_page.php"><i class="fa-solid fa-hammer"></i>-Administração</a></li>
            </ul>
        </nav>
    </header>


<h2>Últimas Notícias:</h2>

<div class="noticias-container">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='noticia-resumida'>";
            echo "<h3>" . $row['titulo'] . "</h3>";
            echo "<p>" . $row['resumo'] . "</p>";
            echo "<p><small>Data: " . $row['data_publicacao'] . "</small></p>";
            echo "<a href='noticia_completa.php?id=" . $row['id'] . "'>Leia mais</a>";
            echo "</div>";
        }
    } else {
        echo "<p>Nenhuma notícia encontrada.</p>";
    }
    ?>
</div>
     

<div id="quote">
    <form id="quote-form" oninput="calculateQuote()">
        <h2>Orçamento:</h2>
        <label for="pageType">Tipo de Página:</label>
        <select id="pageType" name="pageType" required>
            <option value="" disabled selected hidden>Escolha uma opção</option>
            <option value="basic">Basico - $500</option>
            <option value="advanced">Avançado - $1000</option>
            <option value="premium">Premium - $1500</option>
            <option value="custom">Personalizado - $2000</option>
        </select>
        <br>
        <label for="deliveryTime">Tempo de entrega em Meses:</label>
        <input type="number" id="deliveryTime" name="deliveryTime" min="1" required>
        <br>
        <label>Serviços adicionais:</label>
        <br>
        <label for="section1">Web-Page</label>
        <input type="checkbox" id="section1" name="sections" value="400">
        <br>
        <label for="section2">Blockchain</label>
        <input type="checkbox" id="section2" name="sections" value="700">
        <br>
        <label for="section3">Inteligência Artificial</label>
        <input type="checkbox" id="section3" name="sections" value="800">
        <br>
        <label for="finalQuote">Preço Final:</label>
        <input type="text" id="finalQuote" name="finalQuote" readonly>
        <br>
        <button type="submit">Enviar</button>
    </form>
</div>

<form id="contact-form">
    <h3>Deixe o seu Contacto:</h3>
    <label for="firstName">Primeiro Nome:</label>
    <input type="text" id="firstName" name="firstName" required>
    <br>
    <label for="lastName">Ultimo Nome:</label>
    <input type="text" id="lastName" name="lastName" required>
    <br>
    <label for="phone">Telemóvel:</label>
    <input type="tel" id="phone" name="phone" required pattern="+[0-9]{3}[0-9]{9}"
        placeholder="+351123456789">
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required placeholder="johndoe@gmail.com">
    <br>
    <label for="meetingDate">Data de nascimento:</label>
    <input type="date" id="meetingDate" name="meetingDate" required>
    <br>
    <label for="reason">Razão do contacto:</label>
    <textarea id="reason" name="reason" required
        placeholder="Entre em contacto"></textarea>
    <br>
    <button type="submit">Enviar</button>
</form>
    
    
    
<footer>
    <p>&copy; 2024 Exemplo empresa</p>
    <a class="icon_footer" href="https://www.instagram.com/" target="_blank"><i
            class="fa-brands fa-instagram"></i></a>
    <a class="icon_footer" href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a>
    <a class="icon_footer" href="https://www.facebook.com/" target="_blank"><i
            class="fa-brands fa-facebook"></i></a>
</footer>


    
</body>
</html>