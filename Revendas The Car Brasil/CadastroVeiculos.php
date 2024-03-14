<?php
//inicar sesão PHP
session_start();

//comando de conexão com o BD (localweb,usuario,senha)
$conectar = mysqli_connect('localhost','root','');

//selecionar o BD revenda
$banco = mysqli_select_db ($conectar,'revenda');

if (isset($_POST['gravar']))
{
    $codigo    = $_POST['codigo'];
    $descricao = $_POST['descricao'];
    $codmodelo = $_POST['codmodelo'];
    $ano       = $_POST['ano'];
    $cor       = $_POST['cor'];
    $placa     = $_POST['placa'];
    $opcional  = $_POST['opcional'];
    $valor     = $_POST['valor'];


$sql = "INSERT INTO veiculo (codigo,descricao,codmodelo,ano,cor,placa,opcional,valor) VALUES ('$codigo','$descricao','$codmodelo','$ano','$cor','$placa','$opcional','$valor')";

//executar o comando no BD
$resultado = mysqli_query($conectar,$sql);

if ($resultado === TRUE)
{
    echo 'Cadastro realizado com Sucesso';
}
else
{
    echo 'Erro ao gravar dados';
}
}

if (isset($_POST['excluir']))
{
    $codigo    = $_POST['codigo'];
    $descricao = $_POST['descricao'];
    $codmodelo = $_POST['codmodelo'];
    $ano       = $_POST['ano'];
    $cor       = $_POST['cor'];
    $placa     = $_POST['placa'];
    $opcional = $_POST['opcional'];
    $valor     = $_POST['valor'];


$sql = "DELETE FROM veiculo WHERE codigo = '$codigo'";

//executar o comando no BD
$resultado = mysqli_query($conectar,$sql);

if ($resultado === TRUE)
{
    echo 'Exclusão realizado com Sucesso';
}
else
{
    echo 'Erro ao gravar dados';
}
}

if (isset($_POST['alterar']))
{
    $codigo    = $_POST['codigo'];
    $descricao = $_POST['descricao'];
    $codmodelo = $_POST['codmodelo'];
    $ano       = $_POST['ano'];
    $cor       = $_POST['cor'];
    $placa     = $_POST['placa'];
    $opcional = $_POST['opcional'];
    $valor     = $_POST['valor'];


$sql = "UPDATE veiculo SET descricao='$descricao',opcional='$opcional',valor='$valor'
        where codigo = '$codigo'";

//executar o comando no BD
$resultado = mysqli_query($conectar,$sql);

if ($resultado === TRUE)
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

    $sql = mysqli_query($conectar,"SELECT codigo,descricao,codmodelo,ano,cor,placa,opcional,valor FROM veiculo");

    echo "<b>Veiculos Cadastradas:</b><br><br>";
    while ($dados = mysqli_fetch_object($sql))
    {
        echo "Codigo:      ".$dados->codigo."  ";
        echo "Descrição:   ".$dados->descricao."<br>";
        echo "Cod Modelo:  ".$dados->codmodelo."<br>";
        echo "Ano:         ".$dados->ano."<br>";
        echo "Cor:         ".$dados->cor."<br>";
        echo "Placa:       ".$dados->placa."<br>";
        echo "Opcicionais: ".$dados->opcional."<br>";
        echo "Valor R$:    ".$dados->valor."<br>";
        
    }

}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Veículos</title>
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

        input[type="text"] {
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
        <h1>Cadastro de Veículos</h1>
        <form name="formulario" method="post" action="CadastroVeiculos.PHP">
            <label for="codigo">Código:</label>
            <input type="text" name="codigo" id="codigo" size="10">
            <br><br>
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" size="30">
            <br><br>
            <label for="codmodelo">Código do Modelo:</label>
            <input type="text" name="codmodelo" id="codmodelo" size="10">
            <br><br>
            <label for="ano">Ano:</label>
            <input type="text" name="ano" id="ano" size="10">
            <br><br>
            <label for="cor">Cor:</label>
            <input type="text" name="cor" id="cor" size="30">
            <br><br>
            <label for="placa">Placa:</label>
            <input type="text" name="placa" id="placa" size="30">
            <br><br>
            <label for="opcional">Opcional:</label>
            <input type="text" name="opcional" id="opcional" size="30">
            <br><br>
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" size="30">
            <br><br>
            <input type="submit" name="gravar" value="Gravar">
            <input type="submit" name="excluir" value="Excluir">
            <input type="submit" name="alterar" value="Alterar">
            <input type="submit" name="pesquisar" value="Pesquisar">
        </form>
    </div>
</body>
</html>