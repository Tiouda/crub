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
    <title>Nouveau produit</title>

</head>

<body>
    <main>
        <h1>Ajouter un nouveau produit</h1>
        <section>
            <div class="contenue">
                <form action="../controller/produit.php" method="POST">
                    <input type="text" placeholder="Nom" name="nom">
                    <input type="file" name="photo">
                    <input type="text" placeholder="Description" name="description">
                    <select name="type" id="">
                        <option>Type de produit</option>
                        <option value="finis">Produit finis</option>
                        <option value="semi_finis">Semi finis</option>
                        <option value="matière">Matière première</option>
                    </select>
                    <button>Envoyer</button>
                </form>
                <div class="retour">
                    <a href="<?php echo $path ?>/index.php">Retour</a>
                </div>
            </div>
        </section>

    </main>
    <link rel="stylesheet" href="<?php echo $path ?>/js/user.js">
</body>

</html>