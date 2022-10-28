<?php
require_once "../../connect_inc.php";
$id_typepdt = $_POST['id_typepdt'];

$req = $pdo->prepare('DELETE FROM `type_pdt` WHERE id = :id_typepdt');  // Suppression du typepdt sélectionner par l'id
$req->execute(array(
    'id_typepdt' => $id_typepdt
));
$req->closeCursor();
header('Location: ../../select/view/viewtypepdt.php'); // Retour sur la page liste typepdt