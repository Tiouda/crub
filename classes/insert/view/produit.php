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
<div class="top">
            <h1>Ajouter un nouveau produit</h1>
        </div>
    <main>
       

        <section>
            <div class="contenue">
                <form action="../controller/add_produit.php" method="POST">
                    <input type="text" placeholder="Nom" name="nom">
                    <input type="file" name="photo">
                    <input type="text" placeholder="Description" name="description">
                    <select name="type">
                        <?php foreach ($pdo->query('SELECT * FROM type_pdt ') as $key => $row) {
                            echo "
                        <option  value=" . $row['id'] . ">" . $row['id'] . "" . ' - ' . "" . $row['type'] . "
                        ";
                        } ?>
                    </select>
                    <div class='send'>
                    <button>Envoyer</button>
                    </div>
                </form>
                <div class="retour">
                    <a href="<?php echo $path ?>/index.php">Retour</a>
                </div>
            </div>
        </section>

    </main>

</body>

</html>