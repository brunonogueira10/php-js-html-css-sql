<?php
@include 'config.php';

if (isset($_GET['id'])) {
    $noticia_id = $_GET['id'];

    $sql = "SELECT titulo, conteudo, data_publicacao, imagem FROM noticias WHERE id = '$noticia_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $noticia = $result->fetch_assoc();
    } else {
        echo "<p>Notícia não encontrada.</p>";
        exit();
    }
} else {
    echo "<p>ID da notícia não fornecido.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $noticia['titulo']; ?></title>
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
    max-width: 800px;
    margin: 0 auto;
}

h2 {
    font-size: 32px;
    margin-bottom: 10px;
    color: #007BFF;
}

p small {
    font-size: 14px;
    color: #777;
    display: block;
    margin-bottom: 20px;
}

img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}


p {
    font-size: 18px;
    color: #555;
    line-height: 1.8;
    margin-bottom: 20px;
}

@media (max-width: 768px) {
    body {
        padding: 15px;
        font-size: 16px;
    }

    h2 {
        font-size: 28px;
    }

    p {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    h2 {
        font-size: 24px;
    }

    p {
        font-size: 14px;
    }
}

    </style>
</head>
<body>

<h2><?php echo $noticia['titulo']; ?></h2>
<p><small>Data: <?php echo $noticia['data_publicacao']; ?></small></p>

<?php
if (!empty($noticia['imagem'])) {
    echo "<img src='" . $noticia['imagem'] . "' alt='Imagem da notícia' />";
}
?>

<p><?php echo $noticia['conteudo']; ?></p>

</body>
</html>
