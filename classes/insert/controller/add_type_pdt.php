<?php
session_start();
require_once "../../connect_inc.php";

$type = $_POST['type'];



try {
    $req = $pdo->prepare("INSERT INTO `type_pdt`(`type`) VALUES (:type)");
    $req->execute(array(
        'type' => $type,
    ));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
};

header('Location: ../view/type_produit.php');
