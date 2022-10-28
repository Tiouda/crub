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
$no_type_pdt = true;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="<?php echo $path ?>/css/vuser.css">
    <title>Gestion de stock - Liste des produits</title>

</head>

<body>
    <main>
        <section>
            <h1>Liste des produits</h1>
            <div class="bandeau1">
                <?php
                if (isset($_SESSION['mail'])) {
                    if ($_SESSION['role'] == "directeur") {
                        echo "     <a href=../../insert/view/produit.php>Créer un produit</a>";
                    } else {
                        echo "";
                    } ?>
                    <table>
                        <thead>
                            <?php
                            if ($_SESSION['role'] == "directeur") {
                                echo "
                        <th>Nom</th>
                        <th>Type</th>
                        <th>Photo</th>
                        <th>Description</th>
                        <th>Action</th>";
                            } else {
                                echo "
                            <th>Nom</th>
                            <th>Photo</th>";
                            } ?>

                        </thead>
                        <tbody>
                        <?php
                        foreach ($pdo->query("SELECT * FROM `pdt` INNER JOIN  type_pdt ON pdt.id = type_pdt.id") as $key => $row) {
                            $no_type_pdt = false;
                            if ($_SESSION['role'] == "directeur") {
                                echo "
                                    <tr>
                                    <td>" . $row['nom'] . "</td>
                                        <td>" . $row['type'] . "</td>
                                        <td>" . $row['photo'] . "</td>
                                        <td>" . $row['description'] . "</td>
                                        <td><button class='open-button'>Voir</button>
                                        <button class='open-button'>Modifier</button>
                                        <form action='../../delete/controller/del_depot.php' method='post'>
                                        <input type='hidden' name='id_user' value=" . $row['id'] . ">
                                        <button class='open-button'>Supprimer</button> </form> </td>
                                        </tr>
                                    ";
                            } else {
                                echo "";
                            }
                        }
                    }
                    if ($no_type_pdt == true) {
                        echo "<td colspan='5'>Aucun produit pour l'instant</td>";
                    }
                        ?>
                        </tbody>
                    </table>

            </div>
            <div class="retour">
                <a href="../../../index.php">Retour</a>
            </div>
        </section>
    </main>
    <script src="<?php echo $path ?>/js/index.js"></script>
</body>

</html>