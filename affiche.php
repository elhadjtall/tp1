<?php

session_start();

if (isset($_SESSION['user_id'])) {
    $mysqli = require __DIR__ . "/bdd.php";

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCEUIL</title>
</head>
<body>
    <h1>BIENVENU SUR LA PAGE</h1>

    <?php if (isset($user)) : ?>
    <p>Bonjour <?= htmlspecialchars($user["nom"]) ?> </p>

    <p>Vous pouvez vous deconnecter<a href="deconnexion.php"> Deconnexion</a></p>

<?php else: ?>

    <p>Vous pouvez vous inscrire <a href="inscription.php">Inscrire</a> ou Vous connecter <a href="connexion.php">Se connecter</a></p>

<?php endif ; ?>
</body>
</html>