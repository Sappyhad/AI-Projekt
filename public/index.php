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
        $view = $controller->test($_REQUEST['email'] ?? null, $_REQUEST['password'] ?? null, $templating, $router);
        break;
    case 'building-index':
        $controller = new \App\Controller\BuildingController();
        $view = $controller->indexAction($templating, $router);
        break;
    default:
        $view = 'Not found';
        break;
}

if ($view) {
    echo $view;
}
