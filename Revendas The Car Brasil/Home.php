<?php
//conectar com bando dados
$connect = mysql_connect('localhost','root','');
$db      = mysql_select_db('revenda');
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa Veiculos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style type="text/css">
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            text-align: center;
            padding: 20px;
            position: relative;
        }

        form {
            margin-top: 20px;
        }

        img {
            width: 100%;
            max-width: 400px;
            height: auto;
            border-radius: 10px;
        }

        select, input {
            width: 35%;
            height: 40px;
            padding: 6px 12px;
            font-size: 14px;
            margin-top: 10px;
            border-radius: 4px;
        }

        .login-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #808080; 
            color: black; 
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .login-btn:hover {
            background-color: #505bff;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Link de âncora para a página de login -->
        <a href="Login.php" class="login-btn">Login</a>
        <form name="formulario" method="post" action="Home.php">
            <img src="./logo.PNG" alt="Logo" border="0">
            <h1><b>THE CAR BRASIL</b><br>REVENDA DE VEICULOS</h1>
            <h1>Pesquisa de Veiculos por:</h1>
            <label for="">Marcas: </label>
            <select name="marca">
                <option value="" selected="selected"></option>
                <?php
                $query = mysql_query("SELECT codigo, nome FROM marca");
                while($marcas = mysql_fetch_array($query))
                {?>
                    <option value="<?php echo $marcas['codigo']?>">
                        <?php echo $marcas['nome']  ?></option>
                <?php }
                ?>
            </select>

            <label for="">Modelos: </label>
            <select name="modelo">
                <option value="" selected="selected"></option>
                <?php
                $query = mysql_query("SELECT codigo, nome FROM modelo");
                while($modelo = mysql_fetch_array($query))
                {?>
                    <option value="<?php echo $modelo['codigo']?>">
                        <?php echo $modelo['nome']  ?></option>
                <?php }
                ?>

            </select>
            <input type="submit" name="pesquisar" value="Pesquisar">
        </form>
    </div>
</body>
</html>


        <br><br>

<?php

if (isset($_POST['pesquisar']))
{

//------- pesquisa marcas
$sql_marcas  = "SELECT * FROM marca ";
$pega_marcas = mysql_query($sql_marcas);

//------- pesquisa modelos
$sql_modelos  = "SELECT * FROM modelo ";
$pega_modelos = mysql_query($sql_modelos);


//-------- verificar as opções selecionadas ou não
$marca   = (empty($_POST['marca']))? 'null' : $_POST['marca'];
$modelo  = (empty($_POST['modelo']))? 'null' : $_POST['modelo'];


if (($marca <> 'null') and ($modelo == 'null'))
{
     $sql_veiculos       = "SELECT descricao, ano, cor, valor
                            FROM veiculo,marca,modelo
                            WHERE veiculo.codmodelo = modelo.codigo
                            and modelo.codmarca = marca.codigo
                            and marca.codigo = $marca ";
     $seleciona_veiculos = mysql_query($sql_veiculos);
}

// -------- verificar o modelo ??????
if (($marca == 'null') and ($modelo <> 'null'))
{
     $sql_modelos       = "SELECT descricao, ano, cor, valor
                            FROM veiculo,marca,modelo
                            WHERE veiculo.codmodelo = modelo.codigo
                            and modelo.codmarca = marca.codigo
                            and modelo.codigo = $modelo ";
     $seleciona_veiculos = mysql_query($sql_modelos);
}

if (($marca <> 'null') and ($modelo <> 'null'))
{
     $sql_modelos       = "SELECT descricao, ano, cor, valor
                            FROM veiculo,marca,modelo
                            WHERE veiculo.codmodelo = modelo.codigo
                            and modelo.codmarca = marca.codigo
                            and modelo.codigo = $modelo ";
     $seleciona_veiculos = mysql_query($sql_modelos);
}

//--------mostrar os veiculos pesquisados
if(mysql_num_rows($seleciona_veiculos) == 0)
{
   echo '<h1>Desculpe, mas sua busca nao retornou resultados ... </h1>';
}
else
{
   echo "Resultado da pesquisa de Veiculos: <br><br>";
   echo "<ul>";
			while($resultado = mysql_fetch_array($seleciona_veiculos))
			{
			echo "<tr><td>".utf8_encode($resultado['descricao'])."</td>
			          <td>".utf8_encode($resultado['ano'])."</td>
			          <td>".utf8_encode($resultado['cor'])."</td>
			          <td>".utf8_encode($resultado['valor'])."</td></tr><br><br>";
			}
}


}
?>