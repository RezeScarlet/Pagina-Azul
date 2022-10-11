<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Azul | Serviços</title>
  <!-- FAVICON -->
  <link rel="shortcut icon" href="/assets/img/logos/logo.png" type="image/x-icon">
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

  <main>
    <section class="planos full-size">
      <div class="container">
        <h1 class="section-title text-center">Nossos Planos</h1>

        <div class="cards-container mt-10">
          <div class="card--gratuito">
            <h2 class="card__title text-center">Gratuito</h2>
            
            <div class="card__price">
              <span class="currency">R$</span>
              <span class="real">00</span><span class="cents">,00</span>
            </div>

            <ul class="card__list">
              <li class="card__list-item positive">
                <span>Lorem, ipsum.</span>
                <i class="fa-solid fa-check"></i>
              </li>
              <li class="card__list-item positive">
                <span>Lorem ipsum dolor.</span>
                <i class="fa-solid fa-check"></i>
              </li>
              <li class="card__list-item negative">
                <span>Lorem ipsum dolor sit amet.</span>
                <i class="fa-solid fa-xmark"></i>
              </li>
              <li class="card__list-item negative">
                <span>Lorem ipsum dolor sit amet consectetur.</span>
                <i class="fa-solid fa-xmark"></i>
              </li>
            </ul>

            <a href="#" class="btn btn-purchase">Adquirir</a>
          </div>


          <div class="card--medio">
            <h2 class="card__title text-center">Médio</h2>

            <div class="card__price">
              <span class="currency">R$</span>
              <span class="real">50</span><span class="cents">,00</span>
            </div>

            <ul class="card__list">
              <li class="card__list-item positive">
                <span>Lorem, ipsum.</span>
                <i class="fa-solid fa-check"></i>
              </li>
              <li class="card__list-item positive">
                <span>Lorem ipsum dolor.</span>
                <i class="fa-solid fa-check"></i>
              </li>
              <li class="card__list-item positive">
                <span>Lorem ipsum dolor sit amet.</span>
                <i class="fa-solid fa-check"></i>
              </li>
              <li class="card__list-item negative">
                <span>Lorem ipsum dolor sit amet consectetur.</span>
                <i class="fa-solid fa-xmark"></i>
              </li>
            </ul>

            <a href="#" class="btn btn-purchase">Adquirir</a>
          </div>


          <div class="card--destaque">
            <h2 class="card__title text-center">Destaque</h2>

            <div class="card__price">
              <span class="currency">R$</span>
              <span class="real">100</span><span class="cents">,00</span>
            </div>

            <ul class="card__list">
              <li class="card__list-item positive">
                <span>Lorem, ipsum.</span>
                <i class="fa-solid fa-check"></i>
              </li>
              <li class="card__list-item positive">
                <span>Lorem ipsum dolor.</span>
                <i class="fa-solid fa-check"></i>
              </li>
              <li class="card__list-item positive">
                <span>Lorem ipsum dolor sit amet.</span>
                <i class="fa-solid fa-check"></i>
              </li>
              <li class="card__list-item positive">
                <span>Lorem ipsum dolor sit amet consectetur.</span>
                <i class="fa-solid fa-check"></i>
              </li>
            </ul>
            
            <a href="#" class="btn btn-purchase">Adquirir</a>
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