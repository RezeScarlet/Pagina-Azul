<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/conexao.php';

$anunciante = $_GET['anunciante'];

$paginaQuery = $conexao->prepare("SELECT * FROM anunciante WHERE nome = '$anunciante'");
$paginaQuery->execute();
$paginaInfo = $paginaQuery->fetch(PDO::FETCH_ASSOC);

$categoriaQuery = $conexao->prepare("SELECT nome FROM categorias WHERE idCategoria = '$paginaInfo[idCategoria]'");
$categoriaQuery->execute();
$categoria = $categoriaQuery->fetch(PDO::FETCH_ASSOC);
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
  include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.html';
  ?>

  <main>
    <section class="full-size">
      <div class="container">

        <h1 class="section-title"><?= $paginaInfo['nome'] ?></h1>
        <p><?= $paginaInfo['idAnunciante'] ?></p>
        <p><?= $paginaInfo['CNPJ'] ?></p>
        <p><?= $paginaInfo['email'] ?></p>
        <p><?= $paginaInfo['idPlano'] ?></p>
        <p><?= $categoria ?></p>
        <?php
        $descricao = substr($paginaInfo['descricao'], 0, strpos($paginaInfo['descricao'], "§"));
        ?>
        <p><?= $descricao ?></p>
        <p><?= $paginaInfo['facebook'] ?></p>
        <p><?= $paginaInfo['instagram'] ?></p>
        <p><?= $paginaInfo['telefone'] ?></p>
        <p><?= $paginaInfo['celular'] ?></p>
        <p><?= $paginaInfo['whatsapp'] ?></p>
        <p><?= $paginaInfo['rua'] ?></p>
        <p><?= $paginaInfo['numero'] ?></p>
        <p><?= $paginaInfo['bairro'] ?></p>
        <p><?= $paginaInfo['cidade'] ?></p>
        <p><?= $paginaInfo['estado'] ?></p>
        <p><?= $paginaInfo['CEP'] ?></p>
        <img src="/assets/img/img-anunciante/<?= $paginaInfo['imgAnuncioG'] ?>" alt="<?= $paginaInfo['nome'] ?>">
        <img src="/assets/img/img-anunciante/<?= $paginaInfo['imgAnuncioP'] ?>" alt="<?= $paginaInfo['nome'] ?>">


        <?php
          if ($paginaInfo['idPlano'] == 1) {
        ?>
        <section class="medios" id="medios">
          <div class="container">
            <h1 class="section-title">Veja também</h1>
            <?php

              include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/include/scroller.php';

            ?>
          </div>
        </section>
        <?php
          }
        ?>

      </div>
    </section>
  </main>

  <a href="#" class="back-to-top">
    <i class="fa-solid fa-arrow-up"></i>
  </a>


  <?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.html';
  ?>

</body>

</html>