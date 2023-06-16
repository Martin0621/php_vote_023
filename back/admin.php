<style>
    /* body {
        font-family: Arial, sans-serif;
        background-color:lavender;
        background-image: url('../images.png');
        background-position: center;
        background-size: 2%;


    } */


    .list-row {
        display: flex;
        align-items: center;
        background-color: lavender;
        border-radius: 15px;
        margin-top: 15px;


    }

    .list-item-title {

        flex: auto;
        font-size: 25px;
        font-weight: bold;
        padding:8px;
        margin:5px;

    }

    .list-item {
        flex: auto;
        padding: 5px;
        font-size: 17px;
    }


    .in-process {
        background-color: green;
        padding: 15px 10px;
        border-radius: 15px;
        color: white;
    }

    .finish {
        background-color: red;
        padding: 10px 10px;
        border-radius: 15px;
        color: white;
    }

    .btn {
        padding: 5px;
        background-color: blue;
        border-radius: 15px;
        color: #ccc;
        margin-top: 2px;
    }

    .btn:hover{

        background-size: 70%;
       background-color: pink;
       color: #aaa;
    }

    .btn1 {
        padding: 5px;
        background-color: orange;
        border-radius: 15px;
        color: black;
        margin:2px;
    }
    .btn1:hover{
background-color: pink;
color: #aaa;
}
</style>


<ul class="topic-list">
    <li class="list-row">
        <div class="list-item-title">主題</div>
        <div class="list-item-title">狀態</div>
        <div class="list-item-title">期間</div>
        <div class="list-item-title">票數</div>
        <div class="list-item-title">操作</div>
    </li>
    <?php
    $sql = "SELECT `topics`.*,
            sum(`options`.`total`) as '總計'
          FROM `topics`,`options` 
          WHERE `topics`.`id`=`options`.`subject_id` 
          GROUP BY `topics`.`id`;";

    $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
    ?>
        <li class="list-row">
            <div class="list-item"><?= $row['subject']; ?></div>
            <div class="list-item">
                <?php
                $now = strtotime('now');
                $open = strtotime($row['open_time']);
                $close = strtotime($row['close_time']);

                if ($now < $open) {
                    echo "<div class='await'>未開始</div>";
                } else if ($now >= $open && $now <= $close) {
                    echo "<div class='in-process'>投票中</div>";
                } else {
                    echo "<div class='finish'>己截止</div>";
                }

                ?>
            </div>
            <div class="list-item">
                <div><?= $row['open_time'] ?></div>
                至
                <div><?= $row['close_time']; ?></div>
            </div>
            <div class="list-item">
                <?= $row['總計']; ?>
            </div>
            <div class="list-item">
                <button class="btn" onclick="location.href='./backend.php?do=edit_vote&id=<?= $row['id']; ?>'">編輯</button>
                <button class="btn" onclick="location.href='./back/del_vote.php?id=<?= $row['id']; ?>'">刪除</button>
                <button class="btn" onclick="location.href='./backend.php?do=result&id=<?= $row['id']; ?>'">投票結果</button>
                <button class="btn1" onclick="location.href='./back/open.php?id=<?= $row['id']; ?>'">立即上線</button>
                <button class="btn1" onclick="location.href='./back/close.php?id=<?= $row['id']; ?>'">立即結束</button>

            </div>
        </li>
    <?php
    }
    ?>
</ul>