<style>
    .vote-item {
        color: blueviolet;
        text-align: left;
        padding: 10px;
    border-radius: 20px;
}
    
    .vote-subject-title {
    background-color: #ccc;
    font-weight: bold;
    padding: 5px;
    border-radius: 20px;
    padding-left:8px;
}

    .vote-subject {
        display: flex;
        align-items: center;
        border-bottom: 1px solid #ccc;
        padding: 20px 0;
    }



    .vote-options button {
        margin-right: 10px;
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .type-info {
        background-color: red;
        color: #fff;
        padding: 10px;
    }

    .vip-login {
        background-color: orange;
        color: #000;
        padding: 10px;
    }

    .normal {
        background-color: green;
        color: #fff;
        padding: 10px;
    }
.btn{
    padding: 10px;
    background-color: lawngreen;
    border-radius: 20px;
}
  
</style>
<ul class="vote-list">
    <div class="vote-subject-title">
        <div class="vote-item">主題</div>
        <div class="vote-item"></div>
        <div class="vote-item">功能</div>
    </div>
    <?php
    $sql = "select * from `topics` where `close_time` >= '" . date("Y-m-d H:i:s") . "'";
    $rows = $pdo->query($sql)->fetchAll();
    foreach ($rows as $idx => $row) {
    ?>
        <li class="vote-subject">
            <div class="vote-item"><?= $idx + 1; ?>.</div>

            <div class="vote-item"><?= $row['subject']; ?></div>
            <div>
                <button class="type-info">
                    <?php
                    switch ($row['type']) {
                        case 1:
                            echo "單選";
                            break;
                        case 2:
                            echo "多選";
                            break;
                    }
                    ?>
                </button>
                <?php
                if ($row['login'] == 1) {
                    echo "<button class='vip-login'>";
                    echo "會員限定";
                } else {
                    echo "<button class='normal' >";
                    echo "公開";
                }
                ?>
                </button>
                <button class="btn" onclick="location.href='?do=vote&id=<?= $row['id']; ?>'">我要投票</button>
            </div>
        </li>
    <?php
    }
    ?>
</ul>