<?php
session_start();
require_once "../../connect_inc.php";

$nom = $_POST['nom'];
$ville = $_POST['ville'];
$code_post = $_POST['code_post'];
$longit = $_POST['longit'];
$lat = $_POST['lat'];
$directeur = $_POST['directeur'];



try {
    $req = $pdo->prepare("INSERT INTO `depot`(`nom`,`ville`,`code_post`,`longit`,`lat`,`directeur`) VALUES(:nom,:ville,:code_post,:longit,:lat,:directeur)");
    $req->execute(array(
        'nom' => $nom,
        'ville' => $ville,
        'code_post' => $code_post,
        'longit' => $longit,
        'lat' => $lat,
        'directeur' => $directeur
    ));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
};

header('Location: ../view/depot.php');
