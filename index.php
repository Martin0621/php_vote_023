<?php include_once "db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>小毛投票所</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        * {
            /* font-size: 20px; */
            text-align: center; 
            
        }

        body {

          
            font-size: 20px;
          
        }

        header {
            padding-top: 5px;
            font-weight: bold;
     
          
        }

        header a {
            color:lightslategrey;
            text-decoration: none;
            margin-right: 10px;
            font-size: 35px;
            background-color: lightyellow;
            height: 50px;
            font-weight: bold;
            border-radius: 15px;
        }

        main {
            padding: 20px;
        }


        footer a {
            color: #fff;
            text-decoration: none;
        }

        a:hover {
        background-color: pink;
        border-radius: 10px;
        font-size: 45px;
        color: darkred;
    }

        .home {
            text-align: left;
        }
        .src{
            height: 300px;
        }
  
    </style>
</head>
<img class="src" src="http://www.yinpinjie.com/file/upload/202204/14/141130281.gif" alt="">
<body>
<header>
    <a href="index.php">首頁</a>
    <a href="index.php?do=result_list">結果</a>
    <?php
    if(!isset($_SESSION['login'])){
    ?>
        <a href="index.php?do=login">登入</a>
        <a href="index.php?do=reg">註冊</a>
    <?php
    }else{
    ?>
        <a href="./api/logout.php">登出</a>
    <?php
        switch($_SESSION['pr']){
            case "super":
                echo "<a href='backend.php?do=super'>系統管理</a>";
            break; 
            case "member":
                echo "<a href='backend.php?do=member'>會員中心</a>";
            break;
            case "admin":
                echo "<a href='backend.php?do=admin'>管理</a>";
            break;
        }
    }
    ?>
</header>
<main>

<?php

/* if(isset($_SESSION['login']) && $_SESSION['pr']){
    echo $_SESSION['login'];
    echo "-";
    echo $_SESSION['pr'];
}
 */
$do=$_GET['do']??'list';

$file="./front/".$do.".php";

if(file_exists($file)){
    include $file;
}else{
    include "./front/list.php";
}
?>

</main>
<footer></footer>

</body>
</html>