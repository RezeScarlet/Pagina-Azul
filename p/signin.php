<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Azul | SignIn</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="/assets/img/logos/logo.png" type="image/x-icon">
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CSS -->
  <link rel="stylesheet" href="../assets/css/main.css">
  <!-- JavaScript -->
  <script src="../assets/js/main.js" defer></script>
</head>
<body>

  <?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/conexao.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/header.html';
  ?>
  
  <form action="signin.php" method="post">
    
    Nome:
    <input type="text" name="nome">
    <br>

    Plano:
    <select name="plano">
      <option value="-1" disabled selected>Planos</option>
      <?php
      
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
      
      $categoriasQuery = $conexao -> prepare('SELECT * FROM categorias');
      $categoriasQuery -> execute();
      while($categoria = $categoriasQuery->fetch(PDO::FETCH_ASSOC)) {
        ?> 
        <option value="<?= $categoria['idcategoria'] ?>"><?= $categoria['nome'] ?></option>
        <?php
      }   
      ?>
  
    </select>
    <br>

    <input type="submit" value="Registrar" name="registrar">
    <input type="reset" value="Cancelar">
  </form>


  <?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/footer.html';
  ?>
  
  <?php
    if (isset($_POST['registrar'])) {
      $nome = $_POST['nome'];
      $descricao = $_POST['descricao'];
      $categoria = $_POST['categoria'];
      $idPlano = $_POST['plano'];
      $imgAnuncioP = "";
      $imgAnuncioG = "";
      
      // ===========================

      function getTime(){
        date_default_timezone_set("America/Sao_Paulo");
        $time = date("Ymd")."_".date("His");
        return $time;
      }

      function validadeImg(){

        
      }
      $path = $_SERVER['DOCUMENT_ROOT']."/assets/img/img-anunciante/";

      $imgPerfil_tmp = $_FILES["imgPerfil"]["tmp_name"];
      $imgPerfil_original = $_FILES["imgPerfil"]["name"];

      $fileExtension = strtolower(pathinfo($imgPerfil_original, PATHINFO_EXTENSION));

      $time = getTime();

      $imgName = $time. "." .$fileExtension;
      $imgPerfil_final = $path . $imgName;

      // ====================================================

      if (($fileExtension != "jpg") && ($fileExtension != "jpeg") && ($fileExtension != "png")) {
        $msg = $msg . "O arquivo selecionado não é uma imagem!";
      } else {

        move_uploaded_file($imgPerfil_tmp, $imgPerfil_final);        

        $msg = "<div class='alert alert-info'>O arquivo $imgPerfil_original foi salvo com sucesso</div>";
      }
    
      $result = $conexao -> prepare("INSERT INTO `anunciante` values (null, :nome, :idPlano, :descricao, :imgPerfil, :imgAnuncioP, :imgAnuncioG)");

        $result->bindValue(":nome", $nome);
        $result->bindValue(':idPlano', $idPlano);
        $result->bindValue(":descricao", $descricao);
        $result->bindValue(":imgPerfil", $imgName);
        $result->bindValue(":imgAnuncioP", $imgAnuncioP);
        $result->bindValue(":imgAnuncioG", $imgAnuncioG);
        $result->execute();

    } else {
        $msg = "";
      }
    
      
    echo $msg;
  ?>
</body>
</html>