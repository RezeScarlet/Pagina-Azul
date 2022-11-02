<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/verifyLogin.php';

if (isset($_POST['ID']) && is_numeric($_POST['ID']) && $_POST['ID'] > 0) {
  $id = $_POST['ID'];
  $userQuery = $conexao->prepare("SELECT nome, idAnunciante FROM anunciante WHERE idAnunciante = $id");
  $userQuery->execute();
  $user = $userQuery->fetch(PDO::FETCH_ASSOC);
  if (isset($_POST['confirmar'])) {
    $apagarQuery = $conexao->prepare('DELETE FROM anunciante WHERE idAnunciante = :id');
    $apagarQuery->bindParam(':id', $id);
    $apagarQuery->execute();
    if (!$apagarQuery->rowCount()) {
      echo "Falha ao apagar registro.";
  } else {
    header('location: index.php');
  }}
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Azul | Admin - Apagar</title>
  <!-- FAVICON -->
  <link rel="shortcut icon" href="/assets/img/logos/logo.png" type="image/x-icon">
  <!-- FONT AWESOME -->
  <script src="https://kit.fontawesome.com/d80615c6de.js" crossorigin="anonymous"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="/assets/css/main.css">
  <!-- JavaScript -->
  <script src="/assets/js/main.js" defer></script>
  <style>
    /* Center tables for demo */
    table {
      margin: 0 auto;
    }

    /* Default Table Style */
    table {
      color: #333;
      background: white;
      border: 1px solid grey;
      font-size: 12pt;
      border-collapse: collapse;
      width: 250%;

    }

    table thead th,
    table tfoot th {
      color: #777;
      background: rgba(0, 0, 0, .1);
    }

    table caption {
      padding: .5em;
    }

    table th,
    table td {
      padding: .5em;
      border: 1px solid lightgrey;
    }
  </style>
</head>

<body>
  <?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.html';
  ?>

  <main>
    <section id="edit" class="full-size">
      <div class="container">
        <p><a href="index.php">Voltar</a></p>
        <h1 class="section-title">Apagar Informações</h1>

        <form class="form" action="apagar.php" method="post" enctype="multipart/form-data">
        <div class="form__cols">
          <div class="form__group">
            <label class="form__label" for="ID">ID do anunciante</label>
            <input class="form__input" type="number" name="ID" id="ID" placeholder="ID">
            <input class="btn--dark" type="submit" name="confirmar" value="Confirmar">
          </div>
      
        </div>
      </form>
      </div>
    </section>

    <?php


    $userQuery = $conexao->prepare('SELECT * FROM anunciante');
    $userQuery->execute();
    $user = $userQuery->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <table class="">
      <tr>
        <th class="">ID Anunciante</th>
        <th class="">nome</th>
        <th class="">CNPJ</th>
        <th class="">email</th>
        <th class="">website</th>
        <th class="">idPlano</th>
        <th class="">idCategoria</th>
        <th class="">descricao</th>
        <th class="">facebook</th>
        <th class="">instagram</th>
        <th class="">whatsapp</th>
        <th class="">telefone</th>
        <th class="">celular</th>
        <th class="">estado</th>
        <th class="">cidade</th>
        <th class="">CEP</th>
        <th class="">bairro</th>
        <th class="">rua</th>
        <th class="">numero</th>
        <th class="">imgAnuncioP</th>
        <th class="">imgAnuncioG</th>
      </tr>
      <?php
      foreach ($user as $linha) {
      ?>
        <tr>
          <td><?php echo $linha["idAnunciante"] ?></td>

          <td><?php echo $linha["nome"] ?></td>
          <td><?php echo $linha["CNPJ"] ?></td>
          <td><?php echo $linha["email"] ?></td>
          <td><?php echo $linha["website"] ?></td>
          <td><?php echo $linha["idPlano"] ?></td>
          <td><?php echo $linha["idCategoria"] ?></td>
          <td><?php echo $linha["descricao"] ?></td>
          <td><?php echo $linha["facebook"] ?></td>
          <td><?php echo $linha["instagram"] ?></td>
          <td><?php echo $linha["whatsapp"] ?></td>
          <td><?php echo $linha["telefone"] ?></td>
          <td><?php echo $linha["celular"] ?></td>
          <td><?php echo $linha["estado"] ?></td>
          <td><?php echo $linha["cidade"] ?></td>
          <td><?php echo $linha["CEP"] ?></td>
          <td><?php echo $linha["bairro"] ?></td>
          <td><?php echo $linha["rua"] ?></td>
          <td><?php echo $linha["numero"] ?></td>
          <td><?php echo $linha["imgAnuncioP"] ?></td>
          <td><?php echo $linha["imgAnuncioG"] ?></td>
        <?php }
        ?>
        </tr>
    </table>


  </main>






  <?php

  function getImg($img)
  {

    $img_tmp = $_FILES[$img]["tmp_name"];
    $img_original = $_FILES[$img]["name"];

    $path = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/img-anunciante/";

    $fileExtension = strtolower(pathinfo($img_original, PATHINFO_EXTENSION));

    if (($fileExtension != "jpg") && ($fileExtension != "jpeg") && ($fileExtension != "png")) {
      echo "Imagem invalida";
    } else {

      // echo "Imagem $img_original é válida";
      // Nomeia o arquivo de imagem com a data e hora
      date_default_timezone_set("America/Sao_Paulo");
      $time = date("Ymd") . "_" . date("His");

      $imgName = $time . "." . $fileExtension;
      $img_final = $path . $imgName;


      move_uploaded_file($img_tmp, $img_final);

      return $imgName;
    }
  }

  if (isset($_POST['registrar2'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $idCategoria = $_POST['categoria'];
    $idPlano = $_POST['plano'];

    $imgPerfil = getImg('imgPerfil');
    $imgAnuncioP = getImg('imgAnuncioP');
    $imgAnuncioG = getImg('imgAnuncioG');


    $result = $conexao->prepare("INSERT INTO `anunciante` values (null, :nome, :idPlano, :idCategoria, :descricao, :imgPerfil, :imgAnuncioP, :imgAnuncioG)");

    $result->bindValue(":nome", $nome);
    $result->bindValue(':idPlano', $idPlano);
    $result->bindValue(":idCategoria", $idCategoria);
    $result->bindValue(":descricao", $descricao);
    $result->bindValue(":imgPerfil", $imgPerfil);
    $result->bindValue(":imgAnuncioP", $imgAnuncioP);
    $result->bindValue(":imgAnuncioG", $imgAnuncioG);
    $result->execute();
  }

  if (isset($_POST['registrar'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $login = $conexao->prepare("INSERT INTO `login` VALUES (null, :email, :senha)");

    $login->bindValue(":email", $email);
    $login->bindvalue(":senha", md5($senha));
    $login->execute();
  }
  ?>

  <a href="#" class="back-to-top">
    <i class="fa-solid fa-arrow-up"></i>
  </a>

  <?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.html';
  ?>

</body>

</html>