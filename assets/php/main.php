<?php

function destaque($imagem, $nome) {

  echo "
  <div class='destaques__grid-item'>
  <a href='#' class='link-wrapper'>
    <img
      src='$imagem'
      alt='$nome'
      class='destaques__img'
    />
  </a>
  </div>";

}


function medio() {
  echo "
  <div class='scroll__item'>
    <a href='#' class='link-wrapper'>
     <div class='scroll__img-container'>
        <img
         src='https://picsum.photos/400/400?random=".rand()."'
         class='scroll__img'
         draggable='false'
        />
      </div>
    </a>
  </div>";
}

?>