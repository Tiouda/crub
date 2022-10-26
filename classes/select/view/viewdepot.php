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
$no_depot = true;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="<?php echo $path ?>/css/vuser.css">
    <title>Gestion de Stock - Liste des Dépôts.</title>

</head>

<body>
    <main>
        <section>
            <h1>Liste des Dépôts.</h1>
            <div>
                <?php
                if (isset($_SESSION['mail'])) {
                    if ($_SESSION['role'] == "directeur") {
                        echo "     <a href=../../insert/view/user.php>Crée un Dépôt.</a>";
                    } else {
                        echo "";
                    } ?>
                    <table>
                        <thead>
                            <?php
                            if ($_SESSION['role'] == "directeur") {
                                echo "     <th>Nom</th>
                        <th>Ville</th>
                        <th>Code Postal</th>
                        <th>Longitude</th>
                        <th>Latitude</th>
                        <th>Directeur</th>
                        <th>Action</th>";
                            } else {
                                echo "<th>Nom</th>
                            <th>Ville</th>
                            <th>Code Postal</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
                            <th>Directeur</th>
                            <th>Action</th>";
                            } ?>

                        </thead>
                        <tbody>
                        <?php
                        foreach ($pdo->query("SELECT * FROM `depot`") as $key => $row) {
                            foreach ($pdo->query("SELECT * FROM `user` WHERE id =" . $row['directeur']) as $key2 => $row2) {
                                $no_depot = false;
                                if ($_SESSION['role'] == "directeur") {
                                    echo "
                                    <tr>
                                        <td>" . $row['nom'] . "</td>
                                        <td>" . $row['ville'] . "</td>
                                        <td>" . $row['code_post'] . "</td>
                                        <td>" . $row['longit'] . "</td>
                                        <td>" . $row['lat'] . "</td>
                                        <td>" . $row2['nom'] . "" . ' ' . "" . $row2['prenom'] . "</td>
                                        <td><button>Voir</button>
                                        <button>Modifier</button>
                                       <form action='../../delete/controller/del_depot.php' method='post'>
                                       <input type='hidden' name='id_user' value=" . $row['id'] . ">
                                        <button>Supprimer</button> </form> </td>
                                        </tr>
                                   ";
                                } else {
                                    echo "
                                    <tr>
                                    <td>" . $row['nom'] . "</td>
                                    <td>" . $row['ville'] . "</td>
                                    <td>" . $row['code_post'] . "</td>
                                    <td>" . $row['longit'] . "</td>
                                    <td>" . $row['lat'] . "</td>
                                    <td>" . $row2['nom'] . "" . ' ' . "" . $row2['prenom'] . "</td>
                                    <td><button>Voir</button></td>
                                    </tr>
                                   ";
                                }
                            }
                        }
                        if ($no_depot == true) {
                            echo "<td colspan='7'>Aucun dépôt n'a était trouver </td>";
                        }
                    } else {
                        echo "<h1 style='font-size: 150%; color:red;'>Connexion Requise </h1>";
                    }  ?>



                        </tbody>
                    </table>

            </div>
            <a href="../../../index.php">Retour</a>
        </section>
    </main>
    <script src="<?php echo $path ?>/js/index.js"></script>
</body>

</html>