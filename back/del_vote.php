<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認刪除投票主題</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: yellow;
    margin: 0;
    padding: 0;
}

main {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    ;
}

h3 {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 20px;
}

.subject {
    font-size: 16px;
    margin-bottom: 20px;
}

.button-group {
    display: flex;
    justify-content: center;
}

button {
    padding: 10px 20px;
    margin: 0 10px;
    font-size: 14px;
    font-weight: bold;
    text-transform: uppercase;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

button:focus {
    outline: none;
}

    </style>
</head>
<body>
    <main>
        <?php  
        include_once "../db.php";
        $row = $pdo->query("SELECT * FROM `topics` WHERE id = '{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
        ?>

        <h3>你確定要刪除以下這個投票主題及相關的資料嗎?</h3>
        <div class="subject"><?=$row['subject'];?></div>

        <div class="button-group">
            <button onclick="location.href='../api/del_vote.php?id=<?=$_GET['id'];?>'">確定刪除</button>
            <button onclick="location.href='../backend.php'">取消</button>
        </div>
    </main>
</body>
</html>


