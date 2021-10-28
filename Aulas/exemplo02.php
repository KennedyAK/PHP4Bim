<?php
// ============================= aula 04 - buscando dados em BD - tratando informações =============================

//fazer o tratamento das infromacoes em BD é uma atividade complexa

$conexao = new mysqli("localhost", "root", "", "bdphp");
if ($conexao->connect_error)
    echo 'erro ao conectar: ' . $conexao->connect_error;

$resultado = $conexao->query("SELECT * FROM tarefa ORDER BY descricao"); //letras maiusculas para visualizar melhor as tags do mysql "boas praticas de programação"
//echo var_dump($resultado); 
// apresenta um metadado, informacoes dos dados

$tupla = array();    // tupla é o conjunto de todas as informações/DADOS

while ($linha = $resultado->fetch_assoc()){
    array_push($tupla, $linha);
}
//fetch_assoc é uma funcionalidade do PHP que separa corretamente por coluna as informacoes da tupla

echo json_encode($tupla); 
//json_encode separa as informacoes por coluna.... isso é da coluna 1 e isso da coluna 2