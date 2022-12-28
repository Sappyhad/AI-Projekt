<?php

/** @var \App\Service\Router $router */

$title = 'Wi1 Floor 0';
$bodyClass = 'index';

ob_start(); ?>
    <div style="margin:auto; text-align: center;">
        <h1>WI1 Piętro 0</h1>
    </div>

    <a type="button" style="text-align:left; margin: 10px; font-size: 25px;" href="<?= $router->generatePath('wi1-index') ?>">Wróć</a>

    <div style="text-align: left; padding-top: 20px;">

        <svg width="1000" height="400" style="float: bottom;position:absolute;">

            <rect id="wc23A/23B" x="92" y="73" width="32" height="90" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj24" x="125" y="73" width="31" height="90" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj25" x="157" y="73" width="31" height="59" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj26" x="189" y="73" width="31" height="90" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj27" x="221" y="73" width="31" height="90" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj28" x="252" y="73" width="31" height="90" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="wc29/30" x="284" y="73" width="39" height="90" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="bufet31" x="324" y="73" width="125" height="90" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="bufet31A" x="449" y="73" width="55" height="90" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj32" x="505" y="73" width="68" height="90" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj33" x="573" y="73" width="67" height="90" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj33" x="573" y="73" width="161" height="90" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj34" x="735" y="73" width="33" height="90" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj35" x="768" y="73" width="18" height="35" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj36" x="786" y="73" width="46" height="56" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj37" x="786" y="130" width="24" height="30" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj36A" x="810" y="130" width="24" height="30" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj8" x="786" y="161" width="24" height="35" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj9" x="810" y="161" width="24" height="35" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>

            <rect id="pokoj10" x="790" y="202" width="44" height="84" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="dziekanat11" x="700" y="202" width="89" height="84" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj13" x="669" y="233" width="31" height="52" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj14" x="639" y="202" width="31" height="84" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="komunikacja" x="377" y="198" width="223" height="87" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj16" x="321" y="198" width="31" height="87" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj17" x="255" y="198" width="29" height="87" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj18" x="222" y="198" width="31" height="87" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj19" x="187" y="198" width="32" height="87" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj20" x="155" y="198" width="32" height="87" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj22" x="92" y="198" width="62" height="42" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>
            <rect id="pokoj22" x="92" y="240" width="62" height="44" style="fill:transparent;stroke-width:1;stroke:rgb(0,0,0);"/>


            <img src="wi1-0-parter-1.jpg" width="1000" height="400" >
        </svg>

        <div id="info" ></div>
    </div>



<script>

    let room1 = document.getElementById("pokoj24");

    function setValue(roomNumberValue, teacherValue, scheduleLinkValue, currentClassValue){

    }
    function roomHoverIn(id,roomNumberValue, teacherValue, scheduleLinkValue, currentClassValue, roomTeacherLikelyBeValue) {
        document.getElementById(id).style.fill = "gray";
        document.getElementById(id).style.cursor = "pointer";

        // Nie wszystkie pola są zawsze używane w zależności od sali!
        const displayInfo = document.createElement("div");
        const roomNumber = document.createElement("p");
        const teacher = document.createElement("p");
        const currentClass= document.createElement("p");
        const scheduleLink = document.createElement("p");
        const roomTeacherLikelyBe = document.createElement("p");


        roomNumber.textContent = "Sala: " + roomNumberValue;
        teacher.textContent = "Prowadzący: " + teacherValue;
        scheduleLink.textContent = "Link do Zajęć: " + scheduleLinkValue;
        currentClass.textContent = "Aktualne zajęcia: " + currentClassValue;

        displayInfo.appendChild(roomNumber);
        displayInfo.appendChild(teacher);
        displayInfo.appendChild(scheduleLink);
        displayInfo.appendChild(currentClass);
        displayInfo.id = "displayInfo";

        document.getElementById("info").appendChild(displayInfo);

    }
    function roomHoverOut() {
        document.getElementById("displayInfo").remove();
        this.style.fill = "transparent";
    }

    room1.addEventListener("click", event=>{
       location.href='index.php?action=roomInfo-index';
    });
    room1.addEventListener("mouseover", () => roomHoverIn("pokoj24","24", "XYZ", "XYZ", "XYZ", "XYZ"));
    room1.addEventListener("mouseout", roomHoverOut)



</script>


<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . '/..' . DIRECTORY_SEPARATOR . 'base.html.php';
