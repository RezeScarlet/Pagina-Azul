<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/verifyLogin.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Azul | Admin</title>
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

  <main id="main">
    <section class="full-size">
      <div class="container">
        <div class="mb-7">
          <h1 class="section-title">Página de Administradores</h1>
          <div class="info mb-2">
            <i class="info__icon fa-solid fa-user"></i>
            <span class="info__title">Registrado como: </span>
            <span class="info__content"><?= $_SESSION['nome'] ?></span>
          </div>
          <a class="link" href="/assets/php/logout.php">Sair</a>
        </div>

        <ul class="list-unstyled">
          <li class="info mb-4"><i class="info__icon mr-3 fa-solid fa-arrow-right"></i><a class="info__title link" href="cadastro.php">Cadastro de empresa</a></li>
          <li class="info mb-4"><i class="info__icon mr-3 fa-solid fa-arrow-rotate-left"></i><a class="info__title link" href="editar.php">Atualizar registro</a></li>
          <li class="info mb-4"><i class="info__icon mr-3 fa-solid fa-trash"></i><a class="info__title link" href="apagar.php">Apagar registro</a></li>
        </ul>

      </div>
    </section>
  </main>




  <?php

  function getImg($img)
  {

    $img_tmp = $_FILES[$img]["tmp_name"];
    $img_original = $_FILES[$img]["name"];

    $path = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/img-anunciante/";

    $fileExtension = strtolower(pathinfo($img_original, PATHINFO_EXTENSION));

    if (($fileExtension != "jpg") && ($fileExtension != "jpeg") && ($fileExtension != "png")) {
      echo "Imagem invalida";
    } else {

      // echo "Imagem $img_original é válida";
      // Nomeia o arquivo de imagem com a data e hora
      date_default_timezone_set("America/Sao_Paulo");
      $time = date("Ymd") . "_" . date("His");

      $imgName = $time . "." . $fileExtension;
      $img_final = $path . $imgName;


      move_uploaded_file($img_tmp, $img_final);

      return $imgName;
    }
  }

  if (isset($_POST['registrar2'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $idCategoria = $_POST['categoria'];
    $idPlano = $_POST['plano'];

    $imgPerfil = getImg('imgPerfil');
    $imgAnuncioP = getImg('imgAnuncioP');
    $imgAnuncioG = getImg('imgAnuncioG');


    $result = $conexao->prepare("INSERT INTO `anunciante` values (null, :nome, :idPlano, :idCategoria, :descricao, :imgPerfil, :imgAnuncioP, :imgAnuncioG)");

    $result->bindValue(":nome", $nome);
    $result->bindValue(':idPlano', $idPlano);
    $result->bindValue(":idCategoria", $idCategoria);
    $result->bindValue(":descricao", $descricao);
    $result->bindValue(":imgPerfil", $imgPerfil);
    $result->bindValue(":imgAnuncioP", $imgAnuncioP);
    $result->bindValue(":imgAnuncioG", $imgAnuncioG);
    $result->execute();
  }

  if (isset($_POST['registrar'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $login = $conexao->prepare("INSERT INTO `login` VALUES (null, :email, :senha)");

    $login->bindValue(":email", $email);
    $login->bindvalue(":senha", md5($senha));
    $login->execute();
  }
  ?>

  <a href="#" class="back-to-top">
    <i class="fa-solid fa-arrow-up"></i>
  </a>

  <?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.html';
  ?>

</body>

</html>