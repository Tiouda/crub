<?php
require_once "../../connect_inc.php";
$id_user = $_POST['id_user'];

$req = $pdo->prepare('DELETE FROM `user` WHERE id = :id_user');  // Suppression du user sélectionner par l'id
$req->execute(array(
    'id_user' => $id_user
));
$req->closeCursor();
header('Location: ../../select/view/viewuser.php'); // Retour sur la page liste user