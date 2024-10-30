<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])) {
   header('location:login_form.php');
}

$query_utilizadores = "SELECT * FROM utilizadores ORDER BY id ASC";
$result_utilizadores = mysqli_query($conn, $query_utilizadores);


?>

<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Página Administrador</title>

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
    padding: 20px;
}


.container {
    max-width: 1100px;
    margin: 3rem auto;
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
    margin-bottom: 1.5rem;
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
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #1f3a93;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 2rem;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 1rem;
    text-align: left;
}

th {
    background-color: #1f3a93;
    color: white;
    text-transform: uppercase;
}

td {
    background-color: #f9f9f9;
}

td a {
    color: #3498db;
    text-decoration: none;
    transition: color 0.3s ease;
}

td a:hover {
    color: #1f3a93;
}

/* Estilização do h3 */
h3 {
    font-size: 2rem;
    color: #3498db;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 1.5rem;
    border-bottom: 2px solid #3498db;
    padding-bottom: 0.5rem;
}

/* Seção de formulários */
form {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: 0 auto 2rem auto;
}

label {
    font-weight: bold;
    margin-bottom: 0.5rem;
    display: block;
    color: #1f3a93;
}

input[type="text"],
input[type="email"],
input[type="date"],
input[type="file"],
textarea {
    width: 100%;
    padding: 0.8rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 1rem;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="date"]:focus,
textarea:focus {
    border-color: #3498db;
    outline: none;
}

input[type="submit"] {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 0.8rem 1.5rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
    border-radius: 5px;
    width: 100%;
    font-size: 1rem;
}

input[type="submit"]:hover {
    background-color: #1f3a93;
}

.projetos-admin-container,
.noticias-admin-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.projeto,
.noticia {
    background-color: white;
    padding: 1rem;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    flex: 1 1 calc(33.333% - 20px);
}

.projeto h4,
.noticia h4 {
    font-size: 1.5rem;
    color: #3498db;
    margin-bottom: 0.5rem;
}

.projeto p,
.noticia p {
    margin-bottom: 0.5rem;
    color: #555;
}

.projeto a,
.noticia a {
    color: #e74c3c;
    text-decoration: none;
    transition: color 0.3s ease;
}

.projeto a:hover,
.noticia a:hover {
    color: #c0392b;
}

@media (max-width: 768px) {
    .projeto,
    .noticia {
        flex: 1 1 100%;
    }

    form {
        max-width: 100%;
    }

    table, th, td {
        padding: 0.5rem;
    }
}


   </style>

</head>
<body>
   
   <div class="container">

      <div class="content">
         <h1>Bem-Vindo, <span><?php echo $_SESSION['admin_name'] ?></span></h1>
         <p>Essa é a página de Administração</p>
         <a href="logout.php" class="btn">Logout</a>
      </div>

   </div>



   <h1>Painel Administrativo</h1>


    <section>
        <h2>Gestão de Utilizadores</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Apelido</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            <?php while ($utilizador = mysqli_fetch_assoc($result_utilizadores)) : ?>
                <tr>
                    <td><?php echo $utilizador['id']; ?></td>
                    <td><?php echo $utilizador['name']; ?></td>
                    <td><?php echo $utilizador['apelido']; ?></td>
                    <td><?php echo $utilizador['email']; ?></td>
                    <td>
                        <a href="editar_utilizador.php?id=<?php echo $utilizador['id']; ?>">Editar</a> |
                        <a href="eliminar_utilizador.php?id=<?php echo $utilizador['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </section>

<?php

    
if (isset($_POST['add_projeto'])) {
    $nome_projeto = $_POST['nome_projeto'];
    $descricao = $_POST['descricao'];
    $tecnologia = $_POST['tecnologia'];
    $data_conclusao = $_POST['data_conclusao'];
    
    
    $foto = 'uploads/' . basename($_FILES['foto']['name']);
    move_uploaded_file($_FILES['foto']['tmp_name'], $foto);

   
    $sql_insert = "INSERT INTO projetos (nome_projeto, descricao, tecnologia, foto, data_conclusao) VALUES ('$nome_projeto', '$descricao', '$tecnologia', '$foto', '$data_conclusao')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "<p>Projeto adicionado com sucesso!</p>";
    } else {
        echo "<p>Erro ao adicionar projeto: " . $conn->error . "</p>";
    }
}


if (isset($_GET['delete_id'])) {
    $projeto_id = $_GET['delete_id'];
    $sql_delete = "DELETE FROM projetos WHERE id = '$projeto_id'";
    
    if ($conn->query($sql_delete) === TRUE) {
        echo "<p>Projeto excluído com sucesso!</p>";
    } else {
        echo "<p>Erro ao excluir projeto: " . $conn->error . "</p>";
    }
}

