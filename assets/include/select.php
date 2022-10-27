 <!-- SELECT -->
 <div class="select" data-select tabindex=0>
   <div class="select__display">
     <i class="mr-1 fa-solid fa-location-dot"></i>
     <div class="select__text" data-select-text>
       <?php

        if (isset($_GET["cidade"]) && $_GET["cidade"] != '') {
          $cidadeSelectedQuery = $conexao->prepare('SELECT nome, estado FROM cidades WHERE nome = "' . $_GET['cidade'] . '"');
          $cidadeSelectedQuery->execute();
          $cidadeArray = $cidadeSelectedQuery->fetch(PDO::FETCH_ASSOC);
          echo $cidadeArray['nome'] . ' - ' . $cidadeArray['estado'];
        } else {
          echo "Selecione a cidade";
        }


        ?>
     </div>
     <input type="text" readonly name="cidade" value="<?php if (isset($_GET["cidade"])) {
                                                        echo $_GET["cidade"];
                                                      } ?>">
   </div>

   <!-- OPTIONS -->
   <div class="select__options-container">
     <div class="select__option" data-select-option="" tabindex=0>
       Todas
     </div>
     <?php
      $cidadesQuery = $conexao->prepare('SELECT * FROM cidades');
      $cidadesQuery->execute();
      while ($cidade = $cidadesQuery->fetch(PDO::FETCH_ASSOC)) {
      ?>
       <div class="select__option <?php 
       
       if (isset($_GET["cidade"]) && $_GET["cidade"] == $cidade['nome']) {
       
        echo "active";
      }

       
       ?>" data-select-option="<?= $cidade['nome'] ?>" tabindex=0><?= $cidade['nome'] ?> - <?= $cidade['estado'] ?> </div>
     <?php
      }
      ?>
   </div>
 </div>