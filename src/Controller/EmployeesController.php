<?php

namespace App\Controller;

use App\Service\Router;
use App\Service\Templating;

class EmployeesController
{
    public function indexAction(Templating $templating, Router $router): ?string
    {
        $html = $templating->render('employees/employees-index.html.php', [
            'router' => $router,
        ]);
        return $html;
    }

    public function editEmployee(Templating $templating, Router $router): ?string
    {
        $html = $templating->render('employees/employee-edit-index.html.php', [
            'router' => $router,
        ]);
        return $html;
    }

    public function addEmployee(Templating $templating, Router $router): ?string
    {
        $html = $templating->render('employees/addEmployee-index.html.php', [
            'router' => $router,
        ]);
        return $html;
    }
}