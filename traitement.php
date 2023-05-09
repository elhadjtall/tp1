<?php
if (empty($_POST["nom"])) {
    echo "Le nom est requis";
}
if (strlen($_POST["password"]) < 8){
    echo "Le mot de passe est trop court";
}
if (!preg_match("/[a-z]/i", $_POST["password"])) {
    echo "Le mot de passe doit contenir au moins une lettre";
}
if (!preg_match("/[0-9]/", $_POST["password"])) {
    echo "Le mot de passe doit contenir au moins un chiffre de 0 à 9";
}
if ($_POST["password"] !== $_POST["password_confirmation"]){
    echo "Les mots de passe doivent être identiques";
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

// Lie le formulaire à la base de données
$mysqli = require __DIR__ . "/bdd.php";

$sql = "INSERT INTO user (nom, email, password_hash) VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)){
    die ("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss", $_POST["nom"], $_POST["email"], $password_hash);

if ($stmt->execute()){
    header("Location: succes.html");
} else {
    if ($mysqli->errno === 1062) {
        echo "L'email est déjà utilisé";
    } else {
        die ($mysqli->error ." " . $mysqli->errno);
    }
}
