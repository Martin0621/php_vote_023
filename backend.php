<style>
    * {
        text-align: center;
    }


    body {

        font-size: 20px;

    }

    header {
        padding-top: 10px;
        font-weight: bold;
       

    }

    header a {
        color: lightslategrey;
        text-decoration: none;
        margin-right: 20px;
        font-size: 25px;
    
    }

    a:hover {
        background-color: pink;
        border-radius: 10px;
        font-size: 35px;
        color:yellowgreen;
    }
</style>
<?php include_once "db.php";
$do = '';
if (isset($_GET['do'])) {
    $do = $_GET['do'];
} else {
    if (isset($_SESSION['pr'])) {
        $do = $_SESSION['pr'];
    } else {
        $do = "error";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<img style="height: 300px;" class="src" src="https://cdn.pixabay.com/photo/2017/09/09/15/02/mickey-mouse-2732231_1280.png" alt="">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理後台</title>
    <script src="./js/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <style></style>
</head>

<body>
    <header>
        <a href="index.php">網站首頁</a>
        <a href="backend.php">管理首頁</a>
        <a href="./api/logout.php">登出</a>
        <?php
        switch ($_SESSION['pr']) {
            case "super":
                echo "<nav>";
                echo "    <a href='./backend.php?do=add_vote'>新增投票</a>";
                echo "    <a href='./backend.php?do=query_vote'>投票明細管理</a>";
                echo "</nav>";
                break;

            case "admin":
                echo "<nav>";
                echo "    <a href='./backend.php?do=add_vote'>新增投票</a>";
                echo "    <a href='./backend.php?do=query_vote'>投票明細管理</a>";
                echo "</nav>";
                break;

            case "member":
                echo "<nav>";
                echo "    <a href='./backend.php?do=edit_self'>修改個人資料</a>";
                echo "    <a href='./backend.php?do=vote_history'>投票紀錄查詢</a>";
                echo "</nav>";
                break;
        }

        ?>

    </header>
    <main>
        <?php

        $file = "./back/" . $do . ".php";

        if (file_exists($file)) {
            include $file;
        } else {
            include "./back/error.php";
        }

        ?>
    </main>
    <footer></footer>
</body>

</html>