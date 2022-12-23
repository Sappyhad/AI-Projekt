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
        <form method="post">
            <label>Sala:</label>
            <input type="text" name="room">
            <br>

            <label>Prowadzący:</label>
            <input type="text" name="employee">
            <br>

            <label>Link do Zajęć:</label>
            <input type="text" name="schedule">
            <br>

            <input type="submit" >
            <br>
        </form>

    </div>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
