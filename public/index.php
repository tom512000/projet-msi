<?php

declare(strict_types=1);

require_once('../autoload.php');

$webPage = new Webpage();

$webPage->setTitle('Calcul d\'intérêts');

$webPage->appendContent(
    <<<HTML
    <div>
        <form action="resultForm.php" method="post">
            <label for="valeurDep">Valeur de départ :</label>
            <input type="number" id="valeurDep" name="valeurDep" required><br><br>
            
            <label for="tauxInteret">Taux d'intérêt (%):</label>
            <input type="number" id="tauxInteret" name="tauxInteret" required><br><br>
            
            <label for="duree">Durée (en années) :</label>
            <input type="number" id="duree" name="duree" required><br><br>
            
            <button type="submit">Calculer</button>
        </form>
    </div>
HTML
);

echo $webPage->toHTML();
?>
