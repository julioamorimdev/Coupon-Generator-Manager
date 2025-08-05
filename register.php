<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Criar conta</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
</head>
<body>
<?php
require('includes/db.php');

// If form is submitted, insert values into the database
if (isset($_REQUEST['username'])) {
    // Remove backslashes
    $username = stripslashes($_REQUEST['username']);
    // Escape special characters in a string for use in an SQL statement
    $username = mysqli_real_escape_string($con, $username);

    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);

    $nome = stripslashes($_REQUEST['nome']);
    $nome = mysqli_real_escape_string($con, $nome);

    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);

    $trn_date = date("Y-m-d H:i:s");

    // Insert the filled information into the table
    $query = "INSERT into `admins` (username, password, email, trn_date, nome)
    VALUES ('$username', '".md5($password)."', '$email', '$trn_date', '$nome')";
    $result = mysqli_query($con, $query);

    // If the result is successful
    if ($result) {
        echo "<div class='container'> <div class='boxsucess'>
                <h3> Você foi cadastrado com sucesso. </h3>
                <br> Clique aqui para <a href='index.php'>logar</a></div></div>";
    }
} else {
?>
    <div class="container">
        <div class="box">
            <br>
            <h1>Cadastro Admin</h1>
            <form name="registration" action="" method="post">
                <input type="text" name="nome" placeholder="Nome" required /><br>
                <input type="text" name="username" placeholder="Usuário" required /><br>
                <input type="email" name="email" placeholder="E-mail" required /><br>
                <input type="password" name="password" placeholder="Senha" required />
                <input type="password" name="password" placeholder="Repita a senha" required /><br>
                <input type="submit" name="submit" value="Criar conta" /><br>
                <p>Já possui uma conta? <a href='index.php'>Logar</a></p>
            </form>
        </div>
    </div>
<?php } ?>
</body>
</html>