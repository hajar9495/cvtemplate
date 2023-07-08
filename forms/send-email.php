<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send-email</title>
</head>

<body>


    <?php
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
    }


    //Include required PHPMailer files
    require 'includes/PHPMailer.php';
    require 'includes/SMTP.php';
    require 'includes/Exception.php';

    // require "vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    // $mail->Username = "jajar9495@gmail.com";
    // $mail->Password = "euoofvapkjkquihy"; 

    // pour cette adresse
    $mail->Username = "hajarmennai@gmail.com";
    $mail->Password = "bwrfwfscylxsuwam";

    $mail->setFrom("hajarmennai@gmail.com");
    $mail->addAddress('hajarmennai@gmail.com', 'hajar');
    $mail->isHTML(true);
    // $mail ->
    $mail->Subject = "Message recu du formulaire de contact: " . $name;
    $mail->Body = "<strong>Name: <strong>" . $name . "<br> <strong> Email: <strong>" . $email . "<br> <strong> Objet: <strong>" . $subject . '<br> <strong> Vous a ecris le message suivant:<strong> <br>' . $message;
    $mail->isHTML(true);
    if ($mail->send()) {
        header("Location: infoPratiques.php?msg=Votre message a bien été envoyé");
        // echo "Email Sent..!";
    } else {
        echo "Message could not be sent. Mailer Error: ";
    }
    $mail->smtpClose();
    // $mail->send();
    ?>
</body>

</html>