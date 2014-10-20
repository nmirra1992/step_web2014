<?php

    //var_dump($_POST);
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(!empty($_POST['login']) && !empty($_POST['pass'])){
            $login = strip_tags(trim($_POST['login']));
            $pass = strip_tags(trim($_POST['pass']));

            foreach($users as $log => $pas){
                if( ($login == $log) && ($pass == $pas) ){
                    echo 'Привет, ' . $login;
                }
            }
        }
    }