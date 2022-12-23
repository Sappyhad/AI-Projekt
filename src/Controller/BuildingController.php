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


}