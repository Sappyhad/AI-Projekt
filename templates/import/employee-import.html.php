<?php
use App\Model\Employee;
use App\Service\Config;


$title = 'Import';
//function import(){
//    $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));


    if(isset($_FILES["plik"])){
        $target_file = $_FILES["plik"]["tmp_name"];
        // foreach($target_file as $line){
        //     echo $line;
        // }
        $my_file = fopen($target_file, "r") or die("Unable to open file!");
        if($my_file){
            Employee::purge();
            while(($line=fgetcsv($my_file)) !== false){
                $array = [
                    "name" => $line[0],
                    "lastname" => $line[1],
                    "position" => $line[2],
                    "schedule" => $line[3]
                ];
                $newPracownik = Employee::fromArray($array);
                $newPracownik->save();
            }
            fclose($my_file);
            header("Refresh:0");
        }
    }

//}

ob_start(); ?>
    <style>
        .custom-file-input.selected:lang(en)::after {
            content: "" !important;
        }

        .custom-file {
            overflow: hidden;
        }

        .custom-file-input {
            white-space: nowrap;
        }

        .box
        {
            max-width:600px;
            width:100%;
            margin: 0 auto;;
        }
    </style>
    <body>
        <h1>Zaimportuj plik z pracownikami</h1>
        <div class = "import">
            <p id="importP">Import pracowników z pliku CSV</p>
            <form method="post" enctype="multipart/form-data">
                <label for="file-upload" id="label-for-file-upload">
                    Wybierz plik
                    <input name="plik" type="file" value="Wybierz plik" id="file-upload"></input>
                </label>
                <input type="submit" value="Importuj"></input>
            </form>
        </div>


<!--        <div class="container">-->
<!--            <form id="upload_csv" method="post" enctype="multipart/form-data">-->
<!--                <div class="col-md-3">-->
<!--                    <br />-->
<!--                    <label>Select CSV File</label>-->
<!--                </div>-->
<!--                <div class="col-md-4">-->
<!--                    <input type="file" name="csv_file" id="csv_file" accept=".csv" style="margin-top:15px;" />-->
<!--                </div>-->
<!--                <div class="col-md-5">-->
<!--                    <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-info" />-->
<!--                </div>-->
<!--                <div style="clear:both"></div>-->
<!--            </form>-->
<!--        </div>-->
        <br>
        <br>
        <br>
<!--        <h1>Zaimportuj plik z gabinetami</h1>-->
<!--        <div class="container">-->
<!--            <form action="--><?php //(new App\Model\Employee)->import(); ?><!--" method="post" enctype="multipart/form-data">-->
<!--                <div class="input-group">-->
<!--                    <div class="custom-file">-->
<!--                        <input type="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput" name="file">-->
<!--                        <label class="custom-file-label" for="customFileInput">Select file</label>-->
<!--                    </div>-->
<!--                    <div class="input-group-append">-->
<!--                        <input type="submit" name="submit" value="Upload" class="btn btn-primary">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
    </body>

    <script>
        let fileName = document.getElementById("importP")
        document.getElementById("file-upload").addEventListener("change", ()=>{
            let inputFile = document.getElementById("file-upload").files[0];
            console.log(inputFile.name);
            fileName.innerText = "Import pracowników z pliku CSV: " + inputFile.name;
        })
    </script>


<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
