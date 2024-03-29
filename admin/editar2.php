<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/verifyLogin.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Azul | Admin - Editar 2</title>
  <!-- FAVICON -->
  <link rel="shortcut icon" href="/assets/img/logos/favicon.ico" type="image/x-icon">
  <!-- FONT AWESOME -->
  <script src="https://kit.fontawesome.com/d80615c6de.js" crossorigin="anonymous"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="/assets/css/main.css">
  <!-- JavaScript -->
  <script src="/assets/js/main.js" defer></script>
</head>

<body>

  <?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.html';
  ?>



  <?php
  $ID = $_POST['ID'];
  $anuncianteQuery = $conexao->prepare("SELECT * FROM anunciante WHERE idAnunciante = $ID");
  $anuncianteQuery->execute();
  $anunciante = $anuncianteQuery->fetch(PDO::FETCH_ASSOC);

  ?>

  <main id="main">
    <section id="signup" class="full-size">
      <div class="container">
        <p class="mb-6"><a class="link" href="index.php">Voltar</a></p>

        <h1 class="section-title mb-5">Editar Informações</h1>
        <form class="form" action="signup.php" method="post" enctype="multipart/form-data">
          <div class="form__cols">

            <div class="form__group">
              <label class="form__label" for="nome">Nome*</label>
              <input class="form__input" type="text" name="nome" id="nome" required value="<?= $anunciante['nome'] ?>">
            </div>
            <div class="form__group">
              <label class="form__label" for="CNPJ">CNPJ</label>
              <input class="form__input" type="text" name="CNPJ" id="CNPJ" value="<?= $anunciante['CNPJ'] ?>">
            </div>
          </div>


          <div class="form__cols">

            <div class="form__group">
              <label class="form__label" for="email">Email*</label>
              <input class="form__input" type="email" name="email" id="email" value="<?= $anunciante['email'] ?>" required>
            </div>

            <div class="form__group">
              <label class="form__label" for="website">website</label>
              <input class="form__input" type="website" name="website" id="website" value="<?= $anunciante['website'] ?>">
            </div>
          </div>

          <div class="form__cols">
            <div class="form__group">
              <label class="form__label" for="plano">Plano</label>
              <select class="form__input" name="plano" id="plano">
                <option value="-1" disabled selected>Selecione o plano</option>
                <?php
                // Opções do select
                $planosQuery = $conexao->prepare('SELECT idPlano, nome FROM planos');
                $planosQuery->execute();
                while ($plano = $planosQuery->fetch(PDO::FETCH_ASSOC)) {
                ?>
                  <option value="<?= $plano['idPlano'] ?>" <?php if ($plano['idPlano'] == $anunciante['idPlano']) {
                                                              echo "selected";
                                                            } ?>><?= $plano['nome'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>

            <div class="form__group">
              <label class="form__label" for="categoria">Categoria</label>
              <select class="form__input" name="categoria" id="categoria">
                <option value="-1" disabled selected>Selecione a categoria do seu negócio</option>
                <?php
                // Opções do select
                $categoriasQuery = $conexao->prepare('SELECT * FROM categorias');
                $categoriasQuery->execute();
                while ($categoria = $categoriasQuery->fetch(PDO::FETCH_ASSOC)) {
                ?>
                  <option value="<?= $categoria['idCategoria'] ?>" <?php if ($categoria['idCategoria'] == $anunciante['idCategoria']) {
                                                                      echo "selected";
                                                                    } ?>> <?= $categoria['nome'] ?> </option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form__group">
            <label class="form__label" for="descricao">Descrição</label>
            <textarea class="form__input" type="text" name="descricao" id="descricao"><?= $anunciante['descricao'] ?></textarea>
          </div>

          <hr>

          <div class="form__cols">
            <div class="form__group">
              <label class="form__label" for="facebook">Facebook</label>
              <input class="form__input" type="text" name="facebook" id="facebook" value="<?= $anunciante['facebook'] ?>">
            </div>
            <div class="form__group">
              <label class="form__label" for="instagram">Instagram</label>
              <input class="form__input" type="text" name="instagram" id="instagram" value="<?= $anunciante['instagram'] ?>">
            </div>
          </div>

          <div class="form__cols">
            <div class="form__group">
              <label class="form__label" for="whatsapp">Whatsapp</label>
              <input class="form__input" type="text" name="whatsapp" id="whatsapp" value="<?= $anunciante['whatsapp'] ?>">
            </div>
            <div class="form__group">
              <label class="form__label" for="telefone">Telefone</label>
              <input class="form__input" type="text" name="telefone" id="telefone" value="<?= $anunciante['telefone'] ?>">
            </div>

            <div class="form__group">
              <label class="form__label" for="celular">Celular</label>
              <input class="form__input" type="text" name="celular" id="celular" value="<?= $anunciante['celular'] ?>">
            </div>

          </div>
          <hr>
          <div class="form__cols">
            <div class="form__group">
              <label class="form__label" for="estado">Estado</label>
              <select class="form__input" name="estado" id="estado">
                <option value="-1" disabled selected>Selecione o estado</option>
                <option value="Mococa">SP</option>
                <option value="Arceburgo">MG</option>
              </select>
            </div>
            <div class="form__group">
              <label class="form__label" for="cidade">Cidade</label>
              <select class="form__input" name="cidade" id="cidade">
                <option value="-1" disabled selected>Selecione a cidade</option>
                <option value="Mococa">Mococa</option>
                <option value="Arceburgo">Arceburgo</option>
                <option value="Tapiratiba">Tapiratiba</option>
              </select>
            </div>
          </div>
          <div class="form__cols">

            <div class="form__group">
              <label class="form__label" for="CEP">CEP</label>
              <input class="form__input" type="text" name="CEP" id="CEP" value="<?= $anunciante['CEP'] ?>">
            </div>

            <div class="form__group">
              <label class="form__label" for="bairro">Bairro</label>
              <input class="form__input" type="text" name="bairro" id="bairro" value="<?= $anunciante['bairro'] ?>">
            </div>

          </div>
          <div class="form__cols">
            <div class="form__group">
              <label class="form__label" for="rua">Rua</label>
              <input class="form__input" type="text" name="rua" id="rua" value="<?= $anunciante['rua'] ?>">
            </div>

            <div class="form__group">
              <label class="form__label" for="numero">Número</label>
              <input class="form__input" type="text" name="numero" id="numero" value="<?= $anunciante['numero'] ?>">
            </div>
          </div>


          <hr>

          <div class="form__cols">

            <div class="form__group">
              <label class="form__label" for="imgAnuncioP">Imagem de anúncio pequeno</label>
              <input class="form__input" type="file" name="imgAnuncioP" id="imgAnuncioP">
              <img src="/assets/img/img-anunciante/<?= $anunciante['imgAnuncioP'] ?>" alt="">
            </div>

            <div class="form__group">
              <label class="form__label" for="imgAnuncioG">Imagem de anúncio grande</label>
              <input class="form__input" type="file" name="imgAnuncioG" id="imgAnuncioG">
              <img src="/assets/img/img-anunciante/<?= $anunciante['imgAnuncioG'] ?>" alt="">
            </div>
          </div>

          <div class="form__submit">
            <input class="btn--dark" type="submit" value="Editar" name="editar">
          </div>
        </form>
      </div>
    </section>
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


    $result = $conexao->prepare("INSERT INTO `anunciante` value (null, :nome, :idPlano, :idCategoria, :descricao, :imgPerfil, :imgAnuncioP, :imgAnuncioG)");

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

    $login = $conexao->prepare("INSERT INTO `login` VALUE (null, :email, :senha)");

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