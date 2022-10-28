<?php
session_start();
require_once "../../connect_inc.php";
if ($_SERVER['SERVER_NAME'] == "localhost") {
    $path = "http://" . $_SERVER['SERVER_NAME'] . "/fil_rouge";
} else {
    $path = "https://" . $_SERVER['SERVER_NAME'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="<?php echo $path ?>/css/user.css">
    <title>Gestion de Stock</title>

</head>

<body>
    <main>
        <h1>Ajouter un nouveau Type de Produit.</h1>
        <section>
            <?php if (isset($_SESSION['mail'])) {
                if ($_SESSION['role'] == "directeur") {
                    echo "
            <div class='contenue'>
                <form action='../controller/add_type_pdt.php' method='POST'>
                    <input type='text' placeholder='Type de Produit' name='type'>
                    <button>Envoyer</button>
                </form>
                <a href='../../../index.php'>retour</a>
            </div>";
                } else {
                    echo "
                Vous n'avez rien as faire ici !!";
                }
            } else {
                echo "
            Vous n'avez rien as faire ici !!";
            }   ?>
        </section>

    </main>
    <link rel="stylesheet" href="<?php echo $path ?>/js/user.js">
</body>

</html>