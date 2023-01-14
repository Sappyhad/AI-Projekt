<?php

namespace App\Controller;


use App\Model\User;
use App\Service\Router;
use App\Service\Templating;

class LoginController
{
    public function indexAction(Templating $templating, Router $router): ?string
    {
        $html = $templating->render('login/login.html.php', [
            'router' => $router,
        ]);
        return $html;
    }


    public function login($email, $password, Templating $templating, Router $router): ?string
    {

        $user = User::find($email);

        if($user == null){
            $html = $templating->render('login/user-not-exist.html.php', [
                'router' => $router,
            ]);
            return $html;
        }

        if($user->getPassword() != $password){
            $html = $templating->render('login/wrong-password.html.php', [
                'router' => $router,
            ]);
            return $html;
        }
        
        $_SESSION['email'] = $user->getEmail();
        $controller = new \App\Controller\MainController();
        return $controller->indexAction($templating, $router);
    }

    public function logout(Templating $templating, Router $router): ?string{
        session_destroy();
        $html = $templating->render('login/login.html.php', [
            'router' => $router,
        ]);
        return $html;
    }
}