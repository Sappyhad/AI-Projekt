<?php


$title = 'Home';

ob_start(); ?>

    <ul class="index-list">
        <h1>Hello</h1>


    </ul>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
