
<?php
  require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/conexao.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . "/assets/php/unaccent.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contato | Página Azul</title>
  <!-- FAVICON -->
  <link rel="shortcut icon" href="/assets/img/logos/logo.png" type="image/x-icon">
  <!-- FONT AWESOME -->
  <script src="https://kit.fontawesome.com/d80615c6de.js" crossorigin="anonymous"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="/assets/css/main.css">
  <!-- JavaScript -->
  <script src="/assets/js/main.js" defer></script>
</head>
<body id="contato">

  <?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/header.html';
  ?>

  <main id="main">
    <section class="contact full-size">
      <div class="container">
        <h1 class="section-title">Fale conosco!</h1>
        <p class="subtitle">Interessado em um de <a href="/servicos" class="link">nossos planos</a> ou deseja fazer uma sujestão? Entre em contato a partir de um dos meios abaixo.</p>

        <div class="columns--2-1">
          <form class="form">
            <div class="form__group">
              <label for="nome" class="form__label--required">Seu nome</label>
              <input type="text" class="form__input" name="nome" id="nome" placeholder="Insira seu nome" required>
            </div>
            <div class="form__group">
              <label for="email" class="form__label--required">E-mail</label>
              <input type="text" class="form__input" name="email" id="email" placeholder="Insira seu endereço de e-mail" required>
            </div>
            <div class="form__group">
              <label for="planos" class="form__label">Plano de interesse</label>
              <select class="form__input" name="planos" id="planos">
              <option value="-1" disabled selected>Selecione o plano</option>
                <?php
                  $planosQuery = $conexao->prepare('SELECT idPlano, nome FROM planos');
                  $planosQuery->execute();
                  while ($plano = $planosQuery->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                    <option value="<?= $plano['idPlano'] ?>"
                     <?php if (isset($_GET["plano"])) { if ($_GET["plano"] == strtolower(unaccent($plano['nome']))) { echo "selected"; } }  ?>>
                     <?= $plano['nome'] ?>
                    </option>
                <?php
                  }
                ?>
              </select>
            </div>
            <div class="form__cols">
              <div class="form__group">
                <label for="cidade" class="form__label">Cidade</label>
                <input type="text" class="form__input" name="cidade" id="cidade" placeholder="Insira sua cidade">
              </div>
              <div class="form__group">
                <label for="estado" class="form__label">Estado</label>
                <input type="text" class="form__input" name="estado" id="estado" placeholder="Insira seu estado">
              </div>
            </div>
            <div class="form__group">
              <label for="assunto" class="form__label">Assunto</label>
              <input type="text" class="form__input" name="assunto" id="assunto" placeholder="Assunto a ser tratado">
            </div>
            <div class="form__group">
              <label for="mensagem" class="form__label--required">Mensagem</label>
              <textarea type="text" class="form__input" name="mensagem" id="mensagem" placeholder="Insira sua mensagem"></textarea>
            </div>
            <div class="form__submit">
              <button type="submit" class="btn--dark btn--block">Enviar mensagem</button>
            </div>
          </form>

          <div>
            <div class="contact__infos">
              <div class="contact__item">
                <svg width="35" height="35" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                  <path d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"></path>
                </svg>
                <div>
                  <span class="text-bold">Telefone</span><br>
                  <a href="#" title="Ligar">(19) 2172-0289</a>
                </div>
              </div>
              <div class="contact__item">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 448 512">
                  <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                </svg>
                <div>
                  <span class="text-bold">WhatsApp</span><br>
                  <a href="#" title="Chamar no WhatsApp">(19) 99229-8435</a>
                </div>
              </div>
              <div class="contact__item">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 512 512">
                  <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                </svg>
                <div>
                  <span class="text-bold">E-mail</span><br>
                  <a href="#" title="Enviar e-mail">contato@paginaazul.com.br</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <a href="#" class="back-to-top">
      <i class="fa-solid fa-arrow-up"></i>
  </a>

  <?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/assets/include/footer.html';
  ?>

</body>
</html>