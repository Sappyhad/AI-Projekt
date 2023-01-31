<?php
use App\Model\Employee;
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


    <div>
        <input type="radio" name="przycisk" id="pracownik" onclick="showPracownik()" >Pracownik</input>
        <br>
        <input type="radio" name="przycisk" id="sala"  onclick="showSala()">Sala</input>
    </div>
    <div id="employeeList" class="Lista" style="display: none;">
        <form method="post">
            <div class="">
                <h1 >Wyszukaj pracownika</h1></div>
            <input type="hidden" name="function" value="function1">
            <label for="employeeName">Imię</label>
            <input type="text" name="employeeName">
            <br>

            <label for="employeeSurname">Nazwisko</label>
            <input type="text" name="employeeSurname">
            <br>
            <label for="date">Data</label>
            <input type="date" name="date" id="date">
            <br>
            <label for="time">Godzina</label>
            <input type="text" name="godzinaRozpoczecia">
            <input type="text" name="godzinaZakonczenia">

            <br>
            <input type="submit">

        </form>
    </div>
    <script>
        var date = new Date();

        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;

        var today = year + "-" + month + "-" + day;
        document.getElementById("date").value = today;
    </script>


    <div id="roomList" class="Lista" style="display: none;">
        <form method="POST">
            <div class="">
                <h1 >Wyszukaj Salę</h1></div>
            <input type="hidden" name="function" value="function2">
            <label for="roomNumber">Numer Sali</label>
            <input type="text" name="roomNumber">
            <br>
            <label for="buildingNumber">Numer budynku</label>
            <input type="text" name="buildingNumber">
            <br>
            <label for="date2">Data</label>
            <input type="date" name="date2" id="date2">
            <br>
            <label for="time">Godzina</label>
            <input type="text" name="godzinaRozpoczecia">
            <input type="text" name="godzinaZakonczenia">

            <br>

            <input type="submit">

        </form>
    </div>

    <script>
        var date = new Date();

        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;

        var today = year + "-" + month + "-" + day;
        document.getElementById("date2").value = today;
    </script>
    <script>
        const targetDiv = document.getElementById("employeeList");
        const btn = document.getElementById("pracownik");
        const targetDiv2 = document.getElementById("roomList");
        const btn2 = document.getElementById("sala");
        const error2 = document.getElementById("error2");
        let tabelaDane = document.getElementById("tabelaDane");
        function showPracownik()
        {
            targetDiv.style.display = "block";
            targetDiv2.style.display = "none";
            error2.style.display="none";
            tabelaDane.style.display="none";
            tabelaDane.remove();
        };


        function showSala()
        {
            targetDiv.style.display = "none";
            targetDiv2.style.display = "block";
            error2.style.display="none";
            tabelaDane.style.display="none";
            tabelaDane.remove();

        };


    </script>

    <style>

        th, td {
            border: 1px solid;

        }
    </style>


    <script>
        function zajecia(nazwa){
            let today = new Date();
            let todayDay = today.toISOString().slice(0, 10);
            let todayTime = today.getHours();
            let zajeciaInfo = [];
            //`https://plan.zut.edu.pl/schedule_student.php?teacher=${nazwa}&start=${today}`
            // fetch(`https://cors-anywhere.herokuapp.com/https://plan.zut.edu.pl/schedule_student.php?teacher=${nazwa}&start=${todayDay}T${todayTime}`)
            fetch(`https://plan.zut.edu.pl/schedule_student.php?teacher=${nazwa}&start=${today}`)
                .then((response) => {
                    console.log(response);
                    //--> [object Response]
                    console.log(response.body);
                    //--> [object ReadableStream]

                    return response.json();
                })
                .then((data) => {

                    console.log(data);
                    //sprawdzanie czy jest odpowiednia godzina, ale to zależy czy plan.zut updateuje jako 1 pozycję najbliższe / trwające zajęcia
                    for(let i = 1; i < data.length; i++){
                        if(data[i].start.split('T')[0] == todayDay){
                            if((data[i].start.split('T')[1].slice(0,2) <= todayTime && data[i].end.split('T')[1].slice(0,2) >= todayTime) || data[i].start.split('T')[1].slice(0,2) >= todayTime){
                                zajeciaInfo.push(data[i].start.split('T')[0]);
                                zajeciaInfo.push(data[i].start.split('T')[1].slice(0,5));
                                zajeciaInfo.push(data[i].end.split('T')[1].slice(0,5));
                                zajeciaInfo.push(data[i].title);
                                zajeciaInfo.push(data[i].worker_title);
                                if(data[i].room !== null){
                                    zajeciaInfo.push(data[i].room);
                                }
                            }
                        }
                    }
                    if(zajeciaInfo.length == 0){
                        for(let i = 1; i < data.length; i++){
                            if(data[i].start.split('T')[0] >= todayDay){
                                zajeciaInfo.push(data[i].start.split('T')[0]);
                                zajeciaInfo.push(data[i].start.split('T')[1].slice(0,5));
                                zajeciaInfo.push(data[i].end.split('T')[1].slice(0,5));
                                zajeciaInfo.push(data[i].title);
                                zajeciaInfo.push(data[i].worker_title);
                                if(data[i].room !== null){
                                    zajeciaInfo.push(data[i].room);
                                }
                                break;
                            }
                        }
                    }
                    // zajeciaInfo.push(data[1].start.split('T')[0]);
                    // zajeciaInfo.push(data[1].start.split('T')[1].slice(0,5));
                    // zajeciaInfo.push(data[1].end.split('T')[1].slice(0,5));
                    // zajeciaInfo.push(data[1].title);
                    // zajeciaInfo.push(data[1].worker_title);
                    // if(data[1].room !== null){
                    //     zajeciaInfo.push(data[1].room);
                    // }

                })
                .then((zajeciaInfo) => {
                    return zajeciaInfo
                });


        }
        //żeby to działało trzeba jakoś ogarnąć returnowanie
        zajecia('Sychel Dariusz');
    </script>
<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
