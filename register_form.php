<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $apelido = mysqli_real_escape_string($conn, $_POST['apelido']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM utilizadores WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'Usuario Já Existe!';

   }else{

      if($pass != $cpass){
         $error[] = 'Senha Incorreta!';
      }else{
         $insert = "INSERT INTO utilizadores(name, apelido, email, password, user_type) VALUES('$name','$apelido','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registro</title>


   <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.form-container {
    background-color: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

.form-container h3 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

.form-container input[type="text"],
.form-container input[type="email"],
.form-container input[type="password"],
.form-container select,
.form-container input[type="submit"] {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.form-container select {
    background-color: #fff;
    cursor: pointer;
}

.form-container input[type="submit"] {
    background-color: #333;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-container input[type="submit"]:hover {
    background-color: #555;
}

.error-msg {
    color: red;
    font-size: 14px;
    margin-bottom: 10px;
    display: block;
    text-align: center;
}

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
      <h3>Registre Aqui</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Coloque seu nome">
      <input type="text" id="apelido" name="apelido" required placeholder="Apelido">
      <input type="email" name="email" required placeholder="Coloque seu email">
      <input type="password" name="password" required placeholder="Coloque sua senha">
      <input type="password" name="cpassword" required placeholder="Confirme sua senha">
      <select name="user_type">
         <option value="user">Usuário</option>
        <!--<option value="admin">Admin</option>-->
      </select>
      <input type="submit" name="submit" value="Registrar" class="form-btn">
      <p>Já tem uma conta? <a href="login_form.php">Faça o login aqui</a></p>
   </form>

</div>

</body>
</html>