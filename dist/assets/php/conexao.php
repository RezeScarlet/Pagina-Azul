<?php

$servidor = "localhost:3306";
$usuario = "root";
$senha = "";
$bancodados = "pagina azul";

$datasource = "mysql:host=$servidor;dbname=$bancodados;charset=UTF8";

try {
  $conexao = new PDO($datasource, $usuario, $senha);
  $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "conexão estabelecida";
} catch(PDOException $e) {
  // echo "Erro na conexão";
}

?>