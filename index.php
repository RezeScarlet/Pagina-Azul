
<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/conexao.php';
  // session_start();
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
    <title>Página Azul | Home</title>
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
              <p class="subtitle">Tudo ao seu alcance, em um só lugar</p>
              <form action="/pesquisa" method="post" class="search__form">
                <input class="search__bar" type="search" name="search" id="searchbar" placeholder="Encontre o que precisa" />
                <input class="search__btn btn--dark" type="submit" value="Pesquisar" />
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
            while ($row = $destaquesQuery->fetch(PDO::FETCH_ASSOC)) {
              
              $destaquesrow[] = $row;
              
            }

            // Função que reorganiza o array de forma aleatória
            shuffle($destaquesrow);

            // Gera as imagens de destaque
            for ($x = 0; $x < 4; $x++) {
            ?>

              <div class='destaques__grid-item'>
                <a href='/anunciante?anunciante=<?= $destaquesrow[$x]["nome"]; ?>' class='link-wrapper'>
                  <img src='/assets/img/img-anunciante/<?= $destaquesrow[$x]["imgAnuncioG"]; ?>'
                      alt='<?= $destaquesrow[$x]["nome"]; ?>'
                      title='<?= $destaquesrow[$x]["nome"]; ?>'
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
            while ($row = $mediosQuery->fetch(PDO::FETCH_ASSOC)) {
              
              $mediosrow[] = $row;

            }

            // Função que reorganiza o array de forma aleatória
            shuffle($mediosrow);

            // Mostra o item do scroll horizontal
            for ($x = 0; $x < 7; $x++) { 
            ?>
              <div class='scroller__item'>
                <a href='/anunciante?anunciante=<?= $mediosrow[$x]["nome"]; ?>' class='link-wrapper'>
                <div class="scroller__img-container">
                  <img src='assets/img/img-anunciante/<?php echo $mediosrow[$x]["imgAnuncioP"]; ?>'
                      alt='<?php echo $mediosrow[$x]["nome"]; ?>'
                      title='<?php echo $mediosrow[$x]["nome"]; ?>'
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

            $categoriasQuery = $conexao -> prepare("SELECT * FROM categorias");
            $categoriasQuery->execute();

            while ($row = $categoriasQuery -> fetch(PDO::FETCH_ASSOC)){
              ?>

              <!-- <div class="scroller__item">
                <a href="#" class="link__wrapper">
                  <img src="https://picsum.photos/150/150?random=<?php echo $x; ?>" alt="" class="rounded" draggable="false" />
                </a>
              </div> -->

              <div class="scroller__item">
                <a href="#" class="link__wrapper">
                  <div class="scroller__img-container rounded">
                    <img src="/assets/img/icones-categorias/<?= $row['icone'] ?>" alt="<?= $row['nome'] ?>" title="<?= $row['nome'] ?>" draggable="false" />
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

    </main>

    <a href="#" class="back-to-top rounded">
      <i class="fa-solid fa-arrow-up"></i>
    </a>


    <?php
      include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/footer.html';
    ?>

  </body>

</html>