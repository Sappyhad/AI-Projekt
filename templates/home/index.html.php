<?php
$welcome = " ";
if (!isset($_SESSION['email'])){
    $welcome = "<h1>Witaj nieznajomy</h1>";
    }
else{
    $welcome="<h1>Witaj ".$_SESSION['email']."</h1>";
}

$title = 'Home';

ob_start(); ?>

    <ul class="index-list">
      <?php echo $welcome; ?>


    </ul>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
