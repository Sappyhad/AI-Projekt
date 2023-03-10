<?php

/** @var \App\Model\Employee[] $employees */
/** @var \App\Service\Router $router */
$title = 'Zarządzaj pracownikami';
$addEmployee=$delEmployee=$editEmployee=$editCol=$delCol=" ";
if (isset($_SESSION['email'])) {
    $editCol = "<th>Edycja</th>";
    $delCol = "<th>Usuń</th>";
}
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
                    <?php echo $editCol ?>
                    <?php echo $delCol ?>
                </tr>
                </thead>
            <!-- TUTAJ WYSWIETLANIE DANYCH  -->
                <tr>
                <?php foreach ($employees as $employeee): ?>
                    <td><?= $employeee->getId() ?></td>
                    <td><?= $employeee->getName() ?></td>
                    <td><?= $employeee->getLastName() ?></td>
                    <td><?= $employeee->getPosition() ?></td>
                    <td><?= $employeee->getSchedule() ?></td>
                    <?php if (isset($_SESSION['email'])) {
                        echo "<td><a href=" . $router->generatePath('employee-edit-index', ['id' => $employeee->getId()]) . ">edytuj</a></td>";
                    }?>
                    <?php if (isset($_SESSION['email'])) {
                        echo "<td><a href=" . $router->generatePath('employee-delete', ['id' => $employeee->getId()]) . ">usuń</a></td>";
                    } ?>
                </tr>
        <?php endforeach; ?>
            </table>
        </div>

        <?php if (isset($_SESSION['email'])) {
            echo "<a style=float: right; margin-top: 20px; href=" . $router->generatePath('employee-add-index') . ">Dodaj pracownika</a>";
        }?>


    </ul>

<?php $main = ob_get_clean();
include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
