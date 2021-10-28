<?php
require 'funcao.php'; // o require para o processamento se houver algum erro, diferente do include 

// verifica se houve alguma ação de submit do tipo POST
if (!empty($_POST)) {
    $descricao = $_POST['cpDescricao'];
    $data = $_POST['cpData'];
    $status = 'Pendente';

    inserir($descricao, $data, $status);
    header("location: exemplo03.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Tarefa</title>
</head>

<body>

    <style>
        fieldset {
            margin: 0 auto;
            width: 600px;
        }
    </style>

    <form method="post">
        <fieldset>
            <h3>Nova Tarefa</h3>
            <label>
                descrição:
                <input name="cpDescricao" size="70%" type="text">
            </label><br>

            <label>
                Data:
                <input type="datetime-local" name="cpData">
                <!--input do tipo data e hora-->
            </label><br>

            <input type="submit" value="Cadastrar">
            <input type="reset" value="Limpar"> <br><br>
            <a href="exemplo03.php">Voltar</a>
        </fieldset>

    </form>

</body>

</html>