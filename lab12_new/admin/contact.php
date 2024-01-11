<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admincss.css">
    <title>Panel Admina</title>
</head>
<body>
<?php
// Dodanie parametrów z pliku cfg.php w celu połączenia z bazą danych
require('./cfg.php');
// Ustawienia potrzebne do wysyłania maili do gmail za pomocą PHPMailer
require('../vendor/autoload.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Funkcja zwracająca formularz logowania
function PokazKontakt() {

    // Odkomentowac jesli chcemy uzyc tego formularza - funkcjonalność została dodana do fomrularza utworzonego wcześniej na jednej z podstron

    // $formularz = '<form class="contact-form" method="POST" action="'.$_SERVER['REQUEST_URI'].'">';
    // $formularz .= '<label for="email">Email:</label><br />';
    // $formularz .= '<input class="inp-text" type="email" name="email" id="email" required /><br />';
    // $formularz .= '<label for="temat">Temat:</label><br />';
    // $formularz .= '<input class="inp-text" type="text" name="temat" id="temat" required /><br />';
    // $formularz .= '<label for="tresc">Treść:</label><br />';
    // $formularz .= '<textarea class="content-input" type="tresc" name="tresc" id="tresc" required></textarea><br />';
    // $formularz .= '<input class="inp-btn" type="submit" name="send" value="Wyślij"></form>';

    // Wysłanie maila jeśli formularz został przesłany
    if (isset($_POST['send'])) {
        WyslijMailKontakt();
    } else {
        // Wyświetlenie informacji o błędzie, przekierowanie na stronę z formularzem kontaktowym
        echo "Nie udało się wysłać wiadomości";
        //ponizsze linijki nalezy zakomentowac jesli chcemy uzyc formularza powyzej
        sleep(2);
        header('Location: ../index.php?idp=5');
    }
    // return $formularz;
}

// Odkomentowac jesli uzywamy formularza powyzej

// echo PokazKontakt();

// Wykonanie funkcji PokazKontakt lub PrzypomnijHaslo w zaleznosci od stanu parametru $_POST['send']
if (isset($_POST['send'])) {
    echo PokazKontakt();
} else {
    echo PrzypomnijHaslo();
}

// Funkcja pozwalająca na wysłanie maila
function WyslijMailKontakt() {
    // Sprawdzenie czy pola formularza zostały wypełnione i wyświetlenie informacji o braku danych
    if (empty($_POST['temat']) || empty($_POST['tresc']) || empty($_POST['email'])) {
        echo '[nie_wypelniles_pola]';
        header('Location: ../index.php?idp=5');
    } else {
        // Ustawienie parametrów maila
        $subject = htmlspecialchars($_POST['temat']);
        $body = htmlspecialchars($_POST['tresc']);
        $sender = htmlspecialchars($_POST['email']);

        // Ustawienie PHPMailer do wysyłania maili przez gmail
        $mail = new PHPMailer(true);
        $mail -> isSMTP();
        $mail -> Host = "smtp.gmail.com";
        $mail -> SMTPAuth = true;
        $mail -> SMTPSecure = 'ssl';
        $mail -> Port = 465;

        // Ustawienie użytkownika
        $mail -> Username = "desqualm@gmail.com";
        $mail -> Password = "xrre gsex wrrb sijs";

        // Ustawienie nadawcy i odbiorcy
        $mail -> setFrom($sender);
        $mail -> addAddress('desqualm@gmail.com');

        // Ustawienie tematu i treści maila
        $mail -> Subject = $subject;
        $mail -> Body = $body."\n\nSent by: ".$sender;

        // Wysłanie maila
        $mail -> send();
        echo "Wysłano wiadomość email\n\n";
        header('Location: ../index.php?idp=5');
}
}

// Funkcja pozwalająca na przypomnienie hasła do panelu administratora
function PrzypomnijHaslo() {
    global $pass;

    // Ustawienie formularza przypominającego hasło
    $formularz = '<form method="POST" action="">';
    $formularz .= '<input class="inp-btn" type="submit" value="Przypomnij haslo" name="przypomnij"/><br />';
    $formularz .= '</form>';

    // Wysłanie maila z hasłem jeśli formularz został przesłany
    if (isset($_POST['przypomnij'])) {
        // Ustawienie tematu i treści maila z hasłem z pliku cfg.php
        $subject = "Przypomnienie Hasla";
        $body = "Hasło do panelu admina to: ".$pass;
        $sender = "desqualm@gmail.com";

        // Ustawienie PHPMailer do wysyłania maili przez gmail
        $mail = new PHPMailer(true);
        $mail -> isSMTP();
        $mail -> Host = "smtp.gmail.com";
        $mail -> SMTPAuth = true;
        $mail -> SMTPSecure = 'ssl';
        $mail -> Port = 465;

        // Ustawienie użytkownika
        $mail -> Username = "desqualm96@gmail.com";
        $mail -> Password = "xrre gsex wrrb sijs";

        // Ustawienie nadawcy i odbiorcy
        $mail -> setFrom($sender);
        $mail -> addAddress('desqualm@gmail.com');

        // Ustawienie tematu i treści maila
        $mail -> Subject = $subject;
        $mail -> Body = $body;

        // Wysłanie maila
        $mail -> send();

        echo "Wysłano wiadomość email\n\n";
        header('Location: ../index.php');
    }

    // Wyświetlenie formularza
    echo $formularz;
}

?>
</body>
</html>