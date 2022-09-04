<?php
require_once $_SERVER['DOCUMENT_ROOT']."/assets/php/conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Azul | Pesquisa</title>
  <!-- FAVICON -->
  <link rel="shortcut icon" href="/assets/img/logos/logo.png" type="image/x-icon">
  <!-- FONT AWESOME -->
  <script src="https://kit.fontawesome.com/d80615c6de.js" crossorigin="anonymous"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="/assets/css/main.css">
  <!-- JavaScript -->
  <script src="/assets/js/main.js" defer></script>
</head>
<body id="pesquisa">

  <main>
    <section class="full-size">
      <div class="container">
        
        <?php
          include_once '../assets/include/header.html';
          $search = $_POST['search'];
          
          $resultQuery = $conexao->prepare("SELECT nome, imgPerfil FROM anunciante WHERE nome LIKE '%$search%'");
          $resultQuery -> execute();

          while ($row = $resultQuery -> fetch(PDO::FETCH_ASSOC)) {

            echo $row['nome'].'<br>';
            
          }
          ?>
      </div>
    </section>
  </main>

    

    <?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/footer.html';
    ?>

</body>
</html>