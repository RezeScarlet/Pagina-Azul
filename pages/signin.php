<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Azul | Sign In</title>
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
    require_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/conexao.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/header.html';
  ?>

<!-- ============================================== -->

  <form action="signin.php" method="post" enctype="multipart/form-data">

    Email:
    <input type="email" name="email"><br>

    Senha:
    <input type="password" name="senha"><br>

    <input type="submit" value="Registrar" name="registrar">
    <input type="reset" value="Cancelar">

  </form>

<!-- ============================================ -->

  <br><hr><br> 

  <form action="signin.php" method="post" enctype="multipart/form-data">
    
    Nome:
    <input type="text" name="nome">
    <br>

    Plano:
    <select name="plano">
      <option value="-1" disabled selected>Planos</option>
      <?php
      // Opções do select
      $planosQuery = $conexao -> prepare('SELECT idPlano, nome FROM planos');
      $planosQuery -> execute();
      while($plano = $planosQuery->fetch(PDO::FETCH_ASSOC)) {
        ?> 
        <option value="<?= $plano['idPlano'] ?>"><?= $plano['nome'] ?></option>
        <?php
      }   
      ?>

    </select>
    <br>

    Descrição:
    <input type="text" name="descricao">
    <br>

    Imagem de Perfil:
    <input type="file" name="imgPerfil" id="imgPerfil">
    <br>

    Imagem de anuncio pequeno:
    <input type="file" name="imgAnuncioP">
    <br>

    Imagem de anuncio grande:
    <input type="file" name="imgAnuncioG">
    <br>

    Categoria:
    <select name="categoria">
      <option value="-1" disabled selected>Categoria</option>
    <?php
      // Opções do select
      $categoriasQuery = $conexao -> prepare('SELECT * FROM categorias');
      $categoriasQuery -> execute();
      while($categoria = $categoriasQuery->fetch(PDO::FETCH_ASSOC)) {
        ?> 
        <option value="<?=$categoria['idCategoria']?>"><?= $categoria['nome'] ?></option>
        <?php
      }   
      ?>
  
    </select>
    <br>

    <input type="submit" value="Registrar" name="registrar2">
    <input type="reset" value="Cancelar">
  </form>



  
  <?php
  
  function getImg($img){

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
          $time = date("Ymd")."_".date("His");

          $imgName = $time. "." .$fileExtension;
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

      
      $result = $conexao -> prepare("INSERT INTO `anunciante` values (null, :nome, :idPlano, :idCategoria, :descricao, :imgPerfil, :imgAnuncioP, :imgAnuncioG)");
      
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

    $login = $conexao -> prepare("INSERT INTO `login` VALUES (null, :email, :senha)");

    $login -> bindValue(":email", $email);
    $login -> bindvalue(":senha", md5($senha));
    $login -> execute();

  }
    ?>
    <?php
      include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/footer.html';
    ?>
</body>
</html>