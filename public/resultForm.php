<?php

declare(strict_types=1);

require_once('../autoload.php');

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
    $webPage = new Webpage();

    $webPage->setTitle('Erreur');

    $webPage->appendCssUrl('css/style.css');

    $webPage->appendContent(
        <<<HTML
        <form>
                <h1 class="h3 mb-3 font-weight-normal">ERREUR</h1>

                <div class="mb-3">
                    Toutes les données nécessaires n'ont pas été fournies.<br><br>
                    <span>Error 204 - Not Found</span>
                </div>
            </form>
        HTML
        );
    
    echo $webPage->toHTML();
    exit();
}
