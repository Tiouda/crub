<?php
session_start();
require_once "../../connect_inc.php";

$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$tel = $_POST['tel'];
$role = $_POST['role'];
// modification des données
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // création de la requête
    $sql = $pdo->prepare("UPDATE user SET
    nom = :nom,
    prenom = :prenom,
    mail= :mail,
    tel= :tel,
    role= :role
    WHERE id = $id");
}

$sql->execute(array(
    'id' => $id,
    'nom' => $nom,
    'prenom' => $prenom,
    'mail' => $mail,
    'tel' => $tel,
    'role' => $role
));
$sql->closeCursor();
header('Location: ../../select/view/viewuser.php'); // Retour sur la page liste user
