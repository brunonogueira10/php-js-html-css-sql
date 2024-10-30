<?php
@include 'config.php';
session_start();

if (isset($_POST['submit'])) {
   
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   
   $select = "SELECT * FROM utilizadores WHERE email = '$email' AND password = '$pass'";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);

      
      if ($row['user_type'] == 'admin') {
         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['user_id'] = $row['id'];  
         header('location:admin_page.php');
      } elseif ($row['user_type'] == 'user') {
         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_id'] = $row['id'];  
         header('location:home.php');
      }
     
   } else {
      $error[] = 'Email ou senha incorretos!';
   }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Formulário</title>

   <style>
      /* Estilo geral do body */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Estilo do contêiner do formulário */
.form-container {
    background-color: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

/* Título do formulário */
.form-container h3 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

/* Inputs do formulário */
.form-container input[type="email"],
.form-container input[type="password"],
.form-container input[type="submit"] {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

/* Estilo do botão de submissão */
.form-container input[type="submit"] {
    background-color: #333;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-container input[type="submit"]:hover {
    background-color: #555;
}

/* Mensagem de erro */
.error-msg {
    color: red;
    font-size: 14px;
    margin-bottom: 10px;
    display: block;
    text-align: center;
}

/* Link para registro */
.form-container p {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
}

.form-container p a {
    color: #333;
    text-decoration: none;
    font-weight: bold;
}

.form-container p a:hover {
    text-decoration: underline;
}

/* Responsividade */
@media (max-width: 600px) {
    .form-container {
        padding: 20px;
    }

    .form-container h3 {
        font-size: 20px;
    }
}
   </style>

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Login</h3>
      <?php
      if (isset($error)) {
         foreach ($error as $error_msg) {
            echo '<span class="error-msg">' . $error_msg . '</span>';
         }
      }
      ?>
      <input type="email" name="email" required placeholder="Email">
      <input type="password" name="password" required placeholder="Senha">
      <input type="submit" name="submit" value="Fazer Login" class="form-btn">
      <p>Ainda não tem uma conta? <a href="register_form.php">Registre-se aqui</a></p>
   </form>

</div>

</body>
</html>
