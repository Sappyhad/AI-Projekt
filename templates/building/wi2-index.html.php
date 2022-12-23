<?php

/** @var \App\Service\Router $router */

$title = 'Wi2';
$bodyClass = 'index';

ob_start(); ?>

    <div style="margin:auto; text-align: center;">
        <h1>WI2</h1>

        <a type="button" style="margin: 10px" href="<?= $router->generatePath('wi2-floor-1-index') ?>">Piętro -1</a>
        <a type="button" style="margin: 10px" href="<?= $router->generatePath('wi2-floor0-index') ?>">Piętro 0</a>
        <a type="button" style="margin: 10px" href="<?= $router->generatePath('wi2-floor1-index') ?>">Piętro 1</a>
        <a type="button" style="margin: 10px" href="<?= $router->generatePath('wi2-floor2-index') ?>">Piętro 2</a>
        <a type="button" style="margin: 10px" href="<?= $router->generatePath('wi2-floor3-index') ?>">Piętro 3</a>

        <br>

    </div>

    <div style="text-align: center; padding-top: 20px">
        <svg width="800" height="400" style="float: bottom;">
            <rect width="800" height="400" style="fill:white;stroke-width:10;stroke:rgb(0,0,0)" />
        </svg>
    </div>



<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
