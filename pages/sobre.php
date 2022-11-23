<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sobre | Página Azul</title>
  <!-- FAVICON -->
  <link rel="shortcut icon" href="/assets/img/logos/logo.png" type="image/x-icon">
  <!-- FONT AWESOME -->
  <script src="https://kit.fontawesome.com/d80615c6de.js" crossorigin="anonymous"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="/assets/css/main.css">
  <!-- JavaScript -->
  <script src="/assets/js/main.js" defer></script>
</head>
<body id="sobre">

  <?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/header.html';
  ?>

  <main id="main">
    <section class="sobre full-size">
      <div class="sobre__box">
        <h1 class="section-title underlined mb-4">Sobre nós</h1>
        <p class="subtitle mb-6">Uma realização de <em>marketing</em> e oportunidade para pequenos, médios e grandes empreendedores</p>
        <p class="mb-4">
          A <em>Página Azul</em> tem como objetivo trazer visibilidade e espaço online para empreendedores da região. Listamos os estabelecimentos e prestadores de serviço locais por um preço em conta, recomendando-os para possíveis clientes próximos.
          Nosso sistema de pesquisa é construído para devolver com precisão o resultado de acordo com o tipo ou nome do serviço pesquisado pelo usuário.
        </p>
        <p class="mb-5 text-bold">
          Todo esse processo resulta em maior presença do negócio e menor perda de clientes.
        </p>
      </div>
      <img aria-hidden="true" src="/assets/img/logos/logo.png">
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