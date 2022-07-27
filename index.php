<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- FONT AWESOME -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
      integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- CSS E JS -->
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/components.css" />
    <script src="assets/js/main.js" defer></script>
    <title>Página Azul | HOME</title>
  </head>

  <body>
    <!-- HEADER -->
    <header>
      <nav class="nav">
        <div class="nav__header">
          <span class="nav__icon menu-toggler" aria-hidden="true"
            ><i class="fa fa-bars" aria-hidden="true"></i
          ></span>
          <span class="logo"><a href="index.html">Página</a></span>
        </div>
        <ul class="nav__list">
          <li class="nav__item">
            <a href="#" class="nav__link active">Home</a>
          </li>
          <li class="nav__item">
            <a href="#" class="nav__link">Categorias</a>
          </li>
          <li class="nav__item">
            <a href="#" class="nav__link">Serviços</a>
          </li>
          <li class="nav__item"><a href="#" class="nav__link">Suporte</a></li>
          <li class="nav__item"><a href="#" class="nav__link">Sobre</a></li>
          <li class="nav__close-btn">
            <button type="button" class="nav__icon">
              <i class="fa fa-times" aria-hidden="true"></i>
            </button>
          </li>
        </ul>
        <div class="nav__btns">
          <form action="#" method="post" class="nav__search-wrapper">
            <button
              class="nav__icon"
              type="button"
              id="search-btn"
              aria-hidden="true"
            >
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
            <input
              type="search"
              name="search_bar"
              class="nav__search"
              placeholder="Pesquisar"
            />
          </form>
          <a href="#" class="btn btn--secondary">Login</a>
        </div>
      </nav>
    </header>

    <!-- MAIN -->
    <main>
      <!-- HERO -->
      <div class="container">
        <section class="hero">
          <div class="search">
            <div class="search__wrapper">
              <a href="index.html">
                <img
                  src="assets/img/sims4.jpg"
                  alt="Página Azul"
                  class="logo"
                />
              </a>
              <p class="subheading">Tudo ao seu alcance, em um só lugar</p>
              <form action="#" method="post" class="search__form">
                <input
                  class="search__bar"
                  type="search"
                  name="searchbar"
                  id="searchbar"
                  placeholder="Encontre o que precisa"
                />
                <input class="btn" type="submit" value="Pesquisar" />
              </form>
            </div>
          </div>
        </section>
      </div>

      <!-- DESTAQUES -->
      <section class="destaques" id="destaques">
        <div class="container">
          <h1 class="section__title">Nossos Destaques</h1>
          <div class="destaques__grid">

            <?php
            // Link do arquivo php principal
            require_once('assets/php/main.php');
            // looping responsavel por gerar 3 imagens de destaque através da função destaque()
            for ($x=0; $x<3; $x++) {
              destaque();
            }
            ?>

            <div class="destaques__grid-item">
              <a href="#" class="link-wrapper">
                <img
                  src="https://picsum.photos/700/400?random=087"
                  alt=""
                  class="destaques__img"
                />
              </a>
            </div>

          </div>
        </div>
      </section>

      <!-- MEDIOS -->
      <section class="medios" id="medios">
        <div class="container">
          <h1 class="section__title">Scroll Horizontal</h1>
          <div class="slider">
            <button
              type="button"
              class="scroll__btn left rounded"
              data-control="left"
            >
              <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </button>
            <div class="scroll-horizontal" data-slide>
              
              <?php
              // Gera 10 imagens "medias"
                for ($x=0; $x<10; $x++) {
                  medio();
                }
              ?>

              <div class="scroll__item">
                <a href="#" class="link-wrapper">
                  <div class="scroll__img-container">
                    <img
                      src="https://picsum.photos/400/400?random=11"
                      class="scroll__img"
                      draggable="false"
                    />
                  </div>
                </a>
              </div>
            </div>

            <button
              type="button"
              class="scroll__btn right rounded"
              data-control="right"
            >
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </button>
          </div>
        </div>
      </section>

      <!-- CATEGORIAS -->
      <section class="categorias" id="categorias">
        <div class="container">
          <h1 class="section__title text-center">Categorias</h1>
          <div class="slider">
            <button
              type="button"
              class="scroll__btn left rounded"
              data-control="left"
            >
              <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </button>

            <div class="scroll-horizontal scroll-horizontal--sm" data-slide>
              <div class="scroll__item rounded">
                <a href="#" class="link__wrapper">
                  <img
                    src="https://picsum.photos/150/150?random=1"
                    alt=""
                    class="rounded"
                    draggable="false"
                  />
                </a>
              </div>

              <div class="scroll__item rounded">
                <a href="#" class="link__wrapper">
                  <img
                    src="https://picsum.photos/150/150?random=2"
                    alt=""
                    class="rounded"
                    draggable="false"
                  />
                </a>
              </div>

              <div class="scroll__item rounded">
                <a href="#" class="link__wrapper">
                  <img
                    src="https://picsum.photos/150/150?random=3"
                    alt=""
                    class="rounded"
                    draggable="false"
                  />
                </a>
              </div>

              <div class="scroll__item rounded">
                <a href="#" class="link__wrapper">
                  <img
                    src="https://picsum.photos/150/150?random=4"
                    alt=""
                    class="rounded"
                    draggable="false"
                  />
                </a>
              </div>

              <div class="scroll__item rounded">
                <a href="#" class="link__wrapper">
                  <img
                    src="https://picsum.photos/150/150?random=5"
                    alt=""
                    class="rounded"
                    draggable="false"
                  />
                </a>
              </div>

              <div class="scroll__item rounded">
                <a href="#" class="link__wrapper">
                  <img
                    src="https://picsum.photos/150/150?random=6"
                    alt=""
                    class="rounded"
                    draggable="false"
                  />
                </a>
              </div>

              <div class="scroll__item rounded">
                <a href="#" class="link__wrapper">
                  <img
                    src="https://picsum.photos/150/150?random=7"
                    alt=""
                    class="rounded"
                    draggable="false"
                  />
                </a>
              </div>

              <div class="scroll__item rounded">
                <a href="#" class="link__wrapper">
                  <img
                    src="https://picsum.photos/150/150?random=8"
                    alt=""
                    class="rounded"
                    draggable="false"
                  />
                </a>
              </div>

              <div class="scroll__item rounded">
                <a href="#" class="link__wrapper">
                  <img
                    src="https://picsum.photos/150/150?random=9"
                    alt=""
                    class="rounded"
                    draggable="false"
                  />
                </a>
              </div>

              <div class="scroll__item rounded">
                <a href="#" class="link__wrapper">
                  <img
                    src="https://picsum.photos/150/150?random=10"
                    alt=""
                    class="rounded"
                    draggable="false"
                  />
                </a>
              </div>

              <div class="scroll__item rounded">
                <a href="#" class="link__wrapper">
                  <img
                    src="https://picsum.photos/150/150?random=11"
                    alt=""
                    class="rounded"
                    draggable="false"
                  />
                </a>
              </div>
            </div>

            <button
              type="button"
              class="scroll__btn right rounded"
              data-control="right"
            >
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
