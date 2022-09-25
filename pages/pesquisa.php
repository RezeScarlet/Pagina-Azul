<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/assets/php/unaccent.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/assets/php/conexao.php";

  $search = $_GET['pesquisa'];
  $resultArray = FALSE;

  $categoriaQuery = $conexao -> prepare("SELECT idCategoria, nome FROM categorias");
  $categoriaQuery -> execute();
  $categoriaArray = $categoriaQuery -> fetchAll(PDO::FETCH_ASSOC);
  
  foreach ($categoriaArray as $x) {
    if (strtolower(unaccent($x['nome'])) == strtolower(unaccent($search))) {
      $resultQuery = $conexao -> prepare("SELECT * FROM anunciante where idCategoria = ".$x['idCategoria']);
      $resultQuery -> execute();
      $resultArray = $resultQuery -> fetchAll(PDO::FETCH_ASSOC);
    }
  }

  if (!$resultArray) {
    $resultQuery = $conexao->prepare("SELECT nome, imgPerfil FROM anunciante WHERE descricao LIKE '%$search%'");
    $resultQuery -> execute();
    $resultArray = $resultQuery -> fetchAll(PDO::FETCH_ASSOC);
  }


  if (!$resultArray){
    $resultQuery = $conexao->prepare("SELECT nome, imgPerfil FROM anunciante WHERE nome LIKE '%$search%'");
    $resultQuery -> execute();
    $resultArray = $resultQuery -> fetchAll(PDO::FETCH_ASSOC);
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Azul | Pesquisa</title>
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
            <form action="/pesquisa" method="get" class="search__form">
              <input class="search__bar" type="search" name="pesquisa" id="pesquisa" placeholder="Encontre o que precisa" />
              <button class="search__btn btn--dark" type="submit">Pesquisar</button>
            </form>
          </div>
        </div>

        <div class="resultados" id="resultados">
          <h1 class="section-title">Resultados para <em>"<?= $search ?>"</em></h1>


          <div class="resultados__wrapper">
            <?php
              if ($resultArray) {
                foreach ($resultArray as $x) {
              
            ?>

              <div class="resultado-card">

                <p class="resultado-card__title"><a href='/anunciante?anunciante=<?= $x['nome']; ?>'><?= $x['nome'] ?></a></p>

                <p class="resultado-card__time"><i class="fa-regular fa-clock"></i> 7:00 - 18:00</p>
                <p class="resultado-card__phone"><a href='#' title="Ligar"><i class="fa-solid fa-phone"></i> (19) 99785-4572</a></p>
                <div class="resultado-card__address">
                  <p>Mococa, SP</p>
                  <p>Rua Batista Figueiredo, 504</p>
                </div>


              </div>

            <?php
              }} else {echo "Nenhum resultado encontrado";}
            ?>
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