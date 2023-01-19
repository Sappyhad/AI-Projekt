<?php
use App\Model\Employee;



$title = 'Import';

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
    </style>
    <body>
        <h1>Zaimportuj plik z pracownikami</h1>
        <div class="container">
            <form action="<?php (new App\Model\Employee)->import(); ?>" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput" name="file">
                        <label class="custom-file-label" for="customFileInput">Select file</label>
                    </div>
                    <div class="input-group-append">
                        <input type="submit" name="submit" value="Upload" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
        <br>
        <br>
        <br>
        <h1>Zaimportuj plik z gabinetami</h1>
        <div class="container">
            <form action="<?php (new App\Model\Employee)->import(); ?>" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput" name="file">
                        <label class="custom-file-label" for="customFileInput">Select file</label>
                    </div>
                    <div class="input-group-append">
                        <input type="submit" name="submit" value="Upload" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </body>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
