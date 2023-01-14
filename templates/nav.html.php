<?php

/** @var $router \App\Service\Router */
$login = " ";
if (!isset($_SESSION['email'])){
    $login="<li><a href=".$router->generatePath('login-index').">Login</a></li>";
    }
else{
    $login = "<li><a href=".$router->generatePath('logout-index').">Wyloguj</a></li>";
}
?>
<ul>
    <li><a href="<?= $router->generatePath('') ?>">Home</a></li>
        <?php echo $login; ?>
    <li><a href="<?= $router->generatePath('building-index') ?>">Budynek</a></li>
    <li><a href="<?= $router->generatePath('employees-index') ?>">Pracownicy</a></li>
    <li>
        <form action="<?= $router->generatePath('search') ?>" method="post">
            <input type="text" name="search-value" placeholder="szukaj">
            <input type="submit" value="Wyszukaj">
        </form>
    </li>
</ul>
<?php
