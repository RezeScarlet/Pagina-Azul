<?php

require $_SERVER['DOCUMENT_ROOT'] . "/global.php";
session_start();

$servidor = $_ENV['BANCO_SERVIDOR'];
$usuario = $_ENV['BANCO_USUARIO'];
$senha = $_ENV['BANCO_SENHA'];
$bancodados = $_ENV['BANCO_NOME'];

$datasource = "mysql:host=$servidor;dbname=$bancodados;charset=UTF8";

try {
  $conexao = new PDO($datasource, $usuario, $senha);
  $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "conexão estabelecida";
} catch (PDOException $e) {
  // echo "Erro na conexão";
}
