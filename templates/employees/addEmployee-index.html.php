<?php

/** @var \App\Model\Employee[] $employee */
/** @var \App\Service\Router $router */

$title = 'Dodaj pracownika';

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
    <form action="<?= $router->generatePath('employee-add-index') ?>" method="post" class="edit-form">
        <?php require __DIR__ . DIRECTORY_SEPARATOR . 'empl_form.html.php'; ?>
        <input type="hidden" name="action" value="employee-add-index">
    </form>

    <a href="<?= $router->generatePath('employees-index') ?>">Wróć do listy</a>
<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
