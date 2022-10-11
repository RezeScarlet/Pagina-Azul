<?php

  require_once $_SERVER['DOCUMENT_ROOT'] . "/assets/php/unaccent.php";
  require_once $_SERVER['DOCUMENT_ROOT'] . "/assets/php/conexao.php";

  if (isset($_GET['q']) && str_replace(" ", "", $_GET["q"]) != '')  {
    $searchConditions = TRUE;
  } else {
    $searchConditions = FALSE;
  }

  // function searchIsValid() {
  //   return isset($_GET['q']) && str_replace(" ", "", $_GET["q"]) != '';
  // }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Azul | Busca <?php if ($searchConditions) echo "por ". $_GET["q"] ?></title>
  <!-- FAVICON -->
  <link rel="shortcut icon" href="/assets/img/logos/logo.png" type="image/x-icon">
  <!-- FONT AWESOME -->
  <script src="https://kit.fontawesome.com/d80615c6de.js" crossorigin="anonymous"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="/assets/css/main.css">
  <!-- JavaScript -->
  <script src="/assets/js/main.js" defer></script>
</head>

<body id="pesquisa">
  <?php
  include_once '../assets/include/header.html';
  ?>


  <main>
    <section class="full-size">
      <div class="container--sm">

        <div class="search">
          <div class="search__wrapper">
            <form action="/busca" method="get" class="search__form" id="search-form">
              <div class="select">
                <input type="text" readonly placeholder="Selecione sua cidade">
              </div>
              <input class="search__bar" type="search" name="q" id="pesquisa" placeholder="Encontre o que precisa" />
              <button class="search__btn btn--dark" type="submit">Buscar <i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
          </div>
        </div>

        <?php
        if ($searchConditions)  {
          $search = $_GET['q'];
          $resultArray = FALSE;

          $categoriaQuery = $conexao->prepare("SELECT idCategoria, nome FROM categorias");
          $categoriaQuery->execute();
          $categoriaArray = $categoriaQuery->fetchAll(PDO::FETCH_ASSOC);

          foreach ($categoriaArray as $x) {
            if (strtolower(unaccent($x['nome'])) == strtolower(unaccent($search))) {
              $resultQuery = $conexao->prepare("SELECT * FROM anunciante WHERE idCategoria = " . $x['idCategoria']. " ORDER BY idPlano DESC");
              $resultQuery->execute();
              $resultArray = $resultQuery->fetchAll(PDO::FETCH_ASSOC);
            }
          }

          if (!$resultArray) {
            $resultQuery = $conexao->prepare("SELECT * FROM anunciante WHERE nome LIKE '%$search%' OR descricao LIKE '%$search%' ORDER BY idPlano DESC");
            $resultQuery->execute();
            $resultArray = $resultQuery->fetchAll(PDO::FETCH_ASSOC);
          }
        ?>

              <?php
              if ($resultArray) {
                
                ?>
          <div class="resultados" id="resultados">
            <h1 class="section-title">Resultados para <em><?= $search ?></em></h1>
            
            <div class="resultados-wrapper">
              
              <?php foreach ($resultArray as $x) { ?>

                  <div class="resultado">
                    <a href='/anunciante?anunciante=<?= $x['nome']; ?>'>
                      <div class="resultado__header">
                        <img class="resultado__img" src="/assets/img/img-anunciante/<?= $x['imgAnuncioP'] ?>" alt="aaaa">
                        <p class="resultado__title"><?= $x['nome']; ?></p>
                      </div>
                    </a>

                    <div class="resultado__time">
                      <span class="info">
                        <i class="info__icon fa-regular fa-clock"></i>
                        <span class="info__content">7:00 - 18:00</span> 
                      </span>
                    </div>
                    <div class="resultado__phone">
                      <span class="info">
                        <i class="info__icon fa-solid fa-phone"></i>
                        <a class="info__content" href='tel: +55<?= $x['celular'] ?>' title="Ligar" data-format="mobile-phone"><?= $x['celular'] ?></a>
                      </span>
                    </div>

                    <div class="resultado__address">
                      <p><?= $x['cidade'] ?> - <?= $x['estado'] ?></p>
                      <p><?= $x['rua'] ?>, <?= $x['numero'] ?></p>
                    </div>
                  </div>

              <?php
                }
              } else {

              ?>
              
                <h1 class="section-title text-center">Nenhum resultado encontrado</h1>

              <?php
              }
              ?>
            </div>
          </div>

          <?php  } else { ?>
        
            <h1 class="section-title">Recomendados </h1>
    
            <?php
              include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/include/scroller.php';
            ?>
            
          <?php } ?>
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