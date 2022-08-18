<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/conexao.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Azul | ANUNCIANTE</title>
  <!-- Favcon -->
  <link rel="shortcut icon" href="/assets/img/logos/logo.png" type="image/x-icon">
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CSS E JS -->
  <link rel="stylesheet" href="/assets/css/main.css" />
  <script src="/assets/js/main.js" defer></script>
</head>
<body>

  <?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/header.html';

    $anunciante = $_GET['anunciante'];

    $paginaQuery = $conexao -> prepare("SELECT * FROM paginaanunciante WHERE nome = '$anunciante'");
    $paginaQuery -> execute();

    $paginaInfo = $paginaQuery->fetch(PDO::FETCH_ASSOC);
        
    ?>
    <h1><?= $paginaInfo['nome'] ?></h1>
    <p><?= $paginaInfo['descricao'] ?></p>
    <img src="/assets/img/img-anunciante/<?= $paginaInfo['imagemPerfil']?>" alt="">  
  
</body>
</html>