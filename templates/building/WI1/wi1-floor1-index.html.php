<?php

/** @var \App\Service\Router $router */
use App\Model\Room;
$add_room_button=" ";
if (isset($_SESSION['email'])) {
    $add_room_button="<a type=button style=text-align:left; margin: 10px; font-size: 25px; href=".$router->generatePath('room-add-index').">Dodaj salę</a>";
}
$title = 'Wi1 Floor 1';
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

        <h1>WI1 Piętro 1</h1>
    </div>

    <a type="button" style="text-align:left; margin: 10px; font-size: 25px;" href="<?= $router->generatePath('wi1-index') ?>">Wróć</a>

    <div style="text-align: left; padding-top: 20px;">

        <svg width="1000" height="400" style="float: bottom;position:absolute;">

            <rect id="pokoj101" x="700" y="203" width="55" height="87" onmouseover="roomHoverIn(id,'101')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj102" x="669" y="233" width="31" height="52" onmouseover="roomHoverIn(id,'102')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj103" x="635" y="210" width="35" height="80" onmouseover="roomHoverIn(id,'103')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            
            <rect id="pietro1.1" x="595" y="198" width="19" height="90" onmouseover="roomHoverIn(id)" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="katakumby1" x="615" y="198" width="18" height="90" onmouseover="roomHoverIn(id)" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pietro1.11" x="283" y="198" width="19" height="92" onmouseover="roomHoverIn(id)" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="katakumby11" x="265" y="198" width="19" height="92" onmouseover="roomHoverIn(id)" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>

            <img src="wi1-1-pietro1.png" width="1000" height="400" >
        </svg>

        <div id="info" ></div>
    </div>



    <script>

        function idRoom(idr){
            room1 = document.getElementById(idr);
            document.getElementById(idr).style.fill = "gray";
            document.getElementById(idr).style.cursor = "pointer";
            const displayInfo = document.createElement("div");
            const roomNumber = document.createElement("p");
            roomNumber.textContent = "Pietro -1";
            displayInfo.appendChild(roomNumber);
            displayInfo.idr = "displayInfo";
            document.getElementById("info").appendChild(displayInfo);
            room1.addEventListener("click", event=>{
                location.href='index.php?action=wi1-floor-1-index';
            });

        }

        function setValue(roomNumberValue, teacherValue, scheduleLinkValue, currentClassValue){

        }
        function roomHoverIn(id,roomNumberValue=null, teacherValue=null, scheduleLinkValue=null, currentClassValue=null, roomTeacherLikelyBeValue=null) {
            document.getElementById(id).style.fill = "gray";
            document.getElementById(id).style.cursor = "pointer";


            // TODO: tu też (argument nie tak przekazywany)
            var lol="<?php myphpfunction('"+roomNumberValue+"')?>";
            console.log(lol);
            // Nie wszystkie pola są zawsze używane w zależności od sali!
            const displayInfo = document.createElement("div");
            const roomNumber = document.createElement("p");
            const nextFloor = document.createElement("p");
            const teacher = document.createElement("p");
            const currentClass= document.createElement("p");
            const scheduleLink = document.createElement("p");
            const roomTeacherLikelyBe = document.createElement("p");


            roomNumber.textContent = "Sala: " + roomNumberValue;

            if (id.substr(0, 7)=="pietro1"){
                nextFloor.textContent = "Piętro 1";
                displayInfo.appendChild(nextFloor);
                addEventListener("click", event=>{location.href='index.php?action=wi1-floor1-index';});
            }
            else if (id.substr(0, 9)=="katakumby"){
                nextFloor.textContent = "Piętro -1";
                displayInfo.appendChild(nextFloor);
                addEventListener("click", event=>{location.href='index.php?action=wi1-floor-1-index';});
            }
            else if (id=="wyjscie"){
                nextFloor.textContent = "Wyjście";
                displayInfo.appendChild(nextFloor);
                addEventListener("click", event=>{location.href='index.php?action=building-index';});
            }else{
                teacher.textContent = "Prowadzący: " + teacherValue;
                scheduleLink.textContent = "Link do Zajęć: " + scheduleLinkValue;
                currentClass.textContent = "Aktualne zajęcia: " + currentClassValue;
                displayInfo.appendChild(roomNumber);
                displayInfo.appendChild(teacher);
                displayInfo.appendChild(scheduleLink);
                displayInfo.appendChild(currentClass);
                let link="index.php?action=roomInfo-index&id="+roomNumberValue;
                addEventListener("click", event=>{location.href=link;});
            }

            displayInfo.id = "displayInfo";

            document.getElementById("info").appendChild(displayInfo);

        }
        function roomHoverOut(id) {
            document.getElementById("displayInfo").remove();
            document.getElementById(id).style.fill = "transparent";
        }




    </script>


<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . '/..' . DIRECTORY_SEPARATOR . 'base.html.php';
