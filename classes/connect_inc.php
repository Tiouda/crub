<?php
try {
	$pdo = new PDO('mysql:host=localhost;dbname=stock;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) // On lui demande de nous indiquer les erreur
{
	die('Erreur : ' . $e->getMessage());
}
