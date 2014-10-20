<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(!empty($_POST['userLogin']) &&  !empty($_POST['userComment']) ) {
            if(file_exists('comments.txt')){
                $f = fopen('comments.txt', "a");
            }else{
                $f = fopen('comments.txt', "w");
            }

            fwrite($f, $_POST['userLogin'] . '|' . $_POST['userComment'] . "@12@\n");

            fclose($f);
        }
    }

    header("Location: " . $_SERVER["HTTP_REFERER"]);