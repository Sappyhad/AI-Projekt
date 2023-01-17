<?php
if (!isset($_SESSION['email'])) {
    header("location:index.php?action=login-index");
}
/** @var \App\Model\Room $room */
/** @var \App\Service\Router $router */

$title = "Edytujesz salę o numerze: {$room->getName()}";
$bodyClass = 'index';

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
    <form action="<?= $router->generatePath('room-edit-index') ?>" method="post" class="edit-form">
        <?php require __DIR__ . DIRECTORY_SEPARATOR . 'room_form.html.php'; ?>
        <input type="hidden" name="action" value="room-edit-index">
        <input type="hidden" name="id" value="<?= $room->getId() ?>">
    </form>
    <ul class="action-list">
        <li>
            <a href="<?= $router->generatePath('wi1-index') ?>">Wróć</a></li>
        <li>
            <form action="<?= $router->generatePath('room-delete') ?>" method="post">
                <input type="submit" value="Usuń" onclick="return confirm('Jestes pewien, że chcesz usunąć?')">
                <input type="hidden" name="action" value="room-delete">
                <input type="hidden" name="id" value="<?= $room->getId() ?>">
            </form>
        </li>
    </ul>
<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
