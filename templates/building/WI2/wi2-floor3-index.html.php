<?php
$add_room_button=" ";
if (isset($_SESSION['email'])) {
    $add_room_button="<a type=button style=text-align:left; margin: 10px; font-size: 25px; href=".$router->generatePath('room-add-index').">Dodaj salę</a>";
}
/** @var \App\Service\Router $router */

$title = 'Wi2 Floor 3';
$bodyClass = 'index';

ob_start(); ?>
    <?php echo $add_room_button ?>
    <div style="margin:auto; text-align: center;">
        <h1>WI2 Piętro 3</h1>
    </div>

    <a type="button" style="text-align:left; margin: 10px; font-size: 25px;" href="<?= $router->generatePath('wi2-index') ?>">Wróć</a>

    <div style="text-align: left; padding-top: 20px;">
        <svg width="800" height="400" style="float: bottom;">

            <rect width="800" height="400" style="fill:white;stroke-width:5;stroke:rgb(0,0,0)"/>

            <!--     SALA 301       -->
            <rect id="test" class="test" width="150" height="150" style="fill:white;stroke-width:5;stroke:black"/>
            <text x="60" y="75" fill="black" font-weight="bold">301</text>
        </svg>

        <div id="info" style="float: right ;"></div>
    </div>



    <script>

        let room1 = document.getElementById("test");

        function roomHoverIn() {
            this.style.cursor = "pointer";
            this.style.fill = "gray";

            // Nie wszystkie pola są zawsze używane w zależności od sali!
            const displayInfo = document.createElement("div");
            const roomNumber = document.createElement("p");
            const teacher = document.createElement("p");
            const currentClass= document.createElement("p");
            const scheduleLink = document.createElement("p");
            const roomTeacherLikelyBe = document.createElement("p");


            roomNumber.textContent = "Sala: 301";
            teacher.textContent = "Prowadzący: XYZ";
            scheduleLink.textContent = "Link do Zajęć: XYZ";
            currentClass.textContent = "Aktualne zajęcia: XYZ";

            displayInfo.appendChild(roomNumber);
            displayInfo.appendChild(teacher);
            displayInfo.appendChild(scheduleLink);
            displayInfo.appendChild(currentClass);
            displayInfo.id = "displayInfo";

            document.getElementById("info").appendChild(displayInfo);

        }
        function roomHoverOut() {
            document.getElementById("displayInfo").remove();
            this.style.fill = "white";
        }

        room1.addEventListener("click", event=>{
            location.href='index.php?action=roomInfo-index';

        });

        room1.addEventListener("mouseover", roomHoverIn);
        room1.addEventListener("mouseout", roomHoverOut)


    </script>


<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . '/..' . DIRECTORY_SEPARATOR . 'base.html.php';
