<?php
session_start();
include_once "func.php";
//var_dump($_SESSION);
if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(!empty($_SESSION['userInfo']) ) {
        $conn = mysql_connect("localhost", "root", "") or die("no connection to DB");
        mysql_select_db("cms_project") or die("no DB");

        $user = array(
            'name' => clearData($_POST['userName']),
            'birthday' => clearData($_POST['userBDay']),
            'phone' => clearData($_POST['userPhone']),
            'info' => clearData($_POST['userInfo']),
        );

        $userS = unserialize($_SESSION['userInfo']);

        $sql = "UPDATE cms_users SET
                    name='{$user['name']}',
                    phone='{$user['phone']}',
                    birthday='{$user['birthday']}',
                    info='{$user['info']}'
                      WHERE email='{$userS->getEmail()}'";


        $flag = mysql_query($sql) or die("false insert data!");

        if($flag) {
            $userS->setName($user['name']);
            $userS->setBirthday($user['birthday']);
            $userS->setPhone($user['phone']);
            $userS->setInfo($user['info']);

            $_SESSION['userInfo'] = serialize($userS);
        }

        mysql_close($conn);
    }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);