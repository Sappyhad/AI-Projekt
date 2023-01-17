<?php
/** @var \App\Model\Room $room */
/** @var \App\Service\Router $router */
$sala = $prowadzacy = $link = $aktualne = $edytuj=$del=$add_room_button= " ";
$title = 'Wi1 Sala 001';
$bodyClass = 'index';
if (!$room){
    $sala="Sala: 001";
    $prowadzacy="Prowadzący: XYZ";
    $link = "Link do Zajęć: XYZ";
    $aktualne = "Aktualne zajęcia: XYZ";
    if (isset($_SESSION['email'])) {
        $edytuj = "<a type=button style=text-align:left; margin: 10px; font-size: 25px; href=" . $router->generatePath('room-add-index') . ">Dodaj salę</a>";
    }
}
else{
    $sala = "Sala: ".$room->getName();
    $prowadzacy = "Prowadzący: ".$room->getTeacherName() . " " . $room->getTeacherLastName();
    $link = "Link do Zajęć: ".$room->getLinkToSubjects();
    $aktualne="Aktualne zajęcia: XYZ";
    if (isset($_SESSION['email'])) {
        $edytuj = "<td><a href=" . $router->generatePath('room-edit-index', ['id' => $room->getId()]) . ">edytuj</a></td></br>";
        $del = "<a type=button style=text-align:left; margin: 10px; font-size: 25px; href=" . $router->generatePath('room-delete',['id' => $room->getId()]) . ">usuń salę</a>";
    }
}

ob_start(); ?>
    <div style="margin:auto; text-align: center;">
        <h1>WI1 Piętro 0</h1>
    </div>

    <a type="button" style="text-align:left; margin: 10px; font-size: 25px;" href="<?= $router->generatePath('wi1-index') ?>">Wróć</a>

    <div style="text-align: center; padding-top: 20px;">
        <p><?php echo $sala?></p>
        <p><?php echo $prowadzacy ?></p>
        <p><?php echo $link ?></p>
        <p><?php echo $aktualne ?></p>
    </div>

    <div style="text-align: right;font-size: 24px;">
        <?php echo $edytuj ?>
        <?php echo $del ?>
    </div>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
