<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/conexao.php';


// PROCURA PELO ANUNCIANTE
$anunciante = htmlspecialchars($_GET['anunciante']);

$paginaQuery = $conexao->prepare("SELECT * FROM anunciante WHERE slug = :anunciante");
$paginaQuery->bindParam(":anunciante", $anunciante);
$paginaQuery->execute();
$paginaInfo = $paginaQuery->fetch(PDO::FETCH_ASSOC);

// TIRA TAGS DA DESCRIÇÃO
if (strpos($paginaInfo['descricao'], "§")) {

  $descricao = substr($paginaInfo['descricao'], 0, strpos($paginaInfo['descricao'], "§"));

} else {

  $descricao = $paginaInfo['descricao'];
  
}

// PROCURA PELA CIDADE
if ($paginaInfo['idCidade']){

  $cidadeQuery = $conexao->prepare("SELECT * FROM cidades WHERE idCidade = ". $paginaInfo['idCidade']);
  $cidadeQuery -> execute();
  $cidadeArray = $cidadeQuery->fetch(PDO::FETCH_ASSOC);

}

// PROCURA PELA CATEGORIA
$categoriaQuery = $conexao->prepare("SELECT nome, icone FROM categorias WHERE idCategoria = ". $paginaInfo['idCategoria']);
$categoriaQuery->execute();
$categoria = $categoriaQuery->fetch(PDO::FETCH_ASSOC);

// PEGA URL DA PÁGINA 
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {

  $url = "https://";   

} else {

  $url = "http://";   

}   

$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];   

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:title" content="<?= $paginaInfo['nome'] ?> | Página Azul" />
  <meta property="og:image" content="http://paginaazul.epizy.com/assets/img/img-anunciante/<?= $paginaInfo['imgAnuncioG'] ?>" />
  <meta property=”og:description” content="<?= $descricao ?>" />
  <title><?= $paginaInfo['nome'] ?> | Página Azul</title>
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
    <section class="full-size">
      <div class="container--sm">

        <div class="anunciante">

          
          <div class="anunciante__wrapper">
            <div class="anunciante__header">
              <!-- CATEGORIA DO ANUNCIANTE -->
              <a href="/busca?q=<?= $categoria['nome'] ?>" class="link-wrapper icon-wrapper--sm" title="<?= $categoria['nome'] ?>">
                <img src="/assets/img/icones-categorias/<?= $categoria['icone'] ?>" alt="<?= $categoria['nome'] ?>">
              </a>
  
              <!-- NOME DO ANUNCIANTE -->
              <h1 class="section-title"><?= $paginaInfo['nome'] ?></h1>

              <!-- BOTÃO DE COMPARTILHAMENTO -->
              <button type="button" id="share-btn" title="Compartilhar">
                <i class="fa-solid fa-share-nodes"></i>
              </button>
            </div>

            <div class="anunciante__img-site">
              <!-- IMAGEM DO ANUNCIANTE -->
              <img class="display-img" src="/assets/img/img-anunciante/<?= $paginaInfo['imgAnuncioG'] ?>" alt="<?= $paginaInfo['nome'] ?>">

              <?php
              if ($paginaInfo['website']) {
              ?>
                <!-- WEBSITE -->
                <div class="info text-center mt-1">
                  <a class="link-wrapper" href="<?= $paginaInfo['website'] ?>" target="_blank">
                    <i class="info__icon fa-solid fa-arrow-up-right-from-square"></i>
                    <span class="info__title">Visitar website</span>
                  </a>
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
                    <a class="info__content" href="tel: +55<?= $paginaInfo['telefone'] ?>" title="Ligar" data-format="landline"><?= $paginaInfo['telefone'] ?></a>
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

                  <!-- WHATSAPP -->
                  <?php
                  if ($paginaInfo['whatsapp']) { 
                  ?>
                    <li>
                      <a class="icon-wrapper--sm icon-wrapper--whatsapp" href="https://api.whatsapp.com/send?phone=55<?= $paginaInfo['whatsapp'] ?>&text=Olá!%20Tenho%20interesse%20em%20seus%20serviços" title="Chamar no WhatsApp" target="_blank">
                        <img src="/assets/img/icones-social/whatsapp.svg" alt="Whatsapp">
                      </a>
                    </li>
                  <?php
                  }

                  ?>
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
              <div class="anunciante__address">
                <h2 class="subsection-title underlined">Endereço</h2>
                  <?php
                  if ($paginaInfo['idCidade']) {
                  ?>
                    <div class="anunciante__address-wrapper info">
                      <i class="info__icon mt-1 fa-solid fa-location-dot"></i>
                      <div>
                          <!-- RUA E NÚMERO -->
                          <p class="text-bold leading-sm mb-1"><?= $paginaInfo['rua'] ?>, <?= $paginaInfo['numero'] ?></p>

                          <!-- BAIRRO -->
                          <p class="mb-2 leading-sm"><?= $paginaInfo['bairro'] ?></p>

                        <!-- CIDADE -->
                        <p class="text-sm"><?= $cidadeArray['nome'] ?> - <?= $cidadeArray['estado'] ?></p>
                      </div>
                    </div>
                    <?php } else { ?>
                      <div class="info">
                        <i class="info__icon fa-solid fa-globe"></i>
                        <span class="text-bold">Serviço online</span>
                      </div>
                    <?php } ?>
              </div>


          </div>
        </div>

        <!-- SCROLLER -->
        <div class="medios" id="medios">
          <h1 class="section-title mb-4">Veja Também</h1>
          <?php

          include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/include/scroller.php';

          ?>
        </div>

      </div>
    </section>
  </main>

  <!-- OPÇÕES DE COMPARTILHAMENTO -->
  <div class="modal" id="share-options">
    <div class="modal__content">
      <div class="modal__header">
        <h2 class="subsection-title mb-1">Compartilhar</h2>
        <button type="button" class="modal__close-btn" data-modal-close>&#10005;</button>
      </div>
      <div class="modal__body">
        <div class="share mt-4">
          <ul class="share__list list-unstyled">
            <li class="share__item">
              <button data-copy-to-clipboard>
                <i class="fa-regular fa-copy"></i>
                <span>Copiar link</span>
              </button>
            </li>
            <li class="share__item">
              <a href="https://api.whatsapp.com/send?text=<?= $url ?>" target="_blank">
                <i class="fa-brands fa-whatsapp"></i>
                <span>WhatsApp</span>
              </a>
            </li>
            <li class="share__item">
              <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $url ?>" target="_blank">
                <i class="fa-brands fa-facebook"></i>
                <span>Facebook</span>
              </a>
            </li>
            <li class="share__item">
              <a href="https://twitter.com/intent/tweet?text=<?= $url ?>" target="_blank">
                <i class="fa-brands fa-twitter"></i>
                <span>Twitter</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <a href="#" class="back-to-top">
    <i class="fa-solid fa-arrow-up"></i>
  </a>


  <?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.html';
  ?>

</body>

</html>