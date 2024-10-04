<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formulareingaben
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Empfänger-E-Mail-Adresse (deine E-Mail-Adresse)
    $to = "phrugu18@gmail.com"; // Hier deine E-Mail-Adresse einfügen

    // Betreff der E-Mail
    $subject = "Kontaktanfrage von $name";

    // Nachricht
    $body = "Name: $name\n";
    $body .= "E-Mail: $email\n\n";
    $body .= "Nachricht:\n$message\n";

    // Header für die E-Mail
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // E-Mail senden
    if (mail($to, $subject, $body, $headers)) {
        // Erfolgreich gesendet - Weiterleitung auf die Danke-Seite
        header("Location: danke.html");
        exit;
    } else {
        // Fehler beim Senden
        echo "Fehler beim Senden der Nachricht. Bitte versuche es erneut.";
    }
}
?>
