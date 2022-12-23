<?php
/** @var $router \App\Service\Router */

?>
<ul>
    <li><a href="<?= $router->generatePath('') ?>">Home</a></li>
    <li><a href="<?= $router->generatePath('login-index') ?>">Login</a></li>
    <li><a href="<?= $router->generatePath('building-index') ?>">Budynek</a></li>
</ul>
<?php
