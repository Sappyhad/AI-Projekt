<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

$config = new \App\Service\Config();

$templating = new \App\Service\Templating();
$router = new \App\Service\Router();

$action = $_REQUEST['action'] ?? null;
switch ($action) {
    case 'post-index':
    case null:
        $controller = new \App\Controller\MainController();
        $view = $controller->indexAction($templating, $router);
        break;
    case 'login-index':
        $controller = new \App\Controller\LoginController();
        $view = $controller->indexAction($templating, $router);
        break;
    case 'login':
        $controller = new \App\Controller\LoginController();
        $view = $controller->login($_REQUEST['email'] ?? null, $_REQUEST['password'] ?? null, $templating, $router);
        break;
    case 'building-index':
        $controller = new \App\Controller\BuildingController();
        $view = $controller->indexAction($templating, $router);
        break;
    case 'wi1-index':
        $controller = new \App\Controller\BuildingController();
        $view = $controller->indexBuildingAction($templating, $router, 1);
        break;
    case 'wi2-index':
        $controller = new \App\Controller\BuildingController();
        $view = $controller->indexBuildingAction($templating, $router, 2);
        break;
    case 'wi1-floor0-index':
        $controller = new \App\Controller\BuildingController();
        $view = $controller->indexFloorInBuilding($templating, $router, 1,0);
        break;
    case 'wi1-floor-1-index':
        $controller = new \App\Controller\BuildingController();
        $view = $controller->indexFloorInBuilding($templating, $router, 1,-1);
        break;
    case 'wi1-floor1-index':
        $controller = new \App\Controller\BuildingController();
        $view = $controller->indexFloorInBuilding($templating, $router, 1,1);
        break;
    case 'wi1-floor2-index':
        $controller = new \App\Controller\BuildingController();
        $view = $controller->indexFloorInBuilding($templating, $router, 1,2);
        break;
    case 'wi1-floor3-index':
        $controller = new \App\Controller\BuildingController();
        $view = $controller->indexFloorInBuilding($templating, $router, 1,3);
        break;
    case 'wi2-floor0-index':
        $controller = new \App\Controller\BuildingController();
        $view = $controller->indexFloorInBuilding($templating, $router, 2,0);
        break;
    case 'wi2-floor-1-index':
        $controller = new \App\Controller\BuildingController();
        $view = $controller->indexFloorInBuilding($templating, $router, 2,-1);
        break;
    case 'wi2-floor1-index':
        $controller = new \App\Controller\BuildingController();
        $view = $controller->indexFloorInBuilding($templating, $router, 2,1);
        break;
    case 'wi2-floor2-index':
        $controller = new \App\Controller\BuildingController();
        $view = $controller->indexFloorInBuilding($templating, $router, 2,2);
        break;
    case 'wi2-floor3-index':
        $controller = new \App\Controller\BuildingController();
        $view = $controller->indexFloorInBuilding($templating, $router, 2,3);
        break;
    case 'roomInfo-index':
        $controller = new \App\Controller\BuildingController();
        $view = $controller->roomInfoAction($templating, $router);
        break;
    case 'employees-index':
        $controller = new \App\Controller\EmployeesController();
        $view = $controller->indexAction($templating, $router);
        break;
    case 'edit-room-index':
        $controller = new \App\Controller\BuildingController();
        $view = $controller->editRoomIndexAction($templating, $router);
        break;
    case 'employee-edit-index':
        $controller = new \App\Controller\EmployeesController();
        $view = $controller->editEmployee($templating, $router);
        break;
    case 'employee-add-index':
        $controller = new \App\Controller\EmployeesController();
        $view = $controller->addEmployee($templating, $router);
        break;
    default:
        $view = 'Not found';
        break;
}

if ($view) {
    echo $view;
}
