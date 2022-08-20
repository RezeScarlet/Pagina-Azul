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
    include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/header.html';
  ?>
  
  <form action="signin.php" method="post">
    
    Nome:
    <input type="text" name="nome">
    <br>

    Plano:
    <select name="plano">
      <option value="1">Gratis</option>
      <option value="2">Pago 1</option>
      <option value="3">Pago 2</option>
    </select>
    <br>

    Descrição:
    <input type="text" name="descrição">
    <br>

    Imagem de Perfil:
    <input type="file" name="" id="">
    <br>

    Imagem de anuncio pequeno:
    <input type="file" name="" id="">
    <br>
    
    Imagem de anuncio grande:
    <input type="file" name="" id="">


  </form>


  <?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/footer.html';
  ?>
  
</body>
</html>