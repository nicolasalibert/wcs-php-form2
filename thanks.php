<?php

$firstName = $_POST["user_first_name"];
$lastName = $_POST["user_last_name"];
$email = $_POST["user_email"];
$phoneNumber = $_POST["user_phone_number"];
$subject = $_POST["msg_subject"];
$msg = $_POST["user_message"];

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // nettoyage et validation des données soumises via le formulaire 
    if (!isset($firstName) || trim($firstName) === '')
        $errors[] = "Le prénom est obligatoire";
    if (!isset($lastName) || trim($lastName) === '')
        $errors[] = "Le nom est obligatoire";

    if (!isset($email) || trim($email) === '') {
        $errors[] = "L'email est obligatoire";
    } else if (!filter_var($_POST["user_email"], FILTER_VALIDATE_EMAIL))
        $errors[] = "Le format d'email est invalide";

    if (!isset($phoneNumber) || trim($phoneNumber) === '')
        $errors[] = "Le numéro de téléphone est obligatoire";
    if (!isset($subject) || trim($subject) === '')

        $errors[] = "Le sujet du message est obligatoire";
    if (!isset($msg) || trim($msg) === '')
        $errors[] = "Le message est obligatoire";

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php // Affichage des éventuelles erreurs 
    if (count($errors) > 0) { ?>
        <div>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li>
                        <?= $error ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php } else { ?>

        <p>Merci
            <?= $firstName . " " . $lastName ?> de nous avoir contacté à propos de "
            <?= $subject ?>”.
        </p>

        <p>Un de nos conseillers vous contactera soit à l'adresse
            <?= $email ?> ou par téléphone au
            <?= $phoneNumber ?> dans les plus
            brefs
            délais pour traiter votre demande :
        </p>

        <p>
            <?= $msg ?>
        </p>

    <?php } ?>
</body>

</html>