$sql = "SELECT * FROM projetos";
$result = $conn->query($sql);
?>
<br>
<h3>Gerenciar Projetos</h3>


<form method="POST" enctype="multipart/form-data">
    <label for="nome_projeto">Nome do Projeto:</label>
    <input type="text" id="nome_projeto" name="nome_projeto" required><br><br>

    <label for="descricao">Descrição:</label>
    <textarea id="descricao" name="descricao" rows="4" cols="50" required></textarea><br><br>

    <label for="tecnologia">Tecnologia:</label>
    <input type="text" id="tecnologia" name="tecnologia"><br><br>

    <label for="foto">Foto do Projeto:</label>
    <input type="file" id="foto" name="foto" required><br><br>

    <label for="data_conclusao">Data de Conclusão:</label>
    <input type="date" id="data_conclusao" name="data_conclusao"><br><br>

    <input type="submit" name="add_projeto" value="Adicionar Projeto">
</form>

<h3>Projetos Existentes</h3>
<br>

<div class="projetos-admin-container">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='projeto'>";
            echo "<h4>" . $row['nome_projeto'] . "</h4>";
            echo "<p><strong>Tecnologia:</strong> " . $row['tecnologia'] . "</p>";
            echo "<p><strong>Descrição:</strong> " . $row['descricao'] . "</p>";
            echo "<p><strong>Data de Conclusão:</strong> " . $row['data_conclusao'] . "</p>";
            echo "<a href='admin_page.php?delete_id=" . $row['id'] . "' onclick='return confirm(\"Tem certeza que deseja excluir este projeto?\")'>Excluir</a>";
            echo "</div>";
        }
    } else {
        echo "<p>Nenhum projeto encontrado.</p>";
    }
    ?>
</div>



<?php

if (isset($_POST['add_noticia'])) {
    $titulo = $_POST['titulo'];
    $resumo = $_POST['resumo'];
    $conteudo = $_POST['conteudo'];
    $data_publicacao = $_POST['data_publicacao'];
    
    
    $imagem = '';
    if (!empty($_FILES['imagem']['name'])) {
        $imagem = 'uploads/' . basename($_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
    }

    
    $sql_insert = "INSERT INTO noticias (titulo, resumo, conteudo, data_publicacao, imagem) 
                   VALUES ('$titulo', '$resumo', '$conteudo', '$data_publicacao', '$imagem')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "<p>Notícia adicionada com sucesso!</p>";
    } else {
        echo "<p>Erro ao adicionar notícia: " . $conn->error . "</p>";
    }
}


if (isset($_GET['delete_id'])) {
    $noticia_id = $_GET['delete_id'];
    $sql_delete = "DELETE FROM noticias WHERE id = '$noticia_id'";
    
    if ($conn->query($sql_delete) === TRUE) {
        echo "<p>Notícia excluída com sucesso!</p>";
    } else {
        echo "<p>Erro ao excluir notícia: " . $conn->error . "</p>";
    }
}


$sql = "SELECT * FROM noticias";
$result = $conn->query($sql);
?>

<br>
<h3>Gerenciar Notícias</h3>


<form method="POST" enctype="multipart/form-data">
    <label for="titulo">Título da Notícia:</label>
    <input type="text" id="titulo" name="titulo" required><br><br>

    <label for="resumo">Resumo:</label>
    <textarea id="resumo" name="resumo" rows="4" cols="50" required></textarea><br><br>

    <label for="conteudo">Conteúdo:</label>
    <textarea id="conteudo" name="conteudo" rows="8" cols="50" required></textarea><br><br>

    <label for="data_publicacao">Data de Publicação:</label>
    <input type="date" id="data_publicacao" name="data_publicacao" required><br><br>

    <label for="imagem">Imagem da Notícia (opcional):</label>
    <input type="file" id="imagem" name="imagem"><br><br>

    <input type="submit" name="add_noticia" value="Adicionar Notícia">
</form>

<h3>Notícias Existentes</h3>

<div class="noticias-admin-container">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='noticia'>";
            echo "<h4>" . $row['titulo'] . "</h4>";
            echo "<p><strong>Resumo:</strong> " . $row['resumo'] . "</p>";
            echo "<p><strong>Data de Publicação:</strong> " . $row['data_publicacao'] . "</p>";
            echo "<a href='admin_page.php?delete_id=" . $row['id'] . "' onclick='return confirm(\"Tem certeza que deseja excluir esta notícia?\")'>Excluir</a>";
            echo "</div>";
        }
    } else {
        echo "<p>Nenhuma notícia encontrada.</p>";
    }
    ?>
</div>


</body>
</html>