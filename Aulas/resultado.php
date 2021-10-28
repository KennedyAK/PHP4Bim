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
                $conexao = new mysqli("localhost", "root", "", "bdphp");
                if ($conexao->connect_error) {
                    echo 'erro ao conectar ao BD' . $conexao->connect_error;
                }
                $resultado = $conexao->query("SELECT * FROM tarefa ORDER BY idtarefa");

                $tupla = array();
                while ($linha = $resultado->fetch_assoc()) {
                    array_push($tupla, $linha);
                }

                foreach ($tupla as $conteudo) :
                ?>
                    <tr>
                        <td>
                            <?php echo ($conteudo['idtarefa']); ?>
                        </td>
                        <td>
                            <?php echo ($conteudo['descricao']); ?>
                        </td>
                        <td>
                            <?php echo ($conteudo['data']); ?>
                        </td>
                        <td>
                            <?php echo ($conteudo['status']); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table><br>
            <a href="exemplo03.php">Voltar</a>
        </fieldset>
    </form>
</body>

</html>