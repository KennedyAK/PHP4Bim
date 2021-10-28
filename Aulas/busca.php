<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca por tarefas</title>
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

            <label>
                Descrição a ser localizada:
                <input name="cpDesc">
            </label>
            <input type="submit" value="Buscar"><br><br>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Status</th>
                </tr>

                <?php

                if (!empty($_POST['cpDesc'])) {
                    include 'funcao.php';

                    $resultado = buscaTarefa($_POST['cpDesc']);
                    $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($dados as $conteudo) {
                        echo '<tr>';
                        echo '<td>' . $conteudo['idtarefa'] . '</td>';
                        echo '<td>' . $conteudo['descricao'] . '</td>';
                        echo '<td>' . $conteudo['data'] . '</td>';
                        echo '<td>' . $conteudo['status'] . '</td>';
                        echo '</tr>';
                    } //foreach
                } else {
                    echo '<tr>';
                    echo '<td colspan="4">Nenhum registro encontrado</td>';
                    echo '</tr>';
                } //if post
                ?>
                
            </table><br>
            <a href="exemplo03.php">Voltar</a>
        </fieldset>
    </form>
</body>

</html>