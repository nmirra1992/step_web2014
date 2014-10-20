<?php
session_start();
include_once "func.php";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(!empty($_SESSION['login']) ) {
        $conn = mysql_connect("localhost", "root", "") or die("no connection to DB");
        mysql_select_db("cms_project") or die("no DB");

        $user = array(
            'name' => clearData($_POST['userName']),
            'birthday' => clearData($_POST['userBDay']),
            'phone' => clearData($_POST['userPhone']),
            'info' => clearData($_POST['userInfo']),
        );

        $sql = "UPDATE cms_users SET
                    name='{$user['name']}',
                    phone='{$user['phone']}',
                    birthday='{$user['birthday']}',
                    info='{$user['info']}'
                      WHERE email='{$_SESSION['login']}'";


        $flag = mysql_query($sql) or die("false insert data!");

        if($flag) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['info'] = $user['info'];
            $_SESSION['birthday'] = $user['birthday'];
            $_SESSION['phone'] = $user['phone'];
        }

        mysql_close($conn);

    }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);