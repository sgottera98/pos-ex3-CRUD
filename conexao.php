<?php
$servidor='localhost';
$usuario='root';
$senha='';
$db='db_clinica';
$con=mysqli_connect($servidor,$usuario,$senha,$db);
if (!$con){
    print("Erro na conexão com MySQL");
    print("Erro: ".mysqli_connect_error());
    exit;
}
?>