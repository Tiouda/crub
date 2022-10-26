<?php
require_once "../../connect_inc.php";
$id_depot = $_POST['id_depot'];

$req = $pdo->prepare('DELETE FROM `depot` WHERE id = :id_depot');  // Suppression du depot sélectionner par l'id
$req->execute(array(
    'id_depot' => $id_depot
));
$req->closeCursor();
header('Location: ../../select/view/viewdepot.php'); // Retour sur la page liste depot