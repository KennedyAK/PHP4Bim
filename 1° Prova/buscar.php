<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Veículo</title>
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

        .efec {
            cursor: pointer;
            color: black;
            font-size: 20px;
            text-decoration: none;
        }

        .efec:hover {
            color: rgb(10, 68, 19);
            font-weight: bolder;
            text-decoration: overline;
        }

        input[type=submit]:hover {
            cursor: pointer;
            background-color: black;
            color: white;
            font-size: 19px;
        }

        hr {
            margin: 20px;
        }
    </style>

    <fieldset style="font-size: 16px;">
        <form method="post">
            <p style="font-size: 26px; font-weight: bolder;">Consultar veículo por:</p>

            <label class="efec">
                <input type="radio" value="p" name="cpbus"> Placa
            </label> &nbsp;&nbsp;
            <label class="efec">
                <input type="radio" value="t" name="cpbus">Ticket
            </label><br><br>

            <label class="spaceM">
                Código:
                <input class="spaceM" name="cpNumberBuscar" type="text">
            </label>

            <br><input class="spaceM" type="submit" name="cpSubmit" value="Buscar">
            <hr>
        </form>

        <style>
            table,
            th,
            td {
                width: inherit;
                border-bottom: 1px solid black;
                text-align: center;
            }

            table {
                border-bottom: 0px solid black;
            }
        </style>

        <table>
            <tr>
                <th>ID</th>
                <th>Placa</th>
                <th>Ticket</th>
                <th>Entrada</th>
            </tr>

            <?php


            $err404 = '<tr><td colspan="5"> Nenhum registro encontrado </td></tr>';
            if (!empty($_POST['cpbus']) && ($_POST['cpNumberBuscar'])) {
                include 'back.php';

                $resultado = consulta($_POST['cpbus'], $_POST['cpNumberBuscar']);
                $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);

                if ($dados == null) {
                    echo $err404;
                } else {
                    foreach ($dados as $conteudo) {
                        echo '<tr>';
                        echo '<td>' . $conteudo['idvaga'] . '</td>';
                        echo '<td>' . $conteudo['placa'] . '</td>';
                        echo '<td>' . $conteudo['ticket'] . '</td>';
                        echo '<td>' . $conteudo['entrada'] . '</td>';
                        echo '</tr>';
                    }
                }
            } else {
                echo $err404;
            }
            ?>

        </table>
        <br>
        <hr><a href="index.php" class="spaceM efec">Voltar</a>
    </fieldset>

</body>

</html>