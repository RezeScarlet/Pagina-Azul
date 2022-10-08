<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/conexao.php';

$anunciante = $_GET['anunciante'];

$paginaQuery = $conexao->prepare("SELECT * FROM anunciante WHERE nome = '$anunciante'");
$paginaQuery->execute();
$paginaInfo = $paginaQuery->fetch(PDO::FETCH_ASSOC);
$descricao = substr($paginaInfo['descricao'], 0, strpos($paginaInfo['descricao'], "§"));

$categoriaQuery = $conexao->prepare("SELECT nome, icone FROM categorias WHERE idCategoria = '$paginaInfo[idCategoria]'");
$categoriaQuery->execute();
$categoria = $categoriaQuery->fetch(PDO::FETCH_ASSOC);

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
      <div class="container--sm">

        <div class="anunciante">
          <div class="anunciante__header">
            <h1 class="section-title"><?= $paginaInfo['nome'] ?></h1>
            <a href="busca?q=<?= $categoria['nome'] ?>" class="link-wrapper icon-wrapper--sm" title="<?= $categoria['nome'] ?>">
              <img src="/assets/img/icones-categorias/<?= $categoria['icone'] ?>" alt="<?= $categoria['nome'] ?>">
            </a>
          </div>

          <div class="anunciante__wrapper">
            <div class="anunciante__section">
              <img class="anunciante__img" src="/assets/img/img-anunciante/<?= $paginaInfo['imgAnuncioG'] ?>" alt="<?= $paginaInfo['nome'] ?>">
              <div class="info text-center">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> 
                <strong>Website: </strong>
                <a href="#" target="_blank">placeholdersite.com.br</a>
              </div>
            </div>
            <div class="anunciante__section">
              <h2>Contato</h2>
              <div class="anunciante__contato">
                <div class="info">
                  <i class="fa-solid fa-phone"></i>
                  <strong>Telefone: </strong>
                  <a href="tel: +55<?= $paginaInfo['telefone'] ?>" title="Ligar"><?= $paginaInfo['telefone'] ?></a>
                </div>
                <div class="info">
                  <i class="fa-solid fa-mobile-screen"></i>
                  <strong>Celular: </strong>
                  <a href="tel: +55<?= $paginaInfo['celular'] ?>" title="Ligar"><?= $paginaInfo['celular'] ?></a>
                </div>
                <div class="info">
                  <i class="fa-solid fa-envelope"></i>
                  <strong>E-mail: </strong>
                  <a href="mailto: <?= $paginaInfo['email'] ?>" title="Enviar e-mail"><?= $paginaInfo['email'] ?></a>
                </div>
              </div>

              <h2>Redes Sociais</h2>
              <div class="anunciante__social">
                <a class="icon-wrapper--sm icon-wrapper--facebook" href="https://<?= $paginaInfo['facebook'] ?>" target="_blank">
                  <img src="/assets/img/icones-social/facebook-f.svg" alt="Facebook">
                </a>
                <a class="icon-wrapper--sm icon-wrapper--instagram" href="https://<?= $paginaInfo['instagram'] ?>" target="_blank">
                  <img src="/assets/img/icones-social/instagram.svg" alt="Instagram">
                </a>
                <a class="icon-wrapper--sm icon-wrapper--whatsapp" href="https://api.whatsapp.com/send?phone=55<?= $paginaInfo['whatsapp'] ?>&text=Converse%20com%20<?=$paginaInfo['nome']?>%20no%20WhatsApp" target="_blank">
                  <img src="/assets/img/icones-social/whatsapp.svg" alt="Whatsapp">
                </a>
              </div>
            </div>

            <div class="anunciante__section">
              <h2>Descrição</h2>
              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod eius debitis velit veniam vitae eligendi animi veritatis facilis libero officia dolorem facere minus aut exercitationem error quisquam, ipsam itaque ducimus consequatur est dolor tenetur quas ab saepe! Placeat, reprehenderit distinctio.</p>
            </div>

            <div class="anunciante__section">
              <h2>Endereço</h2>
              <p><?= $paginaInfo['rua'] ?>, <?= $paginaInfo['numero'] ?></p>
              <p><?= $paginaInfo['bairro'] ?></p>
              <p><?= $paginaInfo['cidade'] ?> - <?=  $paginaInfo['estado'] ?></p>
            </div>
          </div>
        </div>


        <div class="medios" id="medios">
            <h1 class="section-title">Veja também</h1>
            <?php

              include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/include/scroller.php';

            ?>
        </div>


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