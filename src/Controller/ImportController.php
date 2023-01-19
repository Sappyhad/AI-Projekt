<?php

namespace App\Controller;


use App\Service\Router;
use App\Service\Templating;

class ImportController
{

    public function indexAction(Templating $templating, Router $router): ?string
    {
        $html = $templating->render('import/employee-import.html.php', [
            'router' => $router,
        ]);
        return $html;
    }


}