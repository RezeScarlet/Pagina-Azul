<?php

require $_SERVER['DOCUMENT_ROOT'] . "/config.php";
session_start();

$servidor = DB_CONFIG["host"];
$usuario = DB_CONFIG["username"];
$senha = DB_CONFIG["password"];
$bancodados = DB_CONFIG["dbname"];

$datasource = "mysql:host=$servidor;dbname=$bancodados;charset=UTF8";

try {
  $conexao = new PDO($datasource, $usuario, $senha);
  $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "conexão estabelecida";
} catch (PDOException $e) {
  // echo "Erro na conexão";
}
