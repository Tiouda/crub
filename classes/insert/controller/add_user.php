<?php
session_start();
require_once "../../connect_inc.php";

$sql = "INSERT INTO `user` (nom,prenom,mail,pass,tel,role)
VALUES 
(?,?,?,?,?,?)";

$pdo->prepare($sql)->execute(array(
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'mail' => $_POST['mail'],
    'pass' => password_hash($_POST['pass'], PASSWORD_DEFAULT),
    'tel' => $_POST['tel'],
    'role' => $_POST['role']
));

header('Location: ../view/user.php');
