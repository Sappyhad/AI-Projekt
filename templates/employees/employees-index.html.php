<?php

/** @var \App\Service\Router $router */

$title = 'Zarządzaj pracownikami';

ob_start(); ?>
    <style>
        table, th, td {
            border: 1px solid;
        }

        table {
            width: 100%;
        }
    </style>

    <ul class="index-list">
        <div style="text-align: center">
            <h1>Zarządzaj pracownikami</h1>


            <table class="table table-bordered table-striped table-hover table-responsive-xl">
                <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>Stanowisko</th>
                    <th>Plan Zajęc</th>
                    <th>Edycja</th>
                    <th>Usuń</th>
                </tr>
                </thead>

            <!-- TUTAJ WYSWIETLANIE DANYCH  -->
                <tr>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td><a href="<?= $router->generatePath('employee-edit-index') ?>">edytuj</a></td>
                    <td><a href="<?= $router->generatePath('employee-delete') ?>">usuń</a></td>
                </tr>
            </table>
        </div>

        <a style="float: right; margin-top: 20px;" href="<?= $router->generatePath('employee-add-index') ?>">Dodaj pracownika</a>


    </ul>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
