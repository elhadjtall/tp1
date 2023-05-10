<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>IINSCRIPTION</title>
</head>
<body>
    <h1>INSCRIPTION</h1>
    <form action="traitement.php" method="POST" id="inscrire" novalidate>
        <div>
            <label for="">VOTRE NOM ET PRENOM</label>
            <input type="text" name="nom" id="nom" id="nom" placeholder="Votre nom et prenom">
        </div>
        
        <div>
            <label for="">VOTRE EMAIL</label>
            <input type="email" name="email" id="email" placeholder="Votre email">
        </div>

        <div>
            <label for="">VOTRE MOT DE PASSE</label>
            <input type="password" name="password" id="passwor" placeholder="Votre mot de passe">
        </div>

        <div>
            <label for="">CONFIRMER VOTRE MOT DE PASSE</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmer votre mot de passe">
        </div>

        <button type="submit"> S'inscrire</button>
    </form>
</body>
</html>

