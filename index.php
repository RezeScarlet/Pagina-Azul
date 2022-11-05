<?php
  require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Página Azul | Tudo ao seu alcance, em um só lugar </title>
  <!-- FAVICON -->
  <link rel="shortcut icon" href="/assets/img/logos/logo.png" type="image/x-icon">
  <!-- FONT AWESOME -->
  <script src="https://kit.fontawesome.com/d80615c6de.js" crossorigin="anonymous"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="/assets/css/main.css">
  <!-- JavaScript -->
  <script src="/assets/js/main.js" defer></script>
</head>

<body id="home">

  <?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.html';
  ?>

  <!-- MAIN -->
  <main>
    <!-- HERO -->
    <div class="container--sm">
      <section class="hero">

        <!-- PESQUISA -->
        <div class="search">
          <div class="search__wrapper">
            <a href="/">
              <img src="/assets/img/logos/logomarca.png" alt="Página Azul" class="logo" />
            </a>
            <p class="subtitle">Tudo ao seu alcance, em um só lugar</p>
            <form action="/busca" method="get" class="search__form" id="search-form">
            
              <!-- SELECT -->
              <?php
                include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/include/select.php";
              ?>

              <!-- SEARCH BAR -->
              <div class="search__bar-wrapper">
                <input class="search__bar" type="search" name="q" id="pesquisa" placeholder="Digite o que precisa" value="<?php if (isset($_GET["q"])) { echo $_GET["q"]; } ?>">
                <button class="search__btn btn--dark" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>

    <!-- DESTAQUES -->
    <section class="destaques" id="destaques">
      <div class="container">
        <h1 class="section-title mb-4">Nossos Destaques</h1>

        <?php
        include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/include/destaques.php';
        ?>

      </div>
      </div>
    </section>

    <!-- MEDIOS -->
    <section class="medios" id="medios">
      <div class="container">
        <h1 class="section-title mb-4">Veja Também</h1>
        
          <?php 
            include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/include/scroller.php';
          ?>

      </div>
    </section>

    <!-- CATEGORIAS -->
    <section class="categorias" id="categorias">
      <div class="container">
        <h1 class="section-title text-center mb-5">Categorias</h1>
        
          <?php 
            include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/include/scroller-categorias.php';
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