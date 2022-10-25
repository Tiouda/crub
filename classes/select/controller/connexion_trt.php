<?php
session_start();

require_once('../../connect_inc.php');

if (isset($_POST['mail']) && !empty($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
    $mail = $_POST['mail'];
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $motdepasse = $_POST['password'];
    } else {
        exit(header('Location: ../../../index.php?error_motdepasse=Mot de passe Incorrect'));
    }
} else {
    exit(header('Location: ../../../index.php?error_mail=Mail Incorrect'));
}

foreach ($pdo->query("SELECT * FROM user") as $user) {
    if ($_POST['mail'] == $user['mail']) {
        if (password_verify($motdepasse, $user['pass'])) {
            $_SESSION["id"] = $user['id'];
            $_SESSION["mail"] = $user['mail'];
            $_SESSION["nom"] = $user['nom'];
            $_SESSION["prenom"] = $user['prenom'];
            $_SESSION["tel"] = $user['tel'];
            $_SESSION['role'] = $user['role'];
            var_dump($_SESSION);
            exit(header('Location: ../../../index.php'));
        }
    }
}
