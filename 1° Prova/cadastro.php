<?php
require 'back.php';

if (!empty($_POST)) {
    $veiculo = $_POST['cpVeiculo'];
    $placa = $_POST['cpPlaca'];

    cadastrar($veiculo, $placa);
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>

    <style>
        * {
            font-size: 18px;
        }

        fieldset {
            width: 600px;
            margin: auto;
            text-align: center;
        }

        .spaceM {
            margin-bottom: 12px;
        }

        a {
            cursor: pointer;
            color: black;
            font-size: 20px;
            text-decoration: none;
        }

        a:hover {
            color: rgb(10, 68, 19);
            font-weight: bolder;
            text-decoration: overline;
        }

        input[type=submit]:hover{
            cursor: pointer;
            background-color: black;
            color: white;
            font-size: 19px;
        }
    </style>

    <form method="post">
        <fieldset>
            <h1 style="font-size: 26px;">Cadastro de Veículo</h1>

            <br>

            <label>
                <input type="radio" name="cpVeiculo" value="CAR">Carro &nbsp; &nbsp;
            </label>
            <label>
                <input type="radio" name="cpVeiculo" value="MOT">Moto
            </label>

            <br><br>
            
            <label>
                Placa:
                <input type="text" min="0" class="spaceM" name="cpPlaca">
            </label>

            <br><input class="spaceM" type="submit" name="cpCadastrar" value="Cadastrar">
            <br><a style="font-size: 18px" class="spaceM" href="index.php">Voltar</a>

        </fieldset>
    </form>

</body>

</html>