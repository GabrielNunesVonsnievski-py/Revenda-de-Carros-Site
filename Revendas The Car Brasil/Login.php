<?php
$conectar = mysql_connect('Localhost','root','') ;
$banco    = mysql_select_db("revenda");

if (isset($_POST['conectar']))
{

    $login  = $_POST['login'];
    $senha  = $_POST['senha'];


    $sql = mysql_query("select * FROM usuario where login='$login' and senha='$senha'");

    $resultado = mysql_num_rows($sql);

    if( $resultado == 0)
    {
        echo "Login ou senha inválido...";}
    else
    {
        session_start();
        $_SESSION['login'] = $login;
        header("Location:Menu.HTML");
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuário</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
        }

        h2 {
            margin-top: 20px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #505bff;
        }

        .logo {
            max-width: 200px;
            margin: 0 auto;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="logo.png" alt="Logo" class="logo">
        <h2>Login do Usuário</h2>
        <form name="formulario" method="post" action="Login.php">
            <label for="login">Login:</label>
            <input type="text" name="login" id="login" required>
            <br><br>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
            <br><br>
            <input type="submit" value="Conectar" id="conectar" name="conectar">
        </form>
    </div>
</body>
</html>