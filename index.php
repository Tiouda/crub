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
                <h1>Tableau de bord</h1>
            </div>
            <div class="bouton">
                <button class="open-button" onclick="openForm()">Connexion</button>
                <div class="form-popup" id="myForm">
                    <form action="/action_page.php" class="form-container">
                        <h1>Connexion</h1>

                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Email" name="email" required>

                        <label for="psw"><b>Mot de passe</b></label>
                        <input type="password" placeholder="Mot de passe" name="psw" required>

                        <button type="submit" class="btn">Login</button>
                        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                    </form>
                </div>
                <button class="open-button" onclick="openForm2()">Inscription</button>
                <div class="form-popup" id="myForm2">
                    <form action="/action_page.php" class="form-container">
                        <h1>Inscription</h1>

                        <label for="nom"><b>Nom</b></label>
                        <input type="text" placeholder="Votre nom" name="nom" required>

                        <label for="prenom"><b>Prénom</b></label>
                        <input type="text" placeholder="Votre prénom" name="prenom" required>

                        <label for="psw"><b>Mot de passe</b></label>
                        <input type="password" placeholder="Votre mot de passe" name="psw" required>

                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Votre mail" name="email" required>

                        <label for="tel"><b>Numéro de téléphone</b></label>
                        <input type="text" placeholder="Votre numéro de téléphone" name="tel" required>

                        <button type="submit" class="btn">Login</button>
                        <button type="button" class="btn cancel" onclick="closeForm2()">Close</button>
                    </form>
                </div>
            </div>
        </div>
        <section>
            <div class="role">
                <a href="<?php echo $path ?>/classes/select/view/viewuser.php">
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
    <script src="<?php echo $path ?>/js/index.js"></script>

</body>

</html>