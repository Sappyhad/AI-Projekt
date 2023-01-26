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

            <rect id="wc23A/23B" x="92" y="73" width="32" height="90" onmouseover="roomHoverIn(id,'23')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj24" x="125" y="73" width="31" height="90" onmouseover="roomHoverIn(id,'24')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj25" x="157" y="73" width="31" height="59" onmouseover="roomHoverIn(id,'25')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj26" x="189" y="73" width="31" height="90" onmouseover="roomHoverIn(id,'26')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj27" x="221" y="73" width="31" height="90" onmouseover="roomHoverIn(id,'27')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj28" x="252" y="73" width="31" height="90" onmouseover="roomHoverIn(id,'28')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="wc29" x="284" y="73" width="19" height="90" onmouseover="roomHoverIn(id,'29')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="wc30" x="303" y="73" width="20" height="90" onmouseover="roomHoverIn(id,'30')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="bufet31" x="324" y="73" width="125" height="90" onmouseover="roomHoverIn(id,'31')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="bufet31A" x="449" y="73" width="55" height="90" onmouseover="roomHoverIn(id,'31_A')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj32" x="505" y="73" width="68" height="90" onmouseover="roomHoverIn(id,'32')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj33" x="573" y="73" width="161" height="90" onmouseover="roomHoverIn(id,'33')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj34" x="735" y="73" width="33" height="90" onmouseover="roomHoverIn(id,'34')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj35" x="768" y="73" width="18" height="35" onmouseover="roomHoverIn(id,'35')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj36" x="786" y="73" width="46" height="56" onmouseover="roomHoverIn(id,'36')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj37" x="786" y="130" width="24" height="30" onmouseover="roomHoverIn(id,'37')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj36A" x="810" y="130" width="24" height="30" onmouseover="roomHoverIn(id,'36_A')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj8" x="786" y="161" width="24" height="35" onmouseover="roomHoverIn(id,'8')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj9" x="810" y="161" width="24" height="35" onmouseover="roomHoverIn(id,'9')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>

            <rect id="pokoj10" x="790" y="202" width="44" height="84" onmouseover="roomHoverIn(id,'10')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="dziekanat11" x="700" y="202" width="89" height="84" onmouseover="roomHoverIn(id,'11')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj13" x="669" y="233" width="31" height="52" onmouseover="roomHoverIn(id,'13')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj14" x="639" y="202" width="31" height="84" onmouseover="roomHoverIn(id,'14')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pietro1.1" x="620" y="198" width="19" height="87" onmouseover="roomHoverIn(id)" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="katakumby1" x="602" y="198" width="18" height="87" onmouseover="roomHoverIn(id)" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>

            <rect id="komunikacja" x="377" y="198" width="223" height="87" onmouseover="roomHoverIn(id,'15')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj16" x="321" y="198" width="31" height="87" onmouseover="roomHoverIn(id,'16')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="katakumby" x="284" y="198" width="19" height="87" onmouseover="roomHoverIn(id)" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pietro1" x="303" y="198" width="18" height="87" onmouseover="roomHoverIn(id)" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj17" x="255" y="198" width="29" height="87" onmouseover="roomHoverIn(id,'17')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj18" name="18" x="222" y="198" width="31" height="87" onmouseover="roomHoverIn(id,'18')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj19" x="187" y="198" width="32" height="87" onmouseover="roomHoverIn(id,'19')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj20" x="155" y="198" width="32" height="87" onmouseover="roomHoverIn(id,'20')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj21" x="92" y="198" width="62" height="42" onmouseover="roomHoverIn(id,'21')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj22" x="92" y="240" width="62" height="44" onmouseover="roomHoverIn(id,'22')" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="wyjscie" x="330" y="294" width="180" height="50" onmouseover="roomHoverIn(id)" onmouseout="roomHoverOut(id)" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>


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
