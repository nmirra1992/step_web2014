<?php
    include_once 'func.php';
    session_start();

    $uri = $_SERVER["PHP_SELF"] . '?' . $_SERVER["QUERY_STRING"];
    if($uri == "/php/project/index.php?userinfo") {
        showUserInfoTest();
    }

$userLogin = 1;

if(!empty($_SESSION['userInfo']))
{
    $userLogin = 2;
    $user = unserialize($_SESSION['userInfo']);
    $login = $user->getName();
}


switch($userLogin){
    case 1:
        $formShow = '<form class="navbar-form navbar-right" action="autorizetion.php" method="POST">
                <div class="form-group">
                    <input style="width:150px;" class="form-control" name="login" type="text" placeholder="Логин" />
                </div>
                <div class="form-group">
                    <input style="width:150px;" class="form-control" name="pass" type="password" placeholder="Пароль" />
                </div>
                <button type="submit" class="btn btn-success">Войти</button>
            </form>';
        break;
    case 2:
        $formShow = "<ul class='nav navbar-nav navbar-right'><li><a>Привет, {$login}!</a></li>
        <li><form class='navbar-form' action='autorizetion.php' method='POST'>
            <button name='exit' type='submit' class='btn btn-warning' value='ex'>Выйти</button>
        </form></li></ul>";
        break;
}

$menu = array(
    'Главная' => '#',
    'О нас' => '#',
    'Приемы' => array(
        'Секреты Bootstrap' => array(
            'Секреты Bootstrap' => "#",
            'Секреты JS' => "#",
            'Секреты PHP' => "#"
        ),
        'Секреты JS' => "#",
        'Секреты PHP' => "#"
    ),
    'Контакты' => 'index.php?feedback',
    'Комментарии' => 'index.php?comments',
    'Регистрация' => 'index.php?register'
);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>CMS - new best ;)</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <style type="text/css">
        .up {
            margin-top: 50px;
        }
        .price {
            font-size: 1.8em;
            vertical-align: middle;
            display: table-cell;
            color: red;
        }
        .old-price {
            text-decoration: line-through;
        }
        .old-price + .price {
            padding-top: 0;
            padding-bottom: 0;
        }
        footer.container-fluid {
            background: #333;
            min-height: 100px;
            color: #ffffff;
        }
        .list-group-item-heading {
            margin-top: 15px;
            font-size: 1.2em;
            font-weight: bold;
        }
        .dropdown-right-menu {
            position: absolute;
            top: 0;
            left: 100%;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 160px;
            padding: 5px 0;
            margin: 2px 0 0;
            font-size: 14px;
            list-style: none;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, .15);
            border-radius: 4px;
            -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
            box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        }
        ul.dropdown-menu > li.dropdown:hover ul.dropdown-right-menu {
            display: block;
        }
    </style>
</head>
<body>
<!-- navigation bar -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Учим bootstrap</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php showMenu2($menu); ?>
            </ul>
            <?=$formShow?>
        </div>
    </div>
</div>
