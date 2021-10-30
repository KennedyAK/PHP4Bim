<?php

function conectar()
{
    $conexao = new PDO("mysql:dbname=bdprova", "root", "");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conexao;
}

function cadastrar($veiculo, $placa)
{
    $conexao = conectar();
    $query = $conexao->prepare('INSERT INTO vaga VALUES (NULL, :veiculo, :placa, :entrada, :ticket)');

    // O SENHOR explicou uma coisa no video, mas no pdf pede para salvar tbm o tipo do veiculo (:/)

    $query->bindValue(":veiculo", $veiculo);
    $query->bindValue(":placa", $placa);

    date_default_timezone_set("America/Cuiaba");
    $query->bindValue(":entrada", $data = date("y/m/d H:i", time()));

    $partTicket = str_replace("/", "", $data);
    $partTicket = str_replace(":", "", $partTicket);
    $partTicket = str_replace(" ", "", $partTicket);
    $query->bindValue(":ticket", $veiculo . $partTicket);

    $query->execute();
    $conexao = null;
}

function consulta($tipo, $codigo)
{
    $conexao = conectar();

    switch ($tipo) {
        case $tipo == 'p':
            $query = $conexao->prepare("SELECT * FROM vaga WHERE placa = :placa;");
            $query->bindValue(":placa", $codigo);
            break;

        case $tipo == 't':
            $query = $conexao->prepare("SELECT * FROM vaga WHERE ticket LIKE :ticket;");
            $query->bindValue(":ticket", $codigo . '%');
            break;
    }

    $query->execute();
    return $query;
    $conexao = null;
}
