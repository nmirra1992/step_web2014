<?php

    class UserManager {

        public static function addUser(User $user) {
            $conn = mysql_connect("localhost", "root", "") or die("no connection to DB");
            mysql_select_db("cms_project") or die("no DB");

            $sql = "INSERT INTO cms_users (email, password, name, birthday, phone, info, status)
                VALUES ('".$user->getEmail()."',
                    '".$user->getPassword()."',
                    '".$user->getName()."',
                    '".$user->getBirthday()."',
                    '".$user->getPhone()."',
                    '".$user->getInfo()."',
                    '".$user->getStatus()."'
            )";

            mysql_query($sql) or die("false insert data!");

            mysql_close($conn);
        }

    }