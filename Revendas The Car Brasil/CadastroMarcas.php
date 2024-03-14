<?php
//inicar sesão PHP
session_start();

//comando de conexão com o BD (localweb,usuario,senha)
$conectar = mysqli_connect('localhost','root','');

//selecionar o BD revenda
$banco = mysqli_select_db ($conectar,'revenda');

//comandos para verificar as opções
//(GRAVAR,EXLUIR,ALTERAR,PESQUISAR)

//verificar se o botão GRAVAR foi selecionado
if (isset($_POST['gravar']))
{
    //capturar as variaveis do HTML
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];

$sql = "insert into marca (codigo,nome)
        values ('$codigo','$nome')";

        //executar o comando no BD
        $resultado = mysqli_query($conectar,$sql);

        //verificar se deu certo ou erro
        if ($resultado === TRUE)
        {
            //exibir mensagem
            echo "Dados gravados com sucesso.";
        }
        else
            {
                echo "Erro ao gravar com sucesso";
            }

}

//excluir dados
if (isset($_POST['excluir']))
{
    //capturar as variaveis do HTML
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];

$sql = "delete from marca where codigo = '$codigo'";

        //executar o comando no BD
        $resultado = mysqli_query($conectar,$sql);

        //verificar se deu certo ou erro
        if ($resultado === TRUE)
        {
            //exibir mensagem
            echo "Dados deletados com sucesso.";
        }
        else
            {
                echo "Erro ao deletar dados";
            }

}

//alterar dados
if (isset($_POST['alterar']))
{
    //capturar as variaveis do HTML
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];

$sql = "update marca set nome = '$nome'
         where codigo = '$codigo'";

        //executar o comando no BD
        $resultado = mysqli_query($conectar,$sql);

        //verificar se deu certo ou erro
        if ($resultado === TRUE)
        {
            //exibir mensagem
            echo "Dados alterados com sucesso.";
        }
        else
            {
                echo "Erro ao alterar dados";
            }

}

if (isset($_POST['pesquisar']))
{
    //selecionar todas as informações da tabela
    $sql = mysqli_query($conectar,"SELECT * FROM marca");

    echo "<b>Marcas Cadastradas:</b><br><br>";

    //mostrar as informações mostradas na tabela (vetor)
    while ($dados = mysqli_fetch_object($sql))
    {
        echo "Codigo: ".$dados->codigo."  ";
        echo "Nome: ".$dados->nome."<br>";

    }

}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Marcas</title>
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
        <h1>Cadastro de Marcas</h1>
        <form name="formulario" method="post" action="CadastroMarcas.php">
            <label for="codigo">Código:</label>
            <input type="text" name="codigo" id="codigo" size="10">
            <br><br>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" size="30">
            <br><br>
            <input type="submit" name="gravar" value="Gravar">
            <input type="submit" name="excluir" value="Excluir">
            <input type="submit" name="alterar" value="Alterar">
            <input type="submit" name="pesquisar" value="Pesquisar">
        </form>
    </div>
</body>
</html>
