<div class="slider">
          <button type="button" class="scroller__btn left rounded" data-control="left">
            <i class="fa-solid fa-arrow-left"></i>
          </button>
          <div class="scroller" data-slide>

            <?php

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
                    <img src='assets/img/img-anunciante/<?php echo $mediosrow[$x]["imgAnuncioP"]; ?>' alt='<?php echo $mediosrow[$x]["nome"]; ?>' title='<?php echo $mediosrow[$x]["nome"]; ?>' class='scroller__img' draggable="false" />
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