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
            <div>
                <?php
                if (isset($_SESSION['mail'])) {
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
                                    <td><button>Voir</button>
                                    <button>Modifier</button>
                                   <form action='../../delete/controller/del_user.php' method='post'>
                                   <input type='hidden' name='id_user' value=" . $row['id'] . ">
                                    <button>Supprimer</button> </form> </td>
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
                        }
                    } else {
                        echo "<h1 style='height: 100%; font-size: 150%; color:red;'>Connexion Requise </h1>";
                    }  ?>



                        </tbody>
                    </table>

            </div>
            <a href="../../../index.php">Retour</a>
        </section>
    </main>
    <link rel="stylesheet" href="<?php echo $path ?>/js/user.js">
</body>

</html>