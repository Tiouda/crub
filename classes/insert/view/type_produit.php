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
    <div class="top">
        <h1>Ajouter un nouveau Type de Produit.</h1>
    </div>
    <main>


        <section>
            <?php if (isset($_SESSION['mail'])) {
                if ($_SESSION['role'] == "directeur") {
                    echo "
            <div class='contenue'>
                <form action='../controller/add_type_pdt.php' method='POST'>
                    <input type='text' placeholder='Type de Produit' name='type'>
                    <div class='send'>
                    <button>Envoyer</button>
                    </div>
                </form>
                <div class='retour'>
                <a href='../../../index.php'>retour</a>
                </div>
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
</body>

</html>