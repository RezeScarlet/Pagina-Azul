<div class="destaques__grid">

            <?php
            
            // Faz o SELECT no BD e executa
            $destaquesQuery = $conexao -> prepare("SELECT nome, slug, imgAnuncioG, idCategoria FROM anunciante WHERE idPlano = 3");
            $destaquesQuery -> execute();
            
            
            // Looping para adicionar cada anuncio a um só array
            while ($row = $destaquesQuery->fetch(PDO::FETCH_ASSOC)) {
              
              $destaquesrow[] = $row;
              
            }

            // Função que reorganiza o array de forma aleatória
            shuffle($destaquesrow);

            // Gera as imagens de destaque
            for ($x = 0; $x < 4; $x++) {

              $categoriaQuery = $conexao->prepare("SELECT nome, icone FROM categorias WHERE idCategoria = ". $destaquesrow[$x]['idCategoria']);
              $categoriaQuery->execute();
              $categoria = $categoriaQuery->fetch(PDO::FETCH_ASSOC);

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
                <a href="/busca?q=<?= $categoria['nome'] ?>" class="destaques__icon link-wrapper icon-wrapper--sm" title="<?= $categoria['nome'] ?>">
                  <img src="/assets/img/icones-categorias/<?= $categoria['icone'] ?>" alt="<?= $categoria['nome'] ?>">
                </a>
              </div>

            <?php
            }
            ?>