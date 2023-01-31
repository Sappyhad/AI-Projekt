<?php

/** @var \App\Service\Router $router */
use App\Model\Room;
$add_room_button=" ";
if (isset($_SESSION['email'])) {
    $add_room_button="<a type=button style=text-align:left; margin: 10px; font-size: 25px; href=".$router->generatePath('room-add-index').">Dodaj salę</a>";
}
$title = 'Wi1 Floor 3';
$bodyClass = 'index';

ob_start();
# TODO: poprawić funckję myphpfunction
function myphpfunction($id){
    $xd = "18";
    $room = Room::find_by_name($id);

    if ($room == null) {
        $mydata = $xd.gettype($xd).'Call by function declaration PHP '.$id.gettype($id);
    } else {
        $mydata = $room->getTeacherLastName();
    }
    echo $mydata;
    return $mydata;
}?>
<?php echo $add_room_button ?>
    <div style="margin:auto; text-align: center;">

        <h1>NIE MA XD</h1>
    </div>




<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . '/..' . DIRECTORY_SEPARATOR . 'base.html.php';
