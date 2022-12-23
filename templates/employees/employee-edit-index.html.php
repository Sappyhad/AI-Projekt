<?php

/** @var \App\Service\Router $router */

$title = 'Edytuj pracownika';

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
            <h1>Edytuj pracownika</h1>

            <form method="post">
                <label>Imię:</label>
                <input type="text" name="firstName">
                <br>

                <label>Nazwisko:</label>
                <input type="text" name="lastName">
                <br>

                <label>Stanowsko:</label>
                <input type="text" name="position">
                <br>

                <label>Stanowsko:</label>
                <input type="text" name="position">
                <br>

                <label>Stanowsko:</label>
                <input type="text" name="schedule">
                <br>

                <input type="submit" >
                <br>
            </form>

        </div>


    </ul>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
