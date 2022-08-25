
<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/conexao.php';
  session_start();
  // if (isset($_SESSION['email'])) {
  //   echo $_SESSION['email'];
  // } else {
  //   echo "BURRO";
  // }
?>

<!DOCTYPE html>
<html lang="pt-br">
  
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Página Azul | HOME</title>
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
      include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/header.html';
    ?>

    <!-- MAIN -->
    <main>
      <!-- HERO -->
      <div class="container">
        <section class="hero">
          <div class="search">
            <div class="search__wrapper">
              <a href="index.php">
                <img src="/assets/img/logos/logomarca.png" alt="Página Azul" class="logo" />
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
            $destaquesQuery = $conexao -> prepare("SELECT nome, imgAnuncioG FROM anunciante WHERE idPlano = 3");
            $destaquesQuery -> execute() ;
            
            
            // Looping para adicionar cada anuncio a um só array
            while ($array = $destaquesQuery->fetch(PDO::FETCH_ASSOC)) {
              
              $destaquesArray[] = $array;
              
            }

            // Função que reorganiza o array de forma aleatória
            shuffle($destaquesArray);

            // Gera as imagens de destaque
            for ($x = 0; $x < 4; $x++) {
            ?>

              <div class='destaques__grid-item'>
                <a href='/p/anunciante.php?anunciante=<?= $destaquesArray[$x]["nome"]; ?>' class='link-wrapper'>
                  <img src='/assets/img/img-anunciante/<?= $destaquesArray[$x]["imgAnuncioG"]; ?>'
                      alt='<?= $destaquesArray[$x]["nome"]; ?>'
                      title='<?= $destaquesArray[$x]["nome"]; ?>'
                      draggable="false"
                      class='destaques__img'
                  />
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
            <button type="button" class="scroller__btn left rounded" data-control="left">
              <i class="fa-solid fa-arrow-left"></i>
            </button>
            <div class="scroller" data-slide>

            <?php
            // Usar para visualizar um array:
            // echo '<pre>'; print_r($anuncios); echo '</pre>';

            // Faz o SELECT no BD e executa
            $mediosQuery = $conexao->prepare("SELECT nome, imgAnuncioP FROM anunciante WHERE idPlano >= 2");
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
              <div class='scroller__item'>
                <a href='/p/anunciante.php?anunciante=<?= $mediosArray[$x]["nome"]; ?>' class='link-wrapper'>
                <div class="scroller__img-container">
                  <img src='assets/img/img-anunciante/<?php echo $mediosArray[$x]["imgAnuncioP"]; ?>'
                      alt='<?php echo $mediosArray[$x]["nome"]; ?>'
                      title='<?php echo $mediosArray[$x]["nome"]; ?>'
                      class='scroller__img'
                      draggable="false"
                  />
                </div>
                </a>
              </div>

            <?php
            }
            ?>
            </div>

            <button type="button" class="scroller__btn right rounded" data-control="right">
              <i class="fa-solid fa-arrow-right"></i>
            </button>
          </div>
        </div>
      </section>

      <!-- CATEGORIAS -->
      <section class="categorias" id="categorias">
        <div class="container">
          <h1 class="section-title text-center">Categorias</h1>
          <div class="slider">
            <button type="button" class="scroller__btn left rounded" data-control="left">
              <i class="fa-solid fa-arrow-left"></i>
            </button>

            <div class="scroller scroller--sm" data-slide>
            <?php
            // Looping para gerar as imagens da seção categorias 
            for ($x=0; $x<30; $x++) {
              ?>

              <div class="scroller__item rounded">
                <a href="#" class="link__wrapper">
                  <img src="https://picsum.photos/150/150?random=<?php echo $x; ?>" alt="" class="rounded" draggable="false" />
                </a>
              </div>

              <?php
            }
            ?>
            </div> 

            <button type="button" class="scroller__btn right rounded" data-control="right">
              <i class="fa-solid fa-arrow-right"></i>
            </button>
          </div>
        </div>
      </section>
    </main>

    <a href="#" class="back-to-top rounded">
      <i class="fa-solid fa-arrow-up"></i>
    </a>


    <?php
      include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/footer.html';
    ?>

  </body>

</html>