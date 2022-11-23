 <div class="select" data-select>
   <div class="select__display">
     <i class="mr-1 fa-solid fa-location-dot"></i>
     <div class="select__text no-select" data-select-text>
       <?php

        if (isset($_GET["cidade"]) && $_GET["cidade"] != '') {

          if ($_GET["cidade"] == "Online") {

            echo $_GET["cidade"];

          } else {

            $cidadeSelectedQuery = $conexao->prepare('SELECT nome, estado FROM cidades WHERE nome = "' . $_GET['cidade'] . '"');
            $cidadeSelectedQuery->execute();
            $cidadeArray = $cidadeSelectedQuery->fetch(PDO::FETCH_ASSOC);
  
            echo $cidadeArray['nome'] . ' - ' . $cidadeArray['estado'];

          }

        } else {

          echo "Selecione a cidade";

        }

        ?>
     </div>
     <input type="text" readonly name="cidade" value="<?php if (isset($_GET["cidade"])) echo $_GET["cidade"] ?>">
   </div>

   <!-- OPTIONS -->
   <div class="select__options-container">
     <div class="select__option text-bold <?= (isset($_GET["cidade"]) && $_GET["cidade"] == "Online") ? "active" : "" ?>" data-select-option="Online">
       Online
     </div>

     <?php
        $cidadesQuery = $conexao->prepare('SELECT * FROM cidades');
        $cidadesQuery->execute();
        while ($cidade = $cidadesQuery->fetch(PDO::FETCH_ASSOC)) {
      ?>

       <div class="select__option <?= (isset($_GET["cidade"]) && $_GET["cidade"] == $cidade['nome']) ? "active" : "" ?>" data-select-option="<?= $cidade['nome'] ?>"><?= $cidade['nome'] ?> - <?= $cidade['estado'] ?></div>

      <?php
        }
      ?>
   </div>
 </div>