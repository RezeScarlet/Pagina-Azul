 
 <button type="button" class="select" data-select>
   <div class="select__display">
     <i class="mr-1 fa-solid fa-location-dot"></i>
     <div class="select__text no-select" data-select-text>
       <?php

       $cidadeSelected = isset($_GET["cidade"]) ? htmlspecialchars($_GET["cidade"]) : "";

        if ($cidadeSelected != "") {

          if ($cidadeSelected == "Online") {

            echo "Online";

          } else {

            $cidadeSelectedQuery = $conexao->prepare('SELECT nome, estado FROM cidades WHERE nome = :cidade');
            $cidadeSelectedQuery->execute([":cidade" => $cidadeSelected]);
            $cidadeArray = $cidadeSelectedQuery->fetch(PDO::FETCH_ASSOC);
  
            echo $cidadeArray['nome'] . ' - ' . $cidadeArray['estado'];

          }

        } else {

          echo "Selecione a cidade";

        }

        ?>
     </div>
     <input type="text" readonly name="cidade" value="<?=  $cidadeSelected ?>">
   </div>

   <!-- OPTIONS -->
   <div class="select__options-container">
     <div tabindex="0" class="select__option text-bold <?= ($cidadeSelected != "" && $cidadeSelected == "Online") ? "active" : "" ?>" data-select-option="Online">
       Online
     </div>

     <?php
        $cidadesQuery = $conexao->prepare('SELECT * FROM cidades');
        $cidadesQuery->execute();
        while ($cidade = $cidadesQuery->fetch(PDO::FETCH_ASSOC)) {
      ?>

       <div 
          tabindex="0" 
          class="select__option <?= ($cidadeSelected != "" && $cidadeSelected == $cidade['nome']) ? "active" : "" ?>" 
          data-select-option="<?= $cidade['nome'] ?>"
        >

          <?= $cidade['nome'] ?> - <?= $cidade['estado'] ?>

        </div>

      <?php
        }
      ?>
   </div>
 </button>
