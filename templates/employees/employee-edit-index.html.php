<?php
if (!isset($_SESSION['email'])) {
    header("location:index.php?action=login-index");
}
/** @var \App\Model\Employee $employee */
/** @var \App\Service\Router $router */

$title = "Edytujesz Pracownika o numerze w bazie: {$employee->getId()}";

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
    <form action="<?= $router->generatePath('employee-edit-index') ?>" method="post" class="edit-form">
        <?php require __DIR__ . DIRECTORY_SEPARATOR . 'empl_form.html.php'; ?>
        <input type="hidden" name="action" value="employee-edit-index">
        <input type="hidden" name="id" value="<?= $employee->getId() ?>">
    </form>
    <ul class="action-list">
        <li>
            <a href="<?= $router->generatePath('employees-index') ?>">Wróć do listy</a></li>
        <li>
            <form action="<?= $router->generatePath('employee-delete') ?>" method="post">
                <input type="submit" value="Usuń" onclick="return confirm('Jestes pewien, że chcesz usunąć?')">
                <input type="hidden" name="action" value="employee-delete">
                <input type="hidden" name="id" value="<?= $employee->getId() ?>">
            </form>
        </li>
    </ul>
<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';