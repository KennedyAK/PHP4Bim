<?php
// o modelo de desenvolvimento NVC utiliza arquivos separados para HTML e PHP, facilitando a manutenção

function conecta(){
    $conexao = new PDO("mysql:dbname=bdphp", "root", "");
                      // Tipo do BD:dbname= nome do BD, usuario, senha
    //PDO age de forma parecida com o mysqli mas tem uma elegancia a mais, é orientado a objeto.

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //auterando/modificando algum atributo
    return $conexao; // o php nao exige a declaração do tipo do retorno, nem se nao vai retornar nada (void)

    //diferente do mysqli o PDO não necessita de if/else para tratar erros
}

function inserir($descricao, $data, $status){
    // resumidamente existe no php 2 formas de conectar a um BD, com a funcao mysqli e o PDO
    //pelo PDO o prepare utiliza (:) seguido de alguma string para representar variaveis, ja o mysqli usa (?)

    $conexao = conecta();
    $query = $conexao->prepare('INSERT INTO tarefa VALUES (NULL, :a, :b, :c)');
    $query->bindValue(":a", $descricao); // conectando a variavel do BD a variavel da funcao inserir
    $query->bindValue(":b", $data);
    $query->bindValue(":c", $status);
    $query->execute();

}

function visualizarTarefa(){
    $conexao = conecta();
    $query = $conexao->prepare("SELECT * FROM tarefa;");
    // java: query = con.prepare();

    $query->execute();
    $conexao = null; // uma boa pratica de programacao é liberar a conexao depois de realizar a atividade;
    return $query;
}

function buscaTarefa($descricao){
    $conexao = conecta();

    // $query = $conexao->prepare("SELECT * FROM tarefa WHERE descricao (=) :d;");
    //neste momento de busca por dados, o sinal de (=) é recomendado para numeros exatos
    
    $query = $conexao->prepare("SELECT * FROM tarefa WHERE descricao LIKE :d;");
    // AQUI a string (LIKE) significa que o prepare ira busca por algo PARECIDO com....
    // NO MOMENTO de explicar os valores, basta CONCATENAR com '%'.. linha 49

    $query->bindValue(":d", $descricao.'%'); // basicamente é uma explicacao dos valores quando o parametro for acionado
    $conexao = null;
    return $query;
}
