<?php

/** @var \App\Model\Post $post */
/** @var \App\Service\Router $router */

$title = 'Login form';
$bodyClass = 'index';

ob_start(); ?>

    <div class="login-form" style="margin:auto; text-align: center;">
        <h1>Zaloguj się</h1>

        <p style="color: red">Użytkownik z takim e-mailem nie istnieje</p>
        <form action="<?= $router->generatePath('login') ?>" method="post">
            <p>Email:</p>
            <input type="text" name="email">

            <p>Hasło:</p>
            <input type="password" name="password">

            <br>
            <input type="submit" value="Zaloguj">

        </form>


    </div>


<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
