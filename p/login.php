<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Azul | SignIn</title>
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

  <form action="login.php" method="post" enctype="multipart/form-data">

    Email:
    <input type="email" name="email"><br>

    Senha:
    <input type="password" name="senha"><br>

    <input type="submit" value="Entrar" name="login">
    <input type="reset" value="Cancelar">

  </form>

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
      session_start();
      $_SESSION['email'] = $login['email'];
      echo $_SESSION['email'];
    } else { 
      echo "errouuuuuuu!";
    }

  }
    ?>
    <?php
      include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/footer.html';
    ?>
</body>
</html>