<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/verifyLogin.php';

if (isset($_POST['ID']) && is_numeric($_POST['ID']) && $_POST['ID'] > 0) {
  $id = $_POST['ID'];
  $userQuery = $conexao->prepare("SELECT nome, idAnunciante FROM anunciante WHERE idAnunciante = $id");
  $userQuery->execute();
  $user = $userQuery->fetch(PDO::FETCH_ASSOC);
  if (isset($_POST['confirmar'])) {
    $apagarQuery = $conexao->prepare('DELETE FROM anunciante WHERE idAnunciante = :id');
    $apagarQuery->bindParam(':id', $id);
    $apagarQuery->execute();
    if (!$stmt->rowCount()) {
      echo "Falha ao apagar registro.";
  } else {
    header('location: index.php');
  }}
} else {
  header('location: apagar.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Azul | Admin - Apagar</title>
  <!-- FAVICON -->
  <link rel="shortcut icon" href="/assets/img/logos/favicon.ico" type="image/x-icon">
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

  <main id="main">
    <section id="edit" class="full-size">
      <div class="container">
        <p class="mb-6"><a class="link" href="index.php">Voltar</a></p>

        <h1 class="section-title mb-5">Apagar Informações</h1>

        <form class="form" action="apagar2.php" method="post" enctype="multipart/form-data">
          <div class="form__cols">
            <div class="form__group">
              <label class="form__label" for="confirmar">Você tem certeza que deseja apagar todos os registros da empresa <?= $user['nome'] ?> de ID <?= $user['idAnunciante'] ?>?</label>
              <input class="btn--dark" type="submit" name="confirmar" value="Confirmar">
            </div>

          </div>
        </form>
      </div>
    </section>
  </main>
  <?php

  ?>
  <a href="#" class="back-to-top">
    <i class="fa-solid fa-arrow-up"></i>
  </a>

  <?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.html';
  ?>

</body>

</html>