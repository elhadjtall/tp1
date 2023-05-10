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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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