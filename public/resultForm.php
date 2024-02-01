<?php

session_start();

if (isset($_POST['valeurDep'], $_POST['tauxInteret'], $_POST['duree'])) {
    $result = ($_POST['valeurDep'] * 15 * $_POST['tauxInteret']) / 36000;

    $_SESSION['result'] = $result;
    $_SESSION['valeurDep'] = $_POST['valeurDep'];
    $_SESSION['duree'] = $_POST['duree'];
    $_SESSION['taux'] = $_POST['tauxInteret'];

    header("Location: ModifAccount.php");
    exit();
} else {
    echo "Erreur : Toutes les données nécessaires n'ont pas été fournies.";
    exit();
}

