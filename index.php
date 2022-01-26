<?php

$errors = [
        "Erreur: un des champs est vide ou n'est pas présent !",
        "Erreur: votre adresse mail doit être comprise entre 7 et 100 caractères !",
        "Erreur: votre sujet doit être compris entre 5 et 20 caractères !",
        "Erreur: votre message doit être compris entre 20 et 500 caractères !",
        "Erreur: votre adresse mail n'est pas au bon format",
];

if (isset($_GET['error'])) {
    $feedback = (int)$_GET['error'];
    if (in_array($feedback, array_keys($errors))) {
        $backgroundClass = strpos($errors[$feedback], 'Erreur: ') === 0 ? 'feedback-error' : 'feedback-success'; ?>
        <div class="feedback-message <?= $backgroundClass ?>"><?= $errors[$feedback] ?></div> <?php
}
    else { ?>
        <div class="feedback-message feedback-error">Vous avez tenté quelques choses d'incorrect !</div> <?php
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exo 169</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="/send.php" method="post">
        <div>
            <label for="id-mail">
                <input type="email" id="id-mail" name="mail" placeholder="Email">
            </label>
        </div>
        <div>
            <label for="id-subject">
                <input type="text" id="id-subject" name="subject" placeholder="Objet du message">
            </label>
        </div>
        <div>
            <label for="id-message">
                <textarea name="message" id="id-message" cols="30" rows="10"></textarea>
            </label>
        </div>
        <input type="submit" name="submit" id="id-submit">
    </form>
</body>
</html>
