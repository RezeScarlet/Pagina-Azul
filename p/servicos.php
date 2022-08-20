<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Azul | SERVIÇOS</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="../assets/img/logos/logo.png" type="image/x-icon">
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CSS -->
  <link rel="stylesheet" href="../assets/css/main.css">
  <!-- JavaScript -->
  <script src="../assets/js/main.js" defer></script>
</head>
<body id="serviços">

  <?php
    include_once '../assets/include/header.html';
  ?>

  <main>
    <section class="planos">
      <div class="container">
        <h1 class="section-title text-center">Nossos planos</h1>

        <div class="cards-container">
          <div class="card gratuito">
            <h2 class="card__title">Gratuito</h2>
            <div class="card__price">
              <span class="currency">R$</span>
              <span class="real">00</span><span class="cents">,00</span>
            </div>

            <ul class="card__list">
              <li class="card__list-item positive">
                <span>Lorem, ipsum.</span>
                <i class="fa fa-check" aria-hidden="true"></i>
              </li>
              <li class="card__list-item positive">
                <span>Lorem ipsum dolor.</span>
                <i class="fa fa-check" aria-hidden="true"></i>
              </li>
              <li class="card__list-item negative">
                <span>Lorem ipsum dolor sit amet.</span>
                <i class="fa fa-times" aria-hidden="true"></i>
              </li>
              <li class="card__list-item negative">
                <span>Lorem ipsum dolor sit amet consectetur.</span>
                <i class="fa fa-times" aria-hidden="true"></i>
              </li>
            </ul>

            <a href="#" class="btn btn-purchase">Adquirir</a>
          </div>


          <div class="card medio">
            <h2 class="card__title">Médio</h2>

            <div class="card__price">
              <span class="currency">R$</span>
              <span class="real">50</span><span class="cents">,00</span>
            </div>

            <ul class="card__list">
              <li class="card__list-item positive">
                <span>Lorem, ipsum.</span>
                <i class="fa fa-check" aria-hidden="true"></i>
              </li>
              <li class="card__list-item positive">
                <span>Lorem ipsum dolor.</span>
                <i class="fa fa-check" aria-hidden="true"></i>
              </li>
              <li class="card__list-item positive">
                <span>Lorem ipsum dolor sit amet.</span>
                <i class="fa fa-check" aria-hidden="true"></i>
              </li>
              <li class="card__list-item negative">
                <span>Lorem ipsum dolor sit amet consectetur.</span>
                <i class="fa fa-times" aria-hidden="true"></i>
              </li>
            </ul>

            <a href="#" class="btn btn-purchase">Adquirir</a>
          </div>


          <div class="card destaque">
            <h2 class="card__title">Destaque</h2>

            <div class="card__price">
              <span class="currency">R$</span>
              <span class="real">100</span><span class="cents">,00</span>
            </div>

            <ul class="card__list">
              <li class="card__list-item positive">
                <span>Lorem, ipsum.</span>
                <i class="fa fa-check" aria-hidden="true"></i>
              </li>
              <li class="card__list-item positive">
                <span>Lorem ipsum dolor.</span>
                <i class="fa fa-check" aria-hidden="true"></i>
              </li>
              <li class="card__list-item positive">
                <span>Lorem ipsum dolor sit amet.</span>
                <i class="fa fa-check" aria-hidden="true"></i>
              </li>
              <li class="card__list-item positive">
                <span>Lorem ipsum dolor sit amet consectetur.</span>
                <i class="fa fa-check" aria-hidden="true"></i>
              </li>
            </ul>
            
            <a href="#" class="btn btn-purchase">Adquirir</a>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/footer.html';
  ?>

</body>
</html>