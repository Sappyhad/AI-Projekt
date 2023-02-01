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

    <div id="employeeList" class="Lista"">
        <div class="">
            <h1 >Wyszukaj pracownika</h1></div>
        <label for="employeeName">Nazwisko i Imię</label>
        <input id="name" type="text" name="employeeName">
        <br>
        <button onclick="get_name()">Prześlij</button>
    </div>

    <div class="output">
        <ul id="myList"></ul>
    </div>


    <script>
        function zajecia(nazwa){
            let today = new Date();
            let todayDay = today.toISOString().slice(0, 10);
            let todayTime = today.getHours();
            let zajeciaInfo = [];
            //`https://plan.zut.edu.pl/schedule_student.php?teacher=${nazwa}&start=${today}`
            fetch(`https://cors-anywhere.herokuapp.com/https://plan.zut.edu.pl/schedule_student.php?teacher=${nazwa}&start=${todayDay}T${todayTime}`)
                .then((response) => {
                    console.log(response);
                    //--> [object Response]
                    console.log(response.body);
                    //--> [object ReadableStream]

                    return response.json();
                })
                .then((data) => {

                    console.log(data);

                    for(let i = 1; i < data.length; i++){
                        // if(data[i].start.split('T')[0] == todayDay){
                        //     if((data[i].start.split('T')[1].slice(0,2) <= todayTime && data[i].end.split('T')[1].slice(0,2) >= todayTime) || data[i].start.split('T')[1].slice(0,2) >= todayTime){
                        //         zajeciaInfo.push(data[i].start.split('T')[0]);
                        //         zajeciaInfo.push(data[i].start.split('T')[1].slice(0,5));
                        //         zajeciaInfo.push(data[i].end.split('T')[1].slice(0,5));
                        //         zajeciaInfo.push(data[i].title);
                        //         zajeciaInfo.push(data[i].worker_title);
                        //         if(data[i].room !== null){
                        //             zajeciaInfo.push(data[i].room);
                        //         }
                        //     }
                        // }
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
                                }
                                zajeciaInfo.push("---------------------------------");
                            }

                    }


                    let list = document.getElementById("myList");

                    zajeciaInfo.forEach((item)=>{
                        let li = document.createElement("li");
                        li.innerText = item;
                        list.appendChild(li);
                    })



                    // zajeciaInfo.push(data[1].start.split('T')[0]);
                    // zajeciaInfo.push(data[1].start.split('T')[1].slice(0,5));
                    // zajeciaInfo.push(data[1].end.split('T')[1].slice(0,5));
                    // zajeciaInfo.push(data[1].title);
                    // zajeciaInfo.push(data[1].worker_title);
                    // if(data[1].room !== null){
                    //     zajeciaInfo.push(data[1].room);
                    // }

                })
                // .then((zajeciaInfo) => {
                //
                //
                //     return zajeciaInfo
                // });

        }

        function get_name(){
            let name_n_surname = document.getElementById("name").value;

            zajecia(name_n_surname);
        }

    </script>
<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
