<div class="slider">
  <button type="button" class="scroller__btn--left" data-control="left">
    <i class="fa-solid fa-arrow-left"></i>
  </button>

  <div class="scroller scroller--sm" data-slide>

    <?php
    // Looping para gerar as imagens da seção categorias 

    $categoriasQuery = $conexao->prepare("SELECT * FROM categorias");
    $categoriasQuery->execute();

    while ($row = $categoriasQuery->fetch(PDO::FETCH_ASSOC)) {
    ?>

      <div class="scroller__item">
        <a href="/busca?q=<?= $row['nome'] ?>" class="link__wrapper" title="<?= $row['nome'] ?>">
          <div class="scroller__img-container icon-wrapper">
            <img src="/assets/img/icones-categorias/<?= $row['icone'] ?>" alt="<?= $row['nome'] ?>" draggable="false" />
          </div>
        </a>
      </div>

    <?php
    }
    ?>
  </div>

  <button type="button" class="scroller__btn--right" data-control="right">
    <i class="fa-solid fa-arrow-right"></i>
  </button>
</div>