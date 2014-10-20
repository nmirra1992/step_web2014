<?php
    if($_SERVER["QUERY_STRING"] != '')
        $uri = $_SERVER["PHP_SELF"] . '?' . $_SERVER["QUERY_STRING"];
    else $uri = $_SERVER["PHP_SELF"];

    if($uri == "/index.php?comments"){
        include_once "comments.php";
    }elseif($uri == "/index.php"){
        include_once "main.php";
    }elseif($uri == "/index.php?feedback"){
        include_once "feedback.php";
    }elseif($uri == "/index.php?register"){
        include_once "register.php";
    }elseif($uri == "/index.php?userinfo"){
        include_once "userinfo.php";
    }else{
        include_once "main.php";
    }