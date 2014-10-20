<?php
    session_start();

    include_once "./sourse/core/User.class.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // Выход
        if(!empty($_POST['exit'])){
            unset($_SESSION['userInfo']);
        }
        // авторизация
        if(!empty($_POST['login']) && !empty($_POST['pass'])){

            $conn = mysql_connect("localhost", "root", "") or die("no connection to DB");
            mysql_select_db("cms_project") or die("no DB");

            $login = strip_tags(trim($_POST['login']));
            $pass = strip_tags(trim($_POST['pass']));
            $pass = hash('md5',$pass);

            $sql = "SELECT email, password, name, birthday, phone, info, status
                        FROM cms_users
                            WHERE email='".$login."' AND password='".$pass."'";

            $res = mysql_query($sql);
            $row = mysql_fetch_array($res, MYSQL_ASSOC);
            if($row) {
                $user = new User(
                    $row['email'],
                    $row['password'],
                    $row['status'],
                    $row['name'],
                    $row['birthday'],
                    $row['phone'],
                    $row['info']
                );
                $_SESSION['userInfo'] = serialize($user);
            }

        }
    }
    if(!empty($_SERVER["HTTP_REFERER"]))
    {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }else{
        header("Location: index.php");
    }

