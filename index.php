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
        <div class="bandeau">
            <div class="titre">
                <h1>Bienvenue sur votre tableau de bord</h1>
                <?php if (isset($_SESSION['role']) == 1) {
                    echo "<h1>" . $_SESSION['role'] . "";
                } ?>
            </div>
            <div class="bouton">
                <?php if (isset($_SESSION['mail'])) {
                    echo " <form  action='classes/deconnexion.php'>
                        <input class='open-button' type='submit' value='Déconnexion'></input>
                        </form>";
                } else {
                    echo "<button class='open-button' onclick='openForm()'>Connexion";
                } ?></button>
                <div class="form-popup" id="myForm">
                    <form action="classes/select/controller/connexion_trt.php" method="POST" class="form-container">
                        <h1>Connexion</h1>

                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Email" name="mail" required>

                        <label for="psw"><b>Mot de passe</b></label>
                        <input type="password" placeholder="Mot de passe" name="password" required>

                        <button type="submit" class="btn">Login</button>
                        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                    </form>
                </div>
            </div>
        </div>

        <section>
            <div class="role">
                <a href="<?php echo $path ?>/classes/select/view/viewuser.php">
                    <div>
                        <h2>UTILISATEURS</h2>
                    </div>
                </a>
                <?php
                if (isset($_SESSION['role']) == 1) {
                    if ($_SESSION['role'] == "directeur") {
                        echo "
                <a href='classes/select/view/viewtypepdt.php'>
                    <div>
                        <h2>
                            <h2>TYPE DE PRODUITS</h2>
                        </h2>
                    </div>
                </a>
                <a href='classes/select/view/viewproduit.php'>
                <div>
                    <h2>PRODUITS</h2>
                </div>
            </a>";
                    } else {
                        echo "";
                    }
                } ?>

                <a href="<?php echo $path ?>/classes/select/view/viewdepot.php">
                    <div>
                        <h2>DEPOT</h2>
                    </div>
                </a>
            </div>
        </section>
    </main>
    <script src="<?php echo $path ?>/js/index.js"></script>

</body>

</html>