<?php
session_start();

session_destroy();

// creer le lien dans le quel on peut se connecter ou s'inscrire

header("Location: affiche.php");
exit;