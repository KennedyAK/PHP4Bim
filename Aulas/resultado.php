<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>

<body>
    <form method="post">

        <style>
            fieldset {
                margin: 0 auto;
                width: 600px;
            }

            h3 {
                text-align: center;
            }

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

        <fieldset>
            <h3>Tarefas Cadastradas</h3>
            <table>
                <!--border-collapse: collapse;...   retira a borda dupla do html-->
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Status</th>
                </tr>

                <tr>
                    <td>1</td>
                    <td>Antonio</td>
                    <td>2021-10-27 20:09</td>
                    <td>Pendente</td>
                </tr>

            </table><br>
            <a href="exemplo03.php">Voltar</a>
        </fieldset>
    </form>
</body>

</html>