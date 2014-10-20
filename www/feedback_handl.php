<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(!empty($_POST['userLogin']) && !empty($_POST['userEmail']) &&  !empty($_POST['userComment']) ) {
        $email = clearData($_POST['userEmail']);
        $name = clearData($_POST['userLogin']);
        $mes = clearData($_POST['userComment']);
        $to = "info@project.ua";
        $title = "FeedBack Letter";
        $str = "Вам отправлено письмо с Вашего сайта.\r\n";
        $str .= "Пользователь под именем {$name} с имайлом {$email}\r\n";
        $str .= "Текст сообщения:\r\n" . $mes;

        $headers   = array();
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-type: text/plain; charset=utf-8";
        $headers[] = "From: infoP <info@project>";
        $headers[] = "X-Mailer: PHP/".phpversion();

        mail($to, $title, $str, implode("\r\n", $headers));
    }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);