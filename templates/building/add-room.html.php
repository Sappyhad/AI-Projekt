<?php

/** @var \App\Model\Room[] $room */
/** @var \App\Service\Router $router */

$title = 'Dodaj pomieszczenie';

ob_start(); ?>
    <style>
        table, th, td {
            border: 1px solid;
        }

        table {
            width: 100%;
        }
    </style>

<h1><?= $title ?></h1>
    <form action="<?= $router->generatePath('room-add-index') ?>" method="post" class="edit-form">
        <?php require __DIR__ . DIRECTORY_SEPARATOR . 'room_form.html.php'; ?>
        <input type="hidden" name="action" value="room-add-index">
    </form>

    <a href="<?= $router->generatePath('building-index') ?>">Wróć</a>
<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
