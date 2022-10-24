<?php
session_start();
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
    <link rel="stylesheet" href="<?php echo $path ?>/css/main.css">
    <title>Gestion de Stock</title>

</head>

<body>
    <main>
        <div class="titre">
            <h1>Tableau de bord</h1>
        </div>
        <section>
            <div class="role">
                <a href="<?php echo $path ?>/classes/insert/view/user.php">
                    <div>
                        <h2>Utilisateurs</h2>
                    </div>
                </a>
                <a href="">
                    <div>
                        <h2>
                            <h2>Type de Produit</h2>
                        </h2>
                    </div>
                </a>
                <a href="">
                    <div>
                        <h2>Produits</h2>
                    </div>
                </a>
                <a href="">
                    <div>
                        <h2>Dépot</h2>
                    </div>
                </a>
            </div>
        </section>
    </main>
    <script src="<?php echo $path ?>/js/main.js"></script>
</body>

</html>