<?php

require __DIR__ . '/form-utils.php';

if (!isset($_POST['submit'])) {
    header('Location: /index.php?error=0');
    exit();
}

if (!issetMandatoryPostValues('mail', 'message', 'subject')) {
    header('Location: /index.php?error=0');
    exit();
}

$mail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
$subject = getSecuredStringPostData('subject');
$message = getSecuredStringPostData('message');

validateRange(7, 100, 'mail', '/index.php?error=1');
validateRange(5, 20, 'subject', '/index.php?error=2');
validateRange(20, 500, 'message', '/index.php?error=3');

if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    header('Location: /index.php?error=4');
    exit();
}

$send = mail('stefan.hanotiau@hotmail.com', $subject, $message, $mail);
if ($send) {
    echo "Votre message a été envoyé avec succés !";
}
else {
    echo "Une erreure est suvernenue !";
}
