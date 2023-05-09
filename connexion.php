<?php
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // INCLURE LA BASE DE DONNEE DANS LE FORMULAIRE
    $mysqli = require __DIR__ . "/bdd.php"; 

    $sql = sprintf("SELECT * FROM user 
                    WHERE email = '%s'", 
                    $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

// Verifier le mot de pass de la base de donnée

if ($user) {
    if (password_verify($_POST["password"], $user["password_hash"])) {
        
        session_start();

        session_regenerate_id();

        $_SESSION["user_id"] = $user["id"];

        header("Location: affiche.php");
        exit;
    }
}
$is_invalid = true;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CONNEXION</title>
</head>
<body>
    <h1>CONNEXION</h1>

    <?php if($is_invalid) : ?>
        <em>Connexion invalide</em>
    <?php endif; ?>

    <form action="" method="POST">
        <div>
        <label for="">VOTRE EMAIL</label>
        <input type="email" name="email" id="email" 
            value="<?= htmlspecialchars($_POST['email'] ?? "") ?>" placeholder="Votre email">
        </div>

        <div>
            <label for="password">VOTRE MOT DE PASSE</label>
            <input type="password" name="password" id="password" placeholder="Votre mot de passe">
        </div>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>