<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/conexao.php';

$anunciante = $_GET['anunciante'];

$paginaQuery = $conexao->prepare("SELECT * FROM anunciante WHERE nome = '$anunciante'");
$paginaQuery->execute();
$paginaInfo = $paginaQuery->fetch(PDO::FETCH_ASSOC);
if (strpos($paginaInfo['descricao'], "§")) {
  $descricao = substr($paginaInfo['descricao'], 0, strpos($paginaInfo['descricao'], "§"));
} else {
  $descricao = $paginaInfo['descricao'];
}
$categoriaQuery = $conexao->prepare("SELECT nome, icone FROM categorias WHERE idCategoria = '$paginaInfo[idCategoria]'");
$categoriaQuery->execute();
$categoria = $categoriaQuery->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $paginaInfo['nome'] ?> | Página Azul</title>
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
            <a href="busca?q=<?= $categoria['nome'] ?>" class="link-wrapper icon-wrapper--sm" title="<?= $categoria['nome'] ?>">
              <img src="/assets/img/icones-categorias/<?= $categoria['icone'] ?>" alt="<?= $categoria['nome'] ?>">
            </a>
            <h1 class="section-title"><?= $paginaInfo['nome'] ?></h1>
          </div>

          <div class="anunciante__wrapper">
            <div>
              <img class="display-img" src="/assets/img/img-anunciante/<?= $paginaInfo['imgAnuncioG'] ?>" alt="<?= $paginaInfo['nome'] ?>">

              <?php
              if ($paginaInfo['website']) {
              ?>
                <div class="info text-center mt-2">
                  <i class="info__icon fa-solid fa-arrow-up-right-from-square"></i>
                  <span class="info__title">Website: </span>
                  <a class="info__content" href="https://<?= $paginaInfo['website']  ?>" target="_blank"><?= $paginaInfo['website']  ?></a>
                </div>
              <?php } ?>
            </div>

            <div class="anunciante__contact">
              <h2 class="subsection-title">Contato</h2>
              <ul class="list-unstyled">

                <?php
                if ($paginaInfo['telefone']) {
                ?>
                  <li class="info mb-1">
                    <i class="info__icon fa-solid fa-phone"></i>
                    <span class="info__title">Telefone: </span>
                    <a class="info__content" href="tel: +55<?= $paginaInfo['telefone'] ?>" title="Ligar"><?= $paginaInfo['telefone'] ?></a>
                  </li>
                <?php } ?>

                <?php
                if ($paginaInfo['celular']) {
                ?>
                  <li class="info mb-1">
                    <i class="info__icon fa-solid fa-mobile-screen"></i>
                    <span class="info__title">Celular: </span>
                    <a class="info__content" href="tel: +55<?= $paginaInfo['celular'] ?>" title="Ligar" data-format="mobile-phone"><?= $paginaInfo['celular'] ?></a>
                  </li>
                <?php } ?>


                <li class="info">
                  <i class="info__icon fa-solid fa-envelope"></i>
                  <span class="info__title">E-mail: </span>
                  <a class="info__content" href="mailto: <?= $paginaInfo['email'] ?>" title="Enviar e-mail"><?= $paginaInfo['email'] ?></a>
                </li>
              </ul>
            </div>


            <?php
            if ($paginaInfo['facebook'] || $paginaInfo['instagram'] || $paginaInfo['whatsapp']) {
            ?>
              <div class="anunciante__social">
                <h2 class="subsection-title">Redes Sociais</h2>
                <ul class="anunciante__social-wrapper list-unstyled">

                  <?php
                    if ($paginaInfo['facebook']) {
                  ?>
                    <li>
                      <a class="icon-wrapper--sm icon-wrapper--facebook" href="https://<?= $paginaInfo['facebook'] ?>" title="Facebook" target="_blank">
                        <img src="/assets/img/icones-social/facebook-f.svg" alt="Facebook">
                      </a>
                    </li>
                  <?php
                    }
                  ?>

                  <?php
                    if ($paginaInfo['instagram']) {
                  ?>
                    <li>
                      <a class="icon-wrapper--sm icon-wrapper--instagram" href="https://<?= $paginaInfo['instagram'] ?>" title="Instagram" target="_blank">
                        <img src="/assets/img/icones-social/instagram.svg" alt="Instagram">
                      </a>
                    </li>
                  <?php
                    }
                  ?>

                  <?php
                    if ($paginaInfo['whatsapp']) {
                  ?>
                  <li>
                    <a class="icon-wrapper--sm icon-wrapper--whatsapp" href="https://api.whatsapp.com/send?phone=55<?= $paginaInfo['whatsapp'] ?>&text=Converse%20com%20<?= $paginaInfo['nome'] ?>%20no%20WhatsApp" title="Whatsapp" target="_blank">
                      <img src="/assets/img/icones-social/whatsapp.svg" alt="Whatsapp">
                    </a>
                  </li>
                  <?php
                    }
                  ?>

                </ul>
              </div>
            <?php } ?>

            <?php
            if ($descricao && $descricao != ' ') {
            ?>
              <div class="anunciante__description">
                <h2 class="subsection-title">Sobre a empresa</h2>
                <p><?= $descricao ?></p>
              </div>
            <?php } ?>
            <?php
            if ($paginaInfo['cidade'] || $paginaInfo['estado']) {
            ?>
              <div class="anunciante__address">
                <h2 class="subsection-title">Endereço</h2>
                <div class="anunciante__address-wrapper">
                  <i class="info__icon mt-2 fa-solid fa-location-dot"></i>

                  <div>
                    <?php
                    if ($paginaInfo['rua'] && $paginaInfo['bairro'] && $paginaInfo['numero'] && $paginaInfo['CEP']) {
                    ?>
                      <p class="text-bold"><?= $paginaInfo['rua'] ?>, <?= $paginaInfo['numero'] ?></p>
                      <p class="mb-1"><?= $paginaInfo['bairro'] ?></p>
                    <?php } ?> 
                    <p class="text-sm"><?= $paginaInfo['cidade'] ?> - <?= $paginaInfo['estado'] ?></p>
                    </div>
                </div>
              </div>
            <?php } ?>


          </div>
        </div>

        <div class="medios" id="medios">
          <h1 class="section-title mb-4">Veja também</h1>
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