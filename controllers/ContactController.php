<?php
    require_once("../config.php");

    if (isset($_POST['name']))
        $name = $_POST['name'];
    else
        $name = "unknown";

    if (isset($_POST['email']))
        $email = $_POST['email'];
    else
        $email = "unknown";

    if (isset($_POST['message']))
        $message = nl2br($_POST['message']);
    else
        $message = "unknown";

    $from = $email;
    $message = '<b>Nom:</b>'.$name. '<br/><b>Email:</b>'.$email.'<br/><p>'.$message.'</p>';
    $headers = "From: $from\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";

    if (mail(Config::$MAIL_HOST, Config::$MAIL_TITLE, $message, $headers))
    {
        $serialized_data = '{"type":"success", "message":"Votre message a bien été envoyé"}';
        return $serialized_data;
    }
    else
    {
        $serialized_data = '{"type":"danger", "message":"Erreur lors de l\'envoie du message, merci de reessayer plus tard"}';
        return $serialized_data;
    }
?>