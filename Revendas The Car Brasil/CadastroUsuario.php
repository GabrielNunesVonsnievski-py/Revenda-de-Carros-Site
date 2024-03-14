<?php
$conectar = mysqli_connect('localhost','root','');
$banco    = mysqli_select_db($conectar,'revenda');

if (isset($_POST['cadastrar']))
{
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];
    $login  = $_POST['login'];
    $senha  = $_POST['senha'];

$sql = "INSERT into usuario(codigo,nome,login,senha) values('$codigo','$nome','$login','$senha')";

$resultado = mysqli_query($conectar,$sql);

if ($resultado == 0)
    { echo "Falha ao gravar dados informados";}
else
    { echo "Dados cadastro com sucesso";}
}


if (isset($_POST['excluir']))
{
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];
    $login  = $_POST['login'];
    $senha  = $_POST['senha'];

$sql = "DELETE from usuario where codigo = $codigo";

$resultado = mysqli_query($conectar,$sql);

if ($resultado == 0)
    { echo "Falha ao excluir dados informados";}
else
    {echo "Dados excluirdos com sucesso";}
}

if (isset($_POST['alterar']))
{
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];
    $login  = $_POST['login'];
    $senha  = $_POST['senha'];

    $sql = "UPDATE usuario SET nome='$nome', login='$login', senha='$senha' WHERE codigo='$codigo'";

$resultado = mysqli_query($conectar,$sql);

if ($resultado == 0)
{
    echo 'Dados alterados com Sucesso';
}
else
{
    echo 'Erro ao alterar dados';
}
}

if (isset($_POST['pesquisar']))
{

    $sql = mysqli_query($conectar,"SELECT * FROM usuario");

    echo "<b>Usuarios Cadastrados:</b><br><br>";

    while ($dados = mysqli_fetch_object($sql))
    {
        echo "Codigo: ".$dados->codigo."  ";
        echo "Nome  : ".$dados->nome."<br>";

    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
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

        h1 {
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
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="logo.png" alt="Logo" class="logo">
        <h1>Cadastro de Usuários</h1>
        <form name="formulario" method="post" action="CadastroUsuario.php">
            <label for="codigo">Código:</label>
            <input type="text" name="codigo" id="codigo" size="10" required>
            <br><br>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" size="30" required>
            <br><br>
            <label for="login">Login:</label>
            <input type="text" name="login" id="login" size="20" required>
            <br><br>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" size="20" required>
            <br><br>
            <input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
            <input type="submit" value="Excluir" id="excluir" name="excluir">
            <input type="submit" value="Alterar" id="alterar" name="alterar">
            <input type="submit" value="Pesquisar" id="pesquisar" name="pesquisar">   
        </form>
    </div>
</body>
</html>

