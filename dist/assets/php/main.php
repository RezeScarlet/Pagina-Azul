<?php


// function destaque($imagem, $nome) {

//   echo "
//   <div class='destaques__grid-item'>
//   <a href='#' class='link-wrapper'>
//     <img
//       src='$imagem'
//       alt='$nome'
//       title='$nome'
//       class='destaques__img'
//       style='width: 592px;
//              height: 338px;'
//     />
//   </a>
//   </div>";

// }


function medio() {
  echo "
  <div class='scroll__item'>
    <a href='#' class='link-wrapper'>
     <div class='scroll__img-container'>
        <img
         src='https://picsum.photos/400/400?random=".rand()."'
         style='width: 264px;
                height: 264px;'
         class='scroll__img'
         draggable='false'
        />
      </div>
    </a>
  </div>";
}

?>