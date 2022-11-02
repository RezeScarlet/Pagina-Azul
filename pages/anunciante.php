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

if ($paginaInfo['idCidade']){
$cidadeQuery = $conexao->prepare("SELECT * FROM cidades WHERE idCidade = ". $paginaInfo['idCidade']);
$cidadeQuery -> execute();
$cidadeArray = $cidadeQuery->fetch(PDO::FETCH_ASSOC);
}
$categoriaQuery = $conexao->prepare("SELECT nome, icone FROM categorias WHERE idCategoria = ". $paginaInfo['idCategoria']);
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
            <!-- CATEGORIA DO ANUNCIANTE -->
            <a href="busca?q=<?= $categoria['nome'] ?>" class="link-wrapper icon-wrapper--sm" title="<?= $categoria['nome'] ?>">
              <img src="/assets/img/icones-categorias/<?= $categoria['icone'] ?>" alt="<?= $categoria['nome'] ?>">
            </a>

            <!-- NOME DO ANUNCIANTE -->
            <h1 class="section-title"><?= $paginaInfo['nome'] ?></h1>
          </div>

          <div class="anunciante__wrapper">
            <div>
              <!-- IMAGEM DO ANUNCIANTE -->
              <img class="display-img" src="/assets/img/img-anunciante/<?= $paginaInfo['imgAnuncioG'] ?>" alt="<?= $paginaInfo['nome'] ?>">

              <!-- WEBSITE -->
              <?php
              if ($paginaInfo['website']) {
              ?>
                <div class="info text-center mt-2">
                  <i class="info__icon fa-solid fa-arrow-up-right-from-square"></i>
                  <span class="info__title">Website: </span>
                  <a class="info__content" href="<?= $paginaInfo['website']  ?>" target="_blank"><?= $paginaInfo['website']  ?></a>
                </div>
              <?php } ?>
            </div>

            <!-- CONTATO -->
            <div class="anunciante__contact">
              <h2 class="subsection-title underlined">Contato</h2>
              <ul class="list-unstyled">

                <!-- TELEFONE -->
                <?php
                if ($paginaInfo['telefone']) {
                ?>
                  <li class="info mb-1">
                    <i class="info__icon fa-solid fa-phone"></i>
                    <span class="info__title">Telefone: </span>
                    <a class="info__content" href="tel: +55<?= $paginaInfo['telefone'] ?>" title="Ligar"><?= $paginaInfo['telefone'] ?></a>
                  </li>
                <?php } ?>

                <!-- CELULAR -->
                <?php
                if ($paginaInfo['celular']) {
                ?>
                  <li class="info mb-1">
                    <i class="info__icon fa-solid fa-mobile-screen"></i>
                    <span class="info__title">Celular: </span>
                    <a class="info__content" href="tel: +55<?= $paginaInfo['celular'] ?>" title="Ligar" data-format="mobile-phone"><?= $paginaInfo['celular'] ?></a>
                  </li>
                <?php } ?>

                <!-- E-MAIL -->
                <li class="info">
                  <i class="info__icon fa-solid fa-envelope"></i>
                  <span class="info__title">E-mail: </span>
                  <a class="info__content" href="mailto: <?= $paginaInfo['email'] ?>" title="Enviar e-mail"><?= $paginaInfo['email'] ?></a>
                </li>
              </ul>
            </div>

            <!-- REDES SOCIAIS -->
            <?php
            if ($paginaInfo['facebook'] || $paginaInfo['instagram'] || $paginaInfo['whatsapp']) {
            ?>
              <div class="anunciante__social">
                <h2 class="subsection-title underlined">Redes Sociais</h2>
                <ul class="anunciante__social-wrapper list-unstyled">

                  <!-- FACEBOOK -->
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

                  <!-- INSTAGRAM -->
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

                  <!-- WHATSAPP -->
                  <?php
                  if ($paginaInfo['whatsapp']) {
                  ?>
                    <li>
                      <a class="icon-wrapper--sm icon-wrapper--whatsapp" href="https://api.whatsapp.com/send?phone=55<?= $paginaInfo['whatsapp'] ?>&text=Olá!%20Tenho%20interesse%20em%20seus%20serviços" title="Whatsapp" target="_blank">
                        <img src="/assets/img/icones-social/whatsapp.svg" alt="Whatsapp">
                      </a>
                    </li>
                  <?php
                  }
                  ?>

                </ul>
              </div>
            <?php } ?>

            <!-- DESCRIÇÃO -->
            <?php
            if ($descricao && $descricao != ' ') {
            ?>
              <div class="anunciante__description">
                <h2 class="subsection-title underlined">Sobre a empresa</h2>
                <p><?= $descricao ?></p>
              </div>
            <?php } ?>

            <!-- ENDEREÇO -->
            <?php
            if ($paginaInfo['idCidade']) {
            ?>
              <div class="anunciante__address">
                <h2 class="subsection-title underlined">Endereço</h2>
                <div class="anunciante__address-wrapper">
                  <i class="info__icon mt-2 fa-solid fa-location-dot"></i>

                  <div>

                    <?php
                    if ($paginaInfo['rua'] && $paginaInfo['bairro'] && $paginaInfo['numero'] && $paginaInfo['CEP']) {
                    ?>
                      <!-- RUA E NÚMERO -->
                      <p class="text-bold"><?= $paginaInfo['rua'] ?>, <?= $paginaInfo['numero'] ?></p>

                      <!-- BAIRRO -->
                      <p class="mb-1"><?= $paginaInfo['bairro'] ?></p>
                    <?php } ?>

                    <!-- CIDADE -->
                    <p class="text-sm"><?= $cidadeArray['nome'] ?> - <?= $cidadeArray['estado'] ?></p>
                  </div>
                </div>
              </div>
            <?php } ?>


          </div>
        </div>

        <!-- SCROLLER -->
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