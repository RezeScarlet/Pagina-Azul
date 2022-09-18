<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Azul | Login</title>
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

    include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/header.html';

    require_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/conexao.php';
    
  ?>

<!-- ============================================== -->

  <main>
    <div class="container">
      <section class="login full-size">
        <img src="/assets/img/logos/Logo.png" class="login__logo">
        <p class="subtitle">Login na Página Azul</p>
        <form class="login__form" action="login.php" method="post" enctype="multipart/form-data">
          <div class="login__group">
            <span><i class="fa-solid fa-envelope" aria-hidden="true"></i></span>
            <input type="email" class="login__input" name="email" id="email" placeholder="E-mail">
          </div>
          <div class="login__group">
            <span><i class="fa-solid fa-lock" aria-hidden="true"></i></span>
            <input type="password" class="login__input" name="senha" id="senha" placeholder="Senha">
          </div>
          <input type="submit" class="btn--block btn--dark" value="Entrar" name="login">
        </form>
      </section>
    </div>
  </main>

<!-- ============================================ -->
  
  <?php
      
    if (isset($_POST['login'])) {

      $email = $_POST['email'];
      $senha = $_POST['senha'];

      $login = $conexao -> prepare("SELECT * FROM login WHERE email = :email AND senha = :senha");

      $login -> bindValue(":email", $email);
      $login -> bindvalue(":senha", md5($senha));
      $login -> execute();

      $login = $login -> fetch(PDO::FETCH_ASSOC);

      if ($login) {
        $_SESSION['email'] = $login['email'];
        $_SESSION['ID'] = $login['idLogin'];
        echo $_SESSION['email'];
        header('location: editar.php');
      } else { 
        echo "errouuuuuuu!";
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