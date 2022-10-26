<?php
session_start();
require_once "../../connect_inc.php";
if ($_SERVER['SERVER_NAME'] == "localhost") {
    $path = "http://" . $_SERVER['SERVER_NAME'] . "/fil_rouge";
} else {
    $path = "https://" . $_SERVER['SERVER_NAME'];
}
?>

<?php
$no_user = true;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="<?php echo $path ?>/css/vuser.css">
    <title>Gestion de Stock - Liste des Utilisateurs</title>

</head>

<body>
    <main>
        <section>
            <h1>Liste des utilisateurs.</h1>
            <div class="bandeau1">
                <?php
                if ($_SESSION['role'] == "super") {
                    echo "     <a href=../../insert/view/user.php>Crée un employé</a>";
                } else {
                    echo "";
                } ?>
                <table>
                    <thead>
                        <?php
                        if ($_SESSION['role'] == "super") {
                            echo "     <th>Nom</th>
                        <th>Prénom</th>
                        <th>Mail</th>
                        <th>Tél</th>
                        <th>Rôle</th>
                        <th>Action</th>";
                        } else {
                            echo "<th>Nom</th>
                            <th>Prénom</th>
                            <th>Action</th>";
                        } ?>

                    </thead>
                    <tbody>
                        <?php
                        foreach ($pdo->query("SELECT * FROM `user`") as $key => $row) {
                            $no_user = false;
                            if ($_SESSION['role'] == "super") {
                                echo "
                                <tr>
                                    <td>" . $row['nom'] . "</td>
                                    <td>" . $row['prenom'] . "</td>
                                    <td>" . $row['mail'] . "</td>
                                    <td>" . $row['tel'] . "</td>
                                    <td>" . $row['role'] . "</td>

                                    <td><input type='hidden' name='id_user' value=" . $row['id'] . ">
                                    <button class='open-button'>Voir</button>
                                    
                                    <button class='open-button' onclick='openForm()'>Modifier</button>    
                                    <form  action='../../delete/controller/del_user.php' method='POST' >

                                    
                                    <button class='open-button'>Supprimer</button></form></td>
                                ";
                            } else {
                                echo "
                                <tr>
                                    <td>" . $row['nom'] . "</td>
                                    <td>" . $row['prenom'] . "</td>
                                    <td><button>Voir</button>
                                ";
                            }
                        }
                        if ($no_user == true) {
                            echo "<td colspan='6'>Aucun employé n'a était trouver </td>";
                        } ?>
                    </tbody>
                </table>

            </div>
            <div class="retour">
                <a href="../../../index.php">Retour</a>
            </div>

        </section>
        <div class="form-popup" id="myForm">
            <form name="<?php echo $row['id']; ?> " action="classes/update/controller/modif_user.php" method="POST" class="form-container" enctype="multipart/form-data">
                <?php
                $req = $pdo->query("SELECT * FROM `user`");
                foreach ($req as $user) { ?>
                    <form>
                        <label for='nom'><b>Nom</b></label>
                        <input type="hidden" class="id_user_<?php echo $user['id']; ?>" name="id" value="<?php echo $user['id']; ?>">
                        <input class="nom_<?php echo $user['id']; ?>" type="text" name="nom" value="<?php echo $user['nom']; ?>">
                        <input class="prenom_<?php echo $user['id']; ?>" type="text" name="prenom" value="<?php echo $user['prenom']; ?>">
                        <input class="mail_<?php echo $user['id']; ?>" type="text" name="mail" value="<?php echo $user['mail']; ?>">
                        <input class="tel_<?php echo $user['id']; ?>" type="text" name="tel" value="<?php echo $user['tel']; ?>">
                    <?php if ($_SESSION['role'] == "super") {
                        echo "
                <label for='role'><b>Choisissez votre rôle</b></label>
                <select name='role' value=" . $row['role'] . ">
                <option value ='directeur'>Directeur</option>
                <option value ='magasinier'>Magasinier</option>
                <button type='submit' class='btn'>Modifier</button>
                <button type='button' class='btn cancel' onclick='closeForm()'>Close</button>";
                    } else {
                        echo "
                    <button type='submit' class='btn'>Modifier</button>
                    <button type='button' class='btn cancel' onclick='closeForm()'>Close</button>";
                    }
                } ?>
                    </form>
            </form>
        </div>
    </main>
    <script src="<?php echo $path ?>/js/jquery-3.6.1.min.js"></script>
    <script src="<?php echo $path ?>/js/modif.js"></script>
</body>

</html>