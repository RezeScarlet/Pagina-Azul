
<?php

    require_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/conexao.php';

    $anunciante = $_GET['anunciante'];

    $paginaQuery = $conexao -> prepare("SELECT * FROM anunciante WHERE nome = '$anunciante'");
    $paginaQuery -> execute();
    $paginaInfo = $paginaQuery->fetch(PDO::FETCH_ASSOC);

    $categoriaQuery = $conexao -> prepare("SELECT nome FROM categorias WHERE idCategoria = '$paginaInfo[idCategoria]'");
    $categoriaQuery -> execute();
    $categoria = $categoriaQuery -> fetch(PDO::FETCH_ASSOC);
    $categoria = $categoria['nome'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $paginaInfo['nome'] ?> - Página Azul</title>
  <!-- FAVICON -->
  <link rel="shortcut icon" href="/assets/img/logos/logo.png" type="image/x-icon">
  <!-- FONT AWESOME -->
  <script src="https://kit.fontawesome.com/d80615c6de.js" crossorigin="anonymous"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="/assets/css/main.css">
  <!-- JavaScript -->
  <script src="/assets/js/main.js" defer></script>
</head>
<body>

  <?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/header.html';
  ?>

  <main>
    <section>
      <div class="container">

        <h1 class="section-title"><?= $paginaInfo['nome'] ?></h1>
        <p><?= $paginaInfo['descricao'] ?></p>
        <p><?= $categoria ?></p>
        <img src="/assets/img/img-anunciante/<?= $paginaInfo['imgPerfil'] ?>" alt="<?= $paginaInfo['nome'] ?>">
        
      </div>
    </section>
  </main>
  

  <?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/footer.html';
  ?>
  
</body>
</html>