<?php
$add_room_button=" ";
if (isset($_SESSION['email'])) {
    $add_room_button="<a type=button style=text-align:left; margin: 10px; font-size: 25px; href=".$router->generatePath('room-add-index').">Dodaj salę</a>";
}

$title = 'Budynki WI ZUT';


ob_start(); ?>

    <style>
        <?php include 'leaflet-1.7.1/leaflet.css'; ?>
    </style>
    <script>
        <?php require_once("leaflet-1.7.1/leaflet-src.js");?>
        <?php require_once("leaflet-1.7.1/leaflet-providers.js");?>
        <?php require_once("leaflet-1.7.1/leaflet-image.js");?>
    </script>

    <style>
        #map {
            width: 600px;
            height: 500px;
            border: 1px solid black;
        }

    </style>


    <ul class="index-list">
        <?php echo $add_room_button ?>
        <h1>Budynki WI ZUT</h1>

        <div id="map" style="float: left;"></div>

        <a type="button" style="margin: 10px" href="<?= $router->generatePath('wi1-index') ?>">Wydział Informatyki 1</a>
        <br>
        <br>
        <a type="button" style="margin: 10px" href="<?= $router->generatePath('wi2-index') ?>">Wydział Informatyki 2</a>


        <br>

        <script>
            let map = L.map('map').setView([53.447823, 14.491629], 17);
            // L.tileLayer.provider('OpenStreetMap.DE').addTo(map);
            L.tileLayer.provider('Esri.WorldImagery').addTo(map);
            //53.44711952251675, 14.492392002697505
            let marker = L.marker([53.447116128968794, 14.492376849655711]).addTo(map);
            marker.bindPopup("<strong>Wydział Informatyki 1</strong><br>Żołnierska 49, 71-210 Szczecin");

            let marker2 = L.marker([53.4486543594751, 14.491099202697148]).addTo(map);
            marker2.bindPopup("<strong>Wydział Informatyki 2</strong><br>Żołnierska 49, 71-899 Szczecin");
        </script>

    </ul>


<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';