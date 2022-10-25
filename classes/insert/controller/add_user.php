<?php
session_start();
require_once "../../connect_inc.php";

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$tel = $_POST['tel'];
$role = $_POST['role'];


try {
    $req = $pdo->prepare("INSERT INTO `user`(`nom`, `prenom`, `mail`, `pass`,`tel`,`role`) VALUES (:nom,:prenom,:mail,:pass,:tel,:role)");
    $req->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'mail' => $mail,
        'pass' => password_hash($pass, PASSWORD_DEFAULT),
        'tel' => $tel,
        'role' => $role,
    ));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
};

header('Location: ../view/user.php');
