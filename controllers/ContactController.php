<?php
    require_once("../config.php");
    require_once("../PHPMailer/src/PHPMailer.php");
    require_once("../PHPMailer/src/SMTP.php");
    require_once("../PHPMailer/src/Exception.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST['name']))
        $name = $_POST['name'];
    else
        $name = "unknown";

    if (isset($_POST['email']))
        $email = $_POST['email'];
    else
        $email = "unknown";

    if (isset($_POST['tel']))
        $tel = $_POST['tel'];
    else
        $tel = "unknown";

    if (isset($_POST['message']))
        $message = nl2br($_POST['message']);
    else
        $message = "unknown";

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host       = Config::$MAIL_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = Config::$MAIL_LOGIN;
        $mail->Password   = Config::$MAIL_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // To load the French version
        $mail->setLanguage('fr', '/PHPMailer-6.1.4/language/');
        $mail->CharSet    = PHPMailer::CHARSET_UTF8;

        //Recipients
        $mail->setFrom($email);
        $mail->addAddress(Config::$MAIL_LOGIN);
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = "Message depuis le site";
        $mail->Body    = '<b>Nom: </b>'.$name.'<br/><b>Téléphone: </b>'.$tel.'<br/><p>'.$message.'</p>';
        
        $mail->send();
        $serialized_data = '{"type":"success", "message":"Votre message a bien été envoyé"}';
    } catch (Exception $e) {
        $serialized_data = '{"type":"danger", "message":"Erreur lors de l\'envoi de votre message: {'.$mail->ErrorInfo.'"}';
    }
    echo $serialized_data;
?>