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
  <title>Página Azul | Admin - Cadastro</title>
  <!-- FAVICON -->
  <link rel="shortcut icon" href="/assets/img/logos/logo.png" type="image/x-icon">
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


  <main>
    <section id="signup" class="full-size">
      <div class="container">
        <p class="mb-6"><a class="link" href="index.php">Voltar</a></p>

        <h1 class="section-title mb-5">Cadastrar empresa</h1>
        <form class="form" action="cadastro.php" method="post" enctype="multipart/form-data">
          <div class="form__cols">

            <div class="form__group">
              <label class="form__label--required" for="nome">Nome</label>
              <input class="form__input" type="text" name="nome" id="nome" placeholder="Insira o nome do negócio" required>
            </div>
            <div class="form__group">
              <label class="form__label" for="CNPJ">CNPJ</label>
              <input class="form__input" type="text" name="CNPJ" id="CNPJ" placeholder="Insira o CNPJ do negócio">
            </div>
          </div>


          <div class="form__cols">

            <div class="form__group">
              <label class="form__label--required" for="email">Email</label>
              <input class="form__input" type="email" name="email" id="email" placeholder="Insira e-mail" required>
            </div>

            <div class="form__group">
              <label class="form__label" for="website">Website</label>
              <input class="form__input" type="website" name="website" id="website" placeholder="Insira o website do negócio">
            </div>

          </div>
          <div class="form__cols">
            <div class="form__group">
              <label class="form__label--required" for="plano">Plano</label>
              <select class="form__input" name="plano" id="plano" required>
                <option value="-1" disabled selected>Selecione o plano</option>
                <?php
                // Opções do select
                $planosQuery = $conexao->prepare('SELECT * FROM planos');
                $planosQuery->execute();
                while ($plano = $planosQuery->fetch(PDO::FETCH_ASSOC)) {
                ?>
                  <option value="<?= $plano['idPlano'] ?>"><?= $plano['nome'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>

            <div class="form__group">
              <label class="form__label--required" for="categoria">Categoria</label>
              <select class="form__input" name="categoria" id="categoria" required>
                <option value="-1" disabled selected>Selecione a categoria do negócio</option>
                <?php
                // Opções do select
                $categoriasQuery = $conexao->prepare('SELECT * FROM categorias');
                $categoriasQuery->execute();
                while ($categoria = $categoriasQuery->fetch(PDO::FETCH_ASSOC)) {
                ?>
                  <option value="<?= $categoria['idCategoria'] ?>"><?= $categoria['nome'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form__group">
            <label class="form__label" for="descricao">Descrição</label>
            <textarea class="form__input" type="text" name="descricao" id="descricao" placeholder="Insira a descrição do negócio"></textarea>
          </div>

          <hr>

          <div class="form__cols">
            <div class="form__group">
              <label class="form__label" for="facebook">Facebook</label>
              <input class="form__input" type="text" name="facebook" id="facebook" placeholder="Insira o Facebook do negócio">
            </div>
            <div class="form__group">
              <label class="form__label" for="instagram">Instagram</label>
              <input class="form__input" type="text" name="instagram" id="instagram" placeholder="Insira o Instagram do negócio">
            </div>
          </div>

          <div class="form__cols">
            <div class="form__group">
              <label class="form__label" for="whatsapp">Whatsapp</label>
              <input class="form__input" type="text" name="whatsapp" id="whatsapp" placeholder="Insira o telefone do negócio">
            </div>
            <div class="form__group">
              <label class="form__label" for="telefone">Telefone</label>
              <input class="form__input" type="text" name="telefone" id="telefone" placeholder="Insira o telefone do negócio">
            </div>

            <div class="form__group">
              <label class="form__label--required" for="celular">Celular</label>
              <input class="form__input" type="text" name="celular" id="celular" placeholder="Insira o celular do negócio" required>
            </div>

          </div>
          <hr>
          <div class="form__group">
            <label class="form__label" for="cidade">Cidade</label>
            <select class="form__input" name="cidade" id="cidade">
              <option value="-1" disabled selected>Selecione a cidade</option>
              <?php
              // Opções do select
              $cidadesQuery = $conexao->prepare('SELECT * FROM cidades');
              $cidadesQuery->execute();
              while ($cidade = $cidadesQuery->fetch(PDO::FETCH_ASSOC)) {
              ?>
                <option value="<?= $cidade['idCidade'] ?>"><?= $cidade['nome'] ?> - <?= $cidade['estado'] ?></option>
              <?php
              }
              ?>
            </select>
          </div>

          <div class="form__cols">

            <div class="form__group">
              <label class="form__label" for="CEP">CEP</label>
              <input class="form__input" type="text" name="CEP" id="CEP" placeholder="Insira o CEP do negócio">
            </div>

            <div class="form__group">
              <label class="form__label" for="bairro">Bairro</label>
              <input class="form__input" type="text" name="bairro" id="bairro" placeholder="Insira o bairro do negócio">
            </div>

          </div>
          <div class="form__cols">
            <div class="form__group">
              <label class="form__label" for="rua">Rua</label>
              <input class="form__input" type="text" name="rua" id="rua" placeholder="Insira o rua do negócio">
            </div>

            <div class="form__group">
              <label class="form__label" for="numero">Número</label>
              <input class="form__input" type="text" name="numero" id="numero" placeholder="Insira o número do negócio">
            </div>
          </div>


          <hr>
          <div class="form__cols">

            <div class="form__group">
              <label class="form__label--required" for="imgAnuncioP">Imagem de anúncio pequeno</label>
              <input class="form__input" type="file" name="imgAnuncioP" id="imgAnuncioP" required>
            </div>

            <div class="form__group">
              <label class="form__label--required" for="imgAnuncioG">Imagem de anúncio grande</label>
              <input class="form__input" type="file" name="imgAnuncioG" id="imgAnuncioG" required>
            </div>
          </div>

          <div class="form__submit">
            <input class="btn--dark" type="submit" value="Registrar" name="registrar">
            <input class="btn--outline-dark" type="reset" value="Limpar">
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


      date_default_timezone_set("America/Sao_Paulo");
      $time = date("Ymd") . "_" . date("His");

      $imgName = $time . "." . $fileExtension;
      $img_final = $path . $imgName;


      move_uploaded_file($img_tmp, $img_final);

      return $imgName;
    }
  }


  if (isset($_POST['registrar'])) {

    $nome = $_POST['nome'];
    $CNPJ = $_POST['CNPJ'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $idPlano = $_REQUEST['plano'];
    $idCategoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];

    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $whatsapp = $_POST['whatsapp'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];

    if (isset($_POST['cidade'])) {
      $idCidade = $_POST['cidade'];
    }

    $CEP = $_POST['CEP'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];

    $imgAnuncioP = getImg('imgAnuncioP');
    $imgAnuncioG = getImg('imgAnuncioG');


    $result = $conexao->prepare("INSERT INTO anunciante values (null, :nome, :CNPJ, :email, :website, :descricao,:idPlano, :idCategoria,  :facebook, :instagram,  :telefone, :celular, :whatsapp, :idCidade, :CEP, :bairro, :rua, :numero, :imgAnuncioP, :imgAnuncioG)");

    $result->bindValue(":nome", $nome);
    $result->bindValue(":CNPJ", $CNPJ);
    $result->bindValue(":email", $email);
    $result->bindValue(":website", $website);
    $result->bindValue(":descricao", $descricao);
    $result->bindValue(':idPlano', $idPlano);
    $result->bindValue(":idCategoria", $idCategoria);
    $result->bindValue(":facebook", $facebook);
    $result->bindValue(":instagram", $instagram);
    $result->bindValue(":telefone", $telefone);
    $result->bindValue(":celular", $celular);
    $result->bindValue(":whatsapp", $whatsapp);
    if (isset($_POST['cidade'])) {
      $result->bindValue(":idCidade", $idCidade);
    } else {
      $result->bindValue(":idCidade", NULL);
    }
    $result->bindValue(":CEP", $CEP);
    $result->bindValue(":bairro", $bairro);
    $result->bindValue(":rua", $rua);
    $result->bindValue(":numero", $numero);
    $result->bindValue(":imgAnuncioP", $imgAnuncioP);
    $result->bindValue(":imgAnuncioG", $imgAnuncioG);
    $result->execute();
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