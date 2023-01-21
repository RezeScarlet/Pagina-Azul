<div class="slider">
  <button type="button" class="scroller__btn--left" data-control="left">
    <i class="fa-solid fa-arrow-left"></i>
  </button>
  
  <div class="scroller" data-slide>

    <?php

    // Faz o SELECT no BD e executa
    $mediosQuery = $conexao->prepare("
      SELECT 
        anunciante.nome, 
        anunciante.slug, 
        anunciante.imgAnuncioP, 
        categorias.nome AS categoria,
        categorias.icone AS iconeCategoria
      FROM anunciante 
      INNER JOIN categorias ON anunciante.idCategoria = categorias.idCategoria 
      WHERE idPlano >= 2");

    $mediosQuery->execute();

    // Looping para adicionar cada anuncio a um só array
    while ($row = $mediosQuery->fetch(PDO::FETCH_ASSOC)) {

      $mediosrow[] = $row;
    }

    // Função que reorganiza o array de forma aleatória
    shuffle($mediosrow);

    // Mostra o item do scroll horizontal
    for ($x = 0; $x < 8; $x++) {
      
      if (isset($_GET["anunciante"]) && $_GET["anunciante"] == $mediosrow[$x]["slug"]) { 
        continue;
      }

    ?>
      <div class='scroller__item'>
        <a href='/a/<?= $mediosrow[$x]["slug"]; ?>' class='link-wrapper' title='<?php echo $mediosrow[$x]["nome"]; ?>'>
          <div class="scroller__img-container">
            <img src='/assets/img/img-anunciante/<?php echo $mediosrow[$x]["imgAnuncioP"]; ?>' alt='<?php echo $mediosrow[$x]["nome"]; ?>' class='display-img no-select' draggable="false" />
          </div>
        </a>
        <a href="/busca?q=<?= $mediosrow[$x]['categoria'] ?>" class="scroller__icon link-wrapper icon-wrapper--sm" title="<?= $mediosrow[$x]['categoria'] ?>">
          <img src="/assets/img/icones-categorias/<?= $mediosrow[$x]['iconeCategoria'] ?>" alt="<?= $mediosrow[$x]['categoria'] ?>">
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