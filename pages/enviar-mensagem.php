<?php

    require $_SERVER['DOCUMENT_ROOT'] . "/config.php";
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST["email"]) && isset($_POST["mensagem"])) {

        try {

            if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
                
                $status = "E-mail informado é inválido";
                $status_message = "Informe um e-mail válido no campo E-mail.";

            } else {

                // PEGANDO INFORMAÇÕES DO FORMULÁRIO
                $nome = $_POST["nome"] ?? "";
                $email = $_POST["email"];
                $plano = $_POST["planos"] ?? "";
                $cidade = $_POST["cidade"] ?? "";
                $estado = $_POST["estado"] ?? "";
                $assunto = (isset($_POST["assunto"]) && (strlen(trim($_POST["assunto"])) > 0)) ? $_POST["assunto"] : "Para Página Azul";
                $mensagem = $_POST["mensagem"];
        
                $body = "
                        <p><b>Mensagem enviada através do site. Segue informações abaixo.</b></p>
                        <p><b>Nome:</b> " . $nome . "</p>
                        <p><b>E-mail:</b> " . $email . "</p>
                        <p><b>Plano de interesse:</b> " . $plano . "</p>
                        <p><b>Cidade:</b> " . $cidade . "</p>
                        <p><b>Estado:</b> " . $estado . "</p>
                        <p><b>Mensagem:</b><br>" . $mensagem . "</p>";
        
        
                // PHPMAILER
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->Mailer = "smtp";
                $mail->isHTML(true);
        
                $mail->SMTPDebug = 0;  
                $mail->SMTPAuth = TRUE;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;
                $mail->CharSet = "UTF-8";
                $mail->Host = EMAIL_CONFIG["from_host"];
                $mail->Username = EMAIL_CONFIG["from_address"];
                $mail->Password = EMAIL_CONFIG["from_password"];
        
                $mail->SetFrom(EMAIL_CONFIG["from_address"], "Contato pelo formulário");
                $mail->AddAddress(EMAIL_CONFIG["from_address"], EMAIL_CONFIG["from_name"]);
                $mail->AddAddress(EMAIL_CONFIG["to_address"], "Página Azul");
        
                $mail->Subject = $assunto;
                $mail->Body = $body;
    
                $status = "Mensagem enviada com sucesso!";
                $status_message = "Agradecemos o contato! Responderemos para o e-mail informado em breve.";
    
                $mail->Send();
            }

        } catch (Exception $e) {

            $status = "Erro ao enviar a mensagem";
            $status_message = "Desculpe, houve um erro ao enviar sua mensagem. Tente novamente mais tarde.";

        }

    } else {

        $status = "Página não foi acessada via formulário";
        $status_message = "Envie uma mensagem através da <a class='link' href='/contato'>página de contato.</a>";

    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Envio de mensagem</title>
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

    <div class="modal active">
        <div class="modal__content">
            <div class="modal__header">
                <h2 class="subsection-title mb-1"><?= $status ?></h2>
            </div>
            <div class="modal__body mb-4">
                <p><?= $status_message ?></p>
            </div>
            <div class="modal__footer">
                <a href="" class="btn--dark" onclick="window.history.go(-1); return false;">Voltar</a>
            </div>
        </div>
    </div>

</body>
</html>