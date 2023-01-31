<?php
$add_room_button=" ";
if (isset($_SESSION['email'])) {
    $add_room_button="<a type=button style=text-align:left; margin: 10px; font-size: 25px; href=".$router->generatePath('room-add-index').">Dodaj salę</a>";
}

use App\Model\Room;
/** @var \App\Service\Router $router */

$title = 'Wi1 Floor -1';
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

        <h1>WI1 Piętro -1</h1>
    </div>

    <a type="button" style="text-align:left; margin: 10px; font-size: 25px;" href="<?= $router->generatePath('wi1-index') ?>">Wróć</a>

    <div style="text-align: left; padding-top: 20px;">

        <svg width="1000" height="400" style="float: bottom;position:absolute;">

            <rect id="Magazyn004" x="432" y="230" width="70" height="58" onmouseover="roomHoverIn(id,'004')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="Archiwum013" x="305" y="73" width="125" height="80" onmouseover="roomHoverIn(id,'013')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="Magazyn007" x="135" y="210" width="55" height="75" onmouseover="roomHoverIn(id,'007')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            
            <rect id="Magazyn010" x="100" y="75" width="60" height="75" onmouseover="roomHoverIn(id,'010')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="katakumby" x="262" y="202" width="19" height="87" onmouseover="roomHoverIn(id)" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pietro1" x="282" y="202" width="18" height="87" onmouseover="roomHoverIn(id)" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <img src="wi1-00-katakumby.png" width="1000" height="400" >
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
