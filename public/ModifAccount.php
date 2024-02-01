<?php

declare(strict_types=1);

require_once('../autoload.php');

session_start();

$webPage = new Webpage();

$webPage->setTitle('Modif 15aine');

$solde = $_SESSION['valeurDep'] ?? 0;
$interet = $_SESSION['result'];

$quinzaine = $_SESSION['quinzaine'] ?? 1;
if ($quinzaine == 1)
    $_SESSION['duree'] *= 24;

if ($_SESSION['duree'] > 0) {
    $webPage->appendContent(
        <<<HTML
<p>Voici votre solde actuel : $solde</p>
<p>Vous êtes à la $quinzaine quinzaine</p>
    <div>
        <form action="calcul.php" method="post">
            <label for="vers">Faire un versement (optionnel)</label>
            <input type="number" id="vers" name="vers"><br><br>
            
            <label for="retrait">Faire un retrait (optionnel)</label>
            <input type="number" id="retrait" name="retrait"><br><br>
            
            <label for="interetTaux">Nouveau taux d'intérêt (optionnel)</label>
            <input type="number" id="interetTaux" name="interetTaux"><br><br>
            
            <button type="submit">Calculer</button>
        </form>
    </div>
<p> Les interets totaux actuel sont de : {$_SESSION['result']}</p>
HTML
    );

    $_SESSION['quinzaine'] = $quinzaine + 1;
    $_SESSION['duree'] -= 1;
} else {
    $total = $solde + $interet;
    $_SESSION['quinzaine'] = 1;
    $webPage->appendContent(
        <<<HTML
<p>C'est fini voici votre argent : $total €</p>
<p>Cette année vous avez perçu : $interet €</p>

HTML
    );
}
echo $webPage->toHTML();
exit();