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
    <link rel="stylesheet" href="<?php echo $path ?>/css/vuser.css">
    <title>Gestion de Stock</title>

</head>

<body>
    <main>
        <section>
            <h1>Liste des employes</h1>
            <div>
                <table>
                    <thead>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Mail</th>
                        <th>Tél</th>
                        <th>Rôle</th>
                        <th col="3">Action</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pdo->query("SELECT * FROM `user`") as $key => $row) {
                            echo "
                            <tr>
                                <td>" . $row['nom'] . "</td>
                                <td>" . $row['prenom'] . "</td>
                                <td>" . $row['mail'] . "</td>
                                <td>" . $row['tel'] . "</td>
                                <td>" . $row['role'] . "</td>
                                <td><button>Voir</button></td>
                           ";
                        } ?>
                        <?php if (isset($_SESSION['super']) && isset($_SESSION['directeur'])) {
                            echo " <td><button>Supprimer</button></td>
                                   <td><button>Modifier</button></td>
                            </tr>
                            ";
                        } else {
                            echo "";
                        }; ?>
                    </tbody>
                </table>
            </div>
        </section>

    </main>
    <link rel="stylesheet" href="<?php echo $path ?>/js/user.js">
</body>

</html>