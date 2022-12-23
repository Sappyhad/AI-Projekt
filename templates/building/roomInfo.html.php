<?php

/** @var \App\Service\Router $router */

$title = 'Wi1 Sala 001';
$bodyClass = 'index';

ob_start(); ?>
    <div style="margin:auto; text-align: center;">
        <h1>WI1 Piętro 0</h1>
    </div>

    <a type="button" style="text-align:left; margin: 10px; font-size: 25px;" href="<?= $router->generatePath('wi1-index') ?>">Wróć</a>

    <div style="text-align: center; padding-top: 20px;">
        <p>Sala: 001</p>
        <p>Prowadzący: XYZ</p>
        <p>Link do Zajęć: XYZ</p>
        <p>Aktualne zajęcia: XYZ</p>
    </div>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
