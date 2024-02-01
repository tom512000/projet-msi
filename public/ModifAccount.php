<?php

declare(strict_types=1);

require_once('../autoload.php');

session_start();

$webPage = new Webpage();

$webPage->setTitle('Modif 15aine');

$solde = $_SESSION['valeurDep'] ?? 0;
$interet = $_SESSION['result'] ?? 0;
$count = 0;
if ($_SESSION['duree'] and $count != 1) {
    $duree = ($_SESSION['duree'] * 24);
    $quinzaine = 1;
    $count += 1;
}

if ($duree) {
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
HTML
    );
} else {
    $total = $solde + $interet;
    $webPage->appendContent(
        <<<HTML
<p>C'est fini voici votre argent : $total €</p>
<p>Cette année vous avez perçu : $interet €</p>
HTML
    );
}
$quinzaine += 1;
$duree -= 1;
echo $webPage->toHTML();
exit();