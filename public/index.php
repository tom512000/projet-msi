<?php

declare(strict_types=1);

require_once('../autoload.php');

$webPage = new Webpage();

$webPage->setTitle('Calcul d\'intérêts');

$webPage->appendCssUrl('css/style.css');

$webPage->appendContent(
    <<<HTML
<form action="resultForm.php" method="post">
        <h1 class="h3 mb-3 font-weight-normal">CALCUL D'INTÉRÊTS</h1>

        <label for="valeurDep">Valeur de départ :</label>
        <input type="number" id="valeurDep" name="valeurDep" required><br><br>
        
        <label for="tauxInteret">Taux d'intérêt (%):</label>
        <input type="number" id="tauxInteret" name="tauxInteret" required><br><br>
        
        <label for="duree">Durée (en années) :</label>
        <input type="number" id="duree" name="duree" required><br><br>
        
        <button type="submit">Calculer</button>
    </form>
HTML
);

echo $webPage->toHTML();
