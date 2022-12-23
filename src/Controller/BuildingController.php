<?php

namespace App\Controller;

use App\Service\Router;
use App\Service\Templating;

class BuildingController
{
    public function indexAction(Templating $templating, Router $router): ?string
    {
        $html = $templating->render('building/building-index.html.php', [
            'router' => $router,
        ]);
        return $html;
    }


    public function indexBuildingAction(Templating $templating, Router $router, int $buildingNumber): ?string
    {
        $html = $templating->render('building/wi' . $buildingNumber . '-index.html.php', [
            'router' => $router,
        ]);
        return $html;
    }

    public function indexFloorInBuilding(Templating $templating, Router $router, int $buildingNumber, int $floorNumber): ?string
    {
        $html = $templating->render('building/WI' . $buildingNumber .'/wi' . $buildingNumber .
            '-floor' . $floorNumber .'-index.html.php', [
            'router' => $router,
        ]);
        return $html;
    }

    public function roomInfoAction(Templating $templating, Router $router): ?string
    {
        $html = $templating->render('building/roomInfo.html.php', [
            'router' => $router,
        ]);
        return $html;
    }


}