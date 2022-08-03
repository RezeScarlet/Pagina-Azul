<?php

// Conexão com BD
require_once 'assets/php/conexao.php';

// Link do arquivo php principal
require_once 'assets/php/main.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
  
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Favcon -->
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- CSS E JS -->
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/components.css" />
    <script src="assets/js/main.js" defer></script>
    <title>Página Azul | HOME</title>
  </head>
  
  <body>
  <!-- HEADER -->
  <?php
  include_once 'assets/html/header.html';
  ?>

  <!-- MAIN -->
  <main>
    <!-- HERO -->
    <div class="container">
      <section class="hero">
        <div class="search">
          <div class="search__wrapper">
            <a href="index.php">
              <img src="assets/img/logo-marca.png" alt="Página Azul" class="logo" />
            </a>
            <p class="subheading">Tudo ao seu alcance, em um só lugar</p>
            <form action="#" method="post" class="search__form">
              <input class="search__bar" type="search" name="searchbar" id="searchbar" placeholder="Encontre o que precisa" />
              <input class="btn" type="submit" value="Pesquisar" />
            </form>
          </div>
        </div>
      </section>
    </div>

    <!-- DESTAQUES -->
    <section class="destaques" id="destaques">
      <div class="container">
        <h1 class="section-title">Nossos Destaques</h1>
        <div class="destaques__grid">

          <?php
          // Usar para visualizar um array:
          // echo '<pre>'; print_r($anuncios); echo '</pre>';

          // Faz o SELECT no BD e executa
          $destaquesQuery = $conexao -> prepare("SELECT * FROM anuncio WHERE idPlano = 2 OR idPlano = 3");
          $destaquesQuery -> execute() ;
          
          
          // Looping para adicionar cada anuncio a um só array
          while ($array = $destaquesQuery->fetch(PDO::FETCH_ASSOC)) {
            
            $destaquesArray[] = $array;
            
          }

          // Função que reorganiza o array de forma aleatória
          shuffle($destaquesArray);

          // Gera as imagens
          for ($x = 0; $x < 4; $x++) {
          ?>

            <div class='destaques__grid-item'>
              <a href='#' class='link-wrapper'>
                <img src='<?php echo $destaquesArray[$x]["imagem"]; ?>'
                     alt='<?php echo $destaquesArray[$x]["nome"]; ?>'
                     title='<?php echo $destaquesArray[$x]["nome"]; ?>'
                     draggable="false"
                     class='destaques__img'
                     style='width: 592px;
                           height: 338px;' />
              </a>
            </div>

          <?php
          }
          ?>

        </div>
      </div>
    </section>

    <!-- MEDIOS -->
    <section class="medios" id="medios">
      <div class="container">
        <h1 class="section-title">Scroll Horizontal</h1>
        <div class="slider">
          <button type="button" class="scroll__btn left rounded" data-control="left">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
          </button>
          <div class="scroll-horizontal" data-slide>

          <?php
          // Usar para visualizar um array:
          // echo '<pre>'; print_r($anuncios); echo '</pre>';

          // Faz o SELECT no BD e executa
          $mediosQuery = $conexao->prepare("SELECT * FROM anuncio WHERE idPlano = 1 OR idPlano = 3");
          $mediosQuery->execute();

          // Looping para adicionar cada anuncio a um só array
          while ($array = $mediosQuery->fetch(PDO::FETCH_ASSOC)) {
            
            $mediosArray[] = $array;

          }

          // Função que reorganiza o array de forma aleatória
          shuffle($mediosArray);

          // Mostra o item do scroll horizontal
          for ($x = 0; $x < 7; $x++) {
          ?>

            <div class='scroll__item'>
              <a href='#' class='link-wrapper'>
               <div class="scroll__img-container">
                <img src='<?php echo $mediosArray[$x]["imagemP"]; ?>'
                     alt='<?php echo $mediosArray[$x]["nome"]; ?>'
                     title='<?php echo $mediosArray[$x]["nome"]; ?>'
                     class='scroll__img'
                     draggable="false"
                     style='width: 268px;
                            height: 268px;' />
               </div>
              </a>
            </div>

          <?php
          }
          ?>
          </div>

          <button type="button" class="scroll__btn right rounded" data-control="right">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
          </button>
        </div>
      </div>
    </section>

    <!-- CATEGORIAS -->
    <section class="categorias" id="categorias">
      <div class="container">
        <h1 class="section-title text-center">Categorias</h1>
        <div class="slider">
          <button type="button" class="scroll__btn left rounded" data-control="left">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
          </button>

          <div class="scroll-horizontal scroll-horizontal--sm" data-slide>
          <?php

          for ($x=0; $x<30; $x++) {
            ?>

            <div class="scroll__item rounded">
              <a href="#" class="link__wrapper">
                <img src="https://picsum.photos/150/150?random=<?php echo $x; ?>" alt="" class="rounded" draggable="false" />
              </a>
            </div>

            <?php
          }
          ?>
          </div> 

          <button type="button" class="scroll__btn right rounded" data-control="right">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
          </button>
        </div>
      </div>
    </section>
  </main>

  <!-- FOOTER -->
  <footer>
    <div class="container"><br /><br /><br /><br /></div>
  </footer>

  <a href="#" class="back-to-top rounded">
    <i class="fa fa-arrow-up" aria-hidden="true"></i>
  </a>
</body>

</html>