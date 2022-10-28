<?php
session_start();
require_once "../../connect_inc.php";

$nom = $_POST['nom'];
$type = $_POST['type'];
$photo = $_POST['photo'];
$description = $_POST['description'];


try {
    $req = $pdo->prepare("INSERT INTO `pdt`(`nom`, `type`, `photo`, `description`) VALUES (:nom,:type,:photo,:description)");
    $req->execute(array(
        'nom' => $nom,
        'type' => $type,
        'photo' => $photo,
        'description' => $description,
    ));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
};

header('Location: ../view/produit.php');
