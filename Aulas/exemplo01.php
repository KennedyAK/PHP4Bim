<?php

// ============================= aula 02 Conexão =============================
$conexao = new mysqli("localhost", "root", "", "bd_php");
           //mysqli("endereco_banco", "usuario", "senha", "nomebanco")

if ($conexao->connect_error) // lEMBRE-SE sempre de verificar se houve algum erro ao conectar o php com bd
    echo 'Erro ao conectar: ' . $conexao->connect_error;
else
    echo 'conectou meu mano!';

// ============================= aula 03 Inserção =============================
    $pst = $conexao->prepare("INSERT INTO tarefa VALUES(null, ?, ?, ?)");
    $pst->bind_param("sss",$descricao, $data, $status); 
        // s -> string, d -> double, i -> integer, b -> blob

    $descricao = "comprar frutas";
    $data = '2021-10-26 20:00';
    $status = 'Pendente';
    $pst->execute();
    echo 'Cadastrado com sucesso!';