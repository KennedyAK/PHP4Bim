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

                <?php
                include 'funcao.php'; // o include realiza a mesma tarefa do require, porem, continua rodando o sistema se houver agum erro
                $resultado = visualizarTarefa();
                $dados = $resultado->fetchAll(PDO::FETCH_ASSOC); // separa em um vetor php mostrando o conteudo de cada coluna
                foreach ($dados as $conteudo) {
                    echo '<tr>';
                    echo '<td>' . $conteudo['idtarefa'] . '</td>';
                    echo '<td>' . $conteudo['descricao'] . '</td>';
                    echo '<td>' . $conteudo['data'] . '</td>';
                    echo '<td>' . $conteudo['status'] . '</td>';
                    echo '</tr>';
                }

                ?>

            </table><br>
            <a href="exemplo03.php">Voltar</a>
        </fieldset>
    </form>
</body>

</html>