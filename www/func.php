<?php

    /**
     * @param array $menu
     */
    function showMenu(array $menu){

        foreach($menu as $title => $link){
            if(is_array($link)){
                echo '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $title . '<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                ';
                foreach($link as $title2 => $link2){
                    echo '<li><a href="'. $link2 . '">' . $title2 . '</a></li>';
                }
                echo '
                    </ul>
                </li>';
            }else{
                echo '<li><a href="' . $link . '">'.$title.'</a></li>';
            }
        }
    }

    /**
     * @param array $menu
     * @param int $flag
     * @param string $titleDrop
     */
    function showMenu2(array $menu, $flag = 0, $titleDrop = ''){

        $styleDrop = '<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">%s<span class="caret"></span></a>
                        <ul class="dropdown-menu">';
        $styleDropSide = '<li class="dropdown">
                        <a href="#" class="dropdown-toggle">%s<span class="caret"></span></a>
                        <ul class="dropdown-right-menu">';

        switch($flag){
            case 0:
                foreach($menu as $title => $link){
                    if(is_array($link)){
                        showMenu2($link, 1, $title);
                    }else{
                        echo '<li><a href="' . $link . '">'.$title.'</a></li>';
                    }
                }
                break;
            case 1:
                printf($styleDrop, $titleDrop);
                foreach($menu as $title => $link){
                    if(is_array($link)){
                        showMenu2($link, 2, $title);
                    }else{
                        echo '<li><a href="' . $link . '">'.$title.'</a></li>';
                    }
                }
                echo '</ul></li>';
                break;
            case 2:
                printf($styleDropSide, $titleDrop);

                foreach($menu as $title => $link){
                    if(is_array($link)){
                        showMenu2($link, 2, $title);
                    }else{
                        echo '<li><a href="' . $link . '">'.$title.'</a></li>';
                    }
                }
                echo '</ul></li>';
                break;
            default: return;
        }
    }

    /**
     * setAnalytics
     */
    function setAnalytics(){
        $page = $_SERVER['REQUEST_URI'];
        $now = date("d-m-Y H:i");
        if(!empty($_COOKIE['SetAnalytics']))
        {
            $pageAnalytics = unserialize($_COOKIE['SetAnalytics']);
            $pageAnalytics[][$page] = $now;
        }else{
            $pageAnalytics[][$page] = $now;
        }

        setcookie('SetAnalytics',serialize($pageAnalytics));

        var_dump($pageAnalytics);
    }


    function showComments() {
        if(file_exists('comments.txt')){
            $f = fopen('comments.txt', "r");
            $str = fread($f, filesize('comments.txt'));
            $comments = explode("@12@", trim($str));

            for($i = (count($comments))-2; $i>=0; --$i){
                $com = explode("|", $comments[$i]);
                echo "<blockquote>
                    <p>{$com[0]}</p>
                    <footer>{$com[1]}</footer>
                </blockquote>";
            }
        }
    }

    /**
     * @param $str
     * @return string
     */
    function clearData($str){
        return trim(strip_tags($str));
    }



    function showUserInfoTest() {
        if(empty($_SESSION['userInfo'])) {
            header("Location: index.php?register");
        }
    }

function __autoload($className) {
    if(file_exists("./sourse/core/".$className.".class.php"))
    {
        include_once "./sourse/core/".$className.".class.php";
    }else {
        die("MEGA FATAL!!!!!");
    }
}

?>