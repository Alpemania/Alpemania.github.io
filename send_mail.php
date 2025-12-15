<?php
// Simple mail handler. Configure $TO with your email before use.
$TO = 'you@example.com'; // <-- change this to your real email

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Méthode non autorisée';
    exit;
}

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (!$name || !$email || !$message) {
    header('Location: index.php?sent=0');
    exit;
}

$subject = "Contact depuis le site : " . $name;
$body = "Nom: $name\nEmail: $email\n\n$message";
$headers = "From: $name <$email>" . "\r\n" . "Reply-To: $email";

$ok = false;
// try PHP mail()
if (function_exists('mail')) {
    $ok = mail($TO, $subject, $body, $headers);
}

// If mail() unavailable, show instructions (useful on GitHub Pages which doesn't run PHP)
if ($ok) {
    header('Location: index.php?sent=1');
} else {
    // Fail-safe: show a simple page with copyable mailto link/instructions
    header('Content-Type: text/html; charset=utf-8');
    ?>
    <!doctype html>
    <html lang="fr"><head><meta charset="utf-8"><title>Envoi impossible</title></head><body>
    <h1>Impossible d'envoyer le mail depuis ce serveur</h1>
    <p>Copiez ce texte et envoyez-le depuis votre messagerie si nécessaire :</p>
    <pre><?php echo htmlspecialchars($body); ?></pre>
    <p>Vous pouvez configurer l'adresse de destination dans <code>send_mail.php</code> et utiliser un vrai serveur PHP/SMTP.</p>
    <p><a href="index.php">Retour</a></p>
    </body></html>
    <?php
}

?>
