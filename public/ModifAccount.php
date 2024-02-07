<?php

declare(strict_types=1);

require_once('../autoload.php');

session_start();

$webPage = new Webpage();

$webPage->setTitle('Calculs quinzaines');

$webPage->appendCssUrl('css/style.css');

$solde = $_SESSION['valeurDep'] ?? 0;
$interet = $_SESSION['result'];

$quinzaine = $_SESSION['quinzaine'] ?? 1;
if ($quinzaine == 1)
    $_SESSION['duree'] *= 24;

if ($_SESSION['duree'] > 0) {
    $resultarrondi = round($_SESSION['result'], 2);

    $webPage->appendContent(
    <<<HTML
    <form action="calcul.php" method="post">
            <h1 class="h3 mb-3 font-weight-normal">QUINZAINE N°{$quinzaine}</h1>

            <label for="vers">Faire un versement (optionnel)</label>
            <input type="number" id="vers" name="vers"><br><br>
            
            <label for="retrait">Faire un retrait (optionnel)</label>
            <input type="number" id="retrait" name="retrait"><br><br>
            
            <label for="interetTaux">Nouveau taux d'intérêt (optionnel)</label>
            <input type="number" id="interetTaux" name="interetTaux"><br><br>

            <button type="submit">Recalculer</button>

            <div class="mb-3">
                Les intérêts totaux actuels sont de <span>{$resultarrondi} euros</span>.<br>
                Le solde actuel est de <span>{$solde} euros</span>.
            </div>
        </form>
    HTML
    );

    $_SESSION['quinzaine'] = $quinzaine + 1;
    $_SESSION['duree'] -= 1;
} else {
    $total = $solde + $interet;
    $_SESSION['quinzaine'] = 1;
    $totalarrondi = round($total, 2);
    $interetarrondi = round($interet, 2);
    
    $webPage->appendContent(
    <<<HTML
    <form>
            <h1 class="h3 mb-3 font-weight-normal">BILAN DES INTÉRÊTS</h1>

            <div class="mb-3">
                Vous avez au total <span>$totalarrondi euros</span>.<br>
                Cette année, vous avez perçu <span>$interetarrondi euros</span>.
            </div>
        </form>
    HTML
    );
}

echo $webPage->toHTML();
exit();
