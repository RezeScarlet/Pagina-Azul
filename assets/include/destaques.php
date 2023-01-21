<div class="destaques__grid">

  <?php
  
  // Faz o SELECT no BD e executa
  $destaquesQuery = $conexao -> prepare("
    SELECT 
      anunciante.nome, 
      anunciante.slug, 
      anunciante.imgAnuncioG, 
      categorias.nome AS categoria,
      categorias.icone AS iconeCategoria 
    FROM anunciante 
    INNER JOIN categorias ON anunciante.idCategoria = categorias.idCategoria 
    WHERE idPlano = 3");

  $destaquesQuery -> execute();
  
  
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
    <a href='/a/<?= $destaquesrow[$x]["slug"]; ?>' class='link-wrapper'>
      <img src='/assets/img/img-anunciante/<?= $destaquesrow[$x]["imgAnuncioG"]; ?>'
          alt='<?= $destaquesrow[$x]["nome"]; ?>'
          title='<?= $destaquesrow[$x]["nome"]; ?>'
          draggable="false"
          class='display-img no-select'
      />
    </a>
    <a href="/busca?q=<?= $destaquesrow[$x]['categoria'] ?>" class="destaques__icon link-wrapper icon-wrapper--sm" title="<?= $destaquesrow[$x]['categoria'] ?>">
      <img src="/assets/img/icones-categorias/<?= $destaquesrow[$x]['iconeCategoria'] ?>" alt="<?= $destaquesrow[$x]['categoria'] ?>">
    </a>
  </div>

  <?php
  }
  ?>
  
</div>