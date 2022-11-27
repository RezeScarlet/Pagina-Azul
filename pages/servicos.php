<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Serviços | Página Azul</title>
  <!-- FAVICON -->
  <link rel="shortcut icon" href="/assets/img/logos/favicon.ico" type="image/x-icon">
  <!-- FONT AWESOME -->
  <script src="https://kit.fontawesome.com/d80615c6de.js" crossorigin="anonymous"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="/assets/css/main.css">
  <!-- JavaScript -->
  <script src="/assets/js/main.js" defer></script>
</head>
<body id="serviços">

  <?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/header.html';
  ?>

  <main id="main">
    <section class="planos full-size">
      <div class="container">
        <h1 class="section-title text-center mb-9">Nossos Planos</h1>

        <div class="cards-container">
          <div class="card--gratuito">
            <h2 class="card__title text-center">Gratuito</h2>
            
            <div class="card__price">
              <span class="currency">R$</span>
              <span class="real">00</span>/mês
            </div>

            <ul class="card__list">
              <li class="card__list-item--positive">
                <span>Registro no site</span>
                <i class="fa-solid fa-check"></i>
              </li>
              <li class="card__list-item--positive">
                <span>Página própria</span>
                <i class="fa-solid fa-check"></i>
              </li>
              <li class="card__list-item--negative">
                <span>Prioridade em resultados de buscas</span>
                <i class="fa-solid fa-xmark"></i>
              </li>
              <li class="card__list-item--negative">
                <span>Presença no carrossel de imagens</span>
                <i class="fa-solid fa-xmark"></i>
              </li>
              <li class="card__list-item--negative">
                <span>Presença na página inicial</span>
                <i class="fa-solid fa-xmark"></i>
              </li>
            </ul>

            <a href="/contato?plano=gratuito" class="btn btn-purchase">Adquirir</a>
          </div>


          <div class="card--medio">
            <h2 class="card__title text-center">Médio</h2>

            <div class="card__price">
              <span class="currency">R$</span>
              <span class="real">25</span>/mês
            </div>

            <ul class="card__list">
              <li class="card__list-item--positive">
                <span>Registro no site</span>
                <i class="fa-solid fa-check"></i>
              </li>
              <li class="card__list-item--positive">
                <span>Página própria</span>
                <i class="fa-solid fa-check"></i>
              </li>
              <li class="card__list-item--positive">
                <span>Prioridade em resultados de buscas</span>
                <i class="fa-solid fa-check"></i>
              </li>
              <li class="card__list-item--positive">
                <span>Presença no carrossel de imagens</span>
                <i class="fa-solid fa-check"></i>
              </li>
              <li class="card__list-item--negative">
                <span>Presença na página inicial</span>
                <i class="fa-solid fa-xmark"></i>
              </li>
            </ul>

            <a href="/contato?plano=medio" class="btn btn-purchase">Adquirir</a>
          </div>


          <div class="card--destaque">
            <h2 class="card__title text-center">Destaque</h2>

            <div class="card__price">
              <span class="currency">R$</span>
              <span class="real">50</span>/mês
            </div>

            <ul class="card__list">
              <li class="card__list-item--positive">
                <span>Registro no site</span>
                <i class="fa-solid fa-check"></i>
              </li>
              <li class="card__list-item--positive">
                <span>Página própria</span>
                <i class="fa-solid fa-check"></i>
              </li>
              <li class="card__list-item--positive">
                <span>Prioridade em resultados de buscas</span>
                <i class="fa-solid fa-check"></i>
              </li>
              <li class="card__list-item--positive">
                <span>Presença no carrossel de imagens</span>
                <i class="fa-solid fa-check"></i>
              </li>
              <li class="card__list-item--positive">
                <span>Presença na página inicial</span>
                <i class="fa-solid fa-check"></i>
              </li>
            </ul>
            
            <a href="/contato?plano=destaque" class="btn btn-purchase">Adquirir</a>
          </div>
        </div>
      </div>
    </section>
  </main>

  <a href="#" class="back-to-top">
      <i class="fa-solid fa-arrow-up"></i>
  </a>

  <?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/footer.html';
  ?>

</body>
</html>