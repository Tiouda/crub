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
    <title>Gestion de Stock - Liste des Type de Produit.</title>

</head>

<body>
    <main>
        <section>
            <h1>Liste des Type de Produit.</h1>
            <div class="bandeau1">
                <?php
                if (isset($_SESSION['mail'])) {
                    if ($_SESSION['role'] == "directeur") {
                        echo "     <a href=../../insert/view/type_produit.php>Crée un Type de Produit.</a>";
                    } else {
                        echo "";
                    } ?>
                    <table>
                        <thead>
                            <?php
                            if ($_SESSION['role'] == "directeur") {
                                echo "
                        <th>Type</th>
                        <th>Action</th>";
                            } else {
                                echo "Vous n'avez pas à être ici !!";
                            } ?>

                        </thead>
                        <tbody>
                        <?php
                        foreach ($pdo->query("SELECT * FROM `type_pdt`") as $key => $row) {
                                $no_type_pdt = false;
                                if ($_SESSION['role'] == "directeur") {
                                    echo "
                                    <tr>
                                        <td>" . $row['type'] . "</td>
                                        <td><button class='open-button'>Voir</button>
                                        <button class='open-button'>Modifier</button>
                                        <form action='../../delete/controller/del_type_pdt.php' method='post'>
                                        <input type='hidden' name='id_typepdt' value=" . $row['id'] . ">
                                        <button class='open-button'>Supprimer</button> </form> </td>
                                        </tr>
                                    ";
                                } else {
                                    echo "";
                                }
                            }
                        }
                        if ($no_type_pdt == true) {
                            echo "<td colspan='2'>Aucun Type de Produit n'a était trouver </td>";
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