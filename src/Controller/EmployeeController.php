<?php

namespace App\Controller;
use App\Exception\NotFoundException;
use App\Model\Employee;
use App\Service\Router;
use App\Service\Templating;

class EmployeeController
{
    public function indexAction(Templating $templating, Router $router): ?string
    {
        $employees = Employee::findAll();
        $html = $templating->render('employees/employees-index.html.php', [
            'employees' => $employees,
            'router' => $router,
        ]);
        return $html;
    }

    public function editEmployee(int $employeeId, ?array $requestEmployee, Templating $templating, Router $router): ?string
    {
        $employee = Employee::find($employeeId);
        if (! $employee) {
            throw new NotFoundException("Missing employee with id $employeeId");
        }

        if ($requestEmployee) {
            $employee->fill($requestEmployee);
            // @todo missing validation
            $employee->save();

            $path = $router->generatePath('employees-index');
            $router->redirect($path);
            return null;
        }

        $html = $templating->render('employees/employee-edit-index.html.php', [
            'employee' => $employee,
            'router' => $router,
        ]);
        return $html;
    }
    public function addEmployee(?array $requestEmployee, Templating $templating, Router $router): ?string
    {
        if ($requestEmployee) {
            $employee = Employee::fromArray($requestEmployee);
            // @todo missing validation
            $employee->save();

            $path = $router->generatePath('employees-index');
            $router->redirect($path);
            return null;
        } else {
            $employee = new Employee();
        }
        $html = $templating->render('employees/addEmployee-index.html.php', [
            'employee' => $employee,
            'router' => $router,
        ]);
        return $html;
    }
    public function deleteEmployee(int $employeeId, Router $router): ?string
    {
        $employee = Employee::find($employeeId);
        if (! $employee) {
            throw new NotFoundException("Missing post with id $employeeId");
        }

        $employee->delete();
        $path = $router->generatePath('employees-index');
        $router->redirect($path);
        return null;
    }   
}