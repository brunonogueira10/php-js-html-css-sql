<?php
@include 'config.php';

$sql = "SELECT * FROM projetos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfólio</title>
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
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

h3 {
    font-size: 28px;
    text-align: center;
    color: #007BFF;
    margin-bottom: 30px;
}

.projetos-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

.projeto {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
}

.projeto:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.projeto img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 15px;
}

.projeto h4 {
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
}


.projeto p {
    font-size: 16px;
    color: #555;
    margin-bottom: 10px;
}

.projeto p strong {
    color: #007BFF;
}

@media (max-width: 768px) {
    .projetos-container {
        grid-template-columns: 1fr;
    }

    h3 {
        font-size: 24px;
    }
}

@media (max-width: 480px) {
    .projeto h4 {
        font-size: 20px;
    }

    .projeto p {
        font-size: 14px;
    }

    h3 {
        font-size: 22px;
    }
}

    </style>
</head>
<body>

<h3>Portfólio de Projetos</h3>

<div class="projetos-container">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='projeto'>";
            echo "<img src='" . $row['foto'] . "' alt='Imagem do Projeto'>";
            echo "<h4>" . $row['nome_projeto'] . "</h4>";
            echo "<p><strong>Tecnologia:</strong> " . $row['tecnologia'] . "</p>";
            echo "<p><strong>Descrição:</strong> " . $row['descricao'] . "</p>";
            echo "<p><strong>Data de Conclusão:</strong> " . $row['data_conclusao'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Nenhum projeto encontrado.</p>";
    }
    ?>
</div>

</body>
</html>