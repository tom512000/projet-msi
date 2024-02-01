<?php

declare(strict_types=1);

require_once('../autoload.php');

$webPage = new Webpage();

$webPage->setTitle('ll');

$webPage->appendContent(
    <<<HTML
        Pd
HTML
);

echo $webPage->toHTML();