<?php
$con = new mysqli("localhost", "root", "", "bdphp");

if ($con->connect_error) {
    echo 'Erro ao conectar: ' . $con->connect_error;
}

$res = $con->query("SELECT * FROM tarefa ORDER BY idtarefa");

$tupla = array();
while ($linha = $res->fetch_assoc()) {
    array_push($tupla, $linha);
}

$q = 0;
while ($q != 4) {
   //print_r($tupla[$q]);
   //echo '<br><br>';

   echo json_encode($tupla[$q]);
    echo '<br><br>';
    $q++;
}

echo json_encode($tupla);

