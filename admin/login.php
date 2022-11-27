<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Azul | Admin - Login</title>
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

    require_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/conexao.php';
    
    include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/header.html';
    
  ?>

<!-- ============================================== -->

  <main id="main">
    <div class="container">
      <section class="login full-size">
        <img src="/assets/img/logos/logo.png" class="login__logo">
        <p class="subtitle">Administração</p>
        <form class="login__form" action="login.php" method="post" enctype="multipart/form-data">
          <div class="login__group">
            <span><i class="fa-solid fa-user" aria-hidden="true"></i></span>
            <input type="text" class="login__input" name="nome" id="nome" placeholder="Nome" required>
          </div>
          <div class="login__group">
            <span><i class="fa-solid fa-lock" aria-hidden="true"></i></span>
            <input type="password" class="login__input" name="senha" id="senha" placeholder="Senha" required>
          </div>
          <input type="submit" class="btn--block btn--dark" value="Entrar" name="login">
        </form>
      </section>
    </div>

  </main>

<!-- ============================================ -->
  
  <?php
      
    if (isset($_POST['login'])) {

      $nome = $_POST['nome'];
      $senha = $_POST['senha'];

      $login = $conexao -> prepare("SELECT * FROM administradores WHERE nome = :nome");
      $login -> bindValue(":nome", $nome);
      // $login -> bindvalue(":senha", password_hash($senha, PASSWORD_DEFAULT));
      $login -> execute();
      $login = $login -> fetch(PDO::FETCH_ASSOC);


      if ($login) {
        if (password_verify($senha, $login['senha'])) {
          $_SESSION['nome'] = $login['nome'];
          echo $_SESSION['nome'];
          header('location: index.php');
      } else {
        echo "Senha inválida";
      }
      } else { 
        echo "Usuário Inválido!";
      }

    }
  ?>

  <a href="#" class="back-to-top">
      <i class="fa-solid fa-arrow-up"></i>
  </a>

  <?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/footer.html';
  ?>

</body>
</html>