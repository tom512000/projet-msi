<?php

require_once('../autoload.php');

session_start();

if ($_POST['vers'] != "") {
    $_SESSION['valeurDep'] = ($_SESSION['valeurDep'] ?? 0) + $_POST['vers'];
}

if ($_POST['retrait'] != "") {
    $_SESSION['valeurDep'] = ($_SESSION['valeurDep'] ?? 0) - $_POST['retrait'];
}

if ($_POST['interetTaux'] != "") {
    $_SESSION['taux'] = $_POST['interetTaux'];
}

$_SESSION['result'] += ($_SESSION['valeurDep'] * 15 * $_SESSION['taux']) / 36000;

header("Location: ModifAccount.php");
exit();
