<?php

include_once "func.php";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(!empty($_POST['userEmail']) && !empty($_POST['userPass']) &&  !empty($_POST['userPassConfirm']) ) {
        if($_POST['userPass'] == $_POST['userPassConfirm']) {

            $user = new User(clearData(
                $_POST['userEmail']),
                hash('md5', clearData($_POST['userPass'])),
                'u'
            );
            if(!empty($_POST['userName'])) {
                $user->setName(clearData($_POST['userName']));
            }
            if(!empty($_POST['userBDay'])) {
                $user->setBirthday(clearData($_POST['userBDay']));
            }
            if(!empty($_POST['userPhone'])) {
                $user->setPhone(clearData($_POST['userPhone']));
            }
            if(!empty($_POST['userInfo'])) {
                $user->setInfo(clearData($_POST['userInfo']));
            }

            UserManager::addUser($user);

        }
    }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);