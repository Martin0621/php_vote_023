
<style>
        h1{
        color: darkred;
        margin-top: 20px;
        }
.container {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-left: 350px;
    margin-top: 20px;
}

.item {
    margin-bottom: 10px;
    font-size: 30px;
}

.link {
    display: inline-block;
    padding: 10px 20px;
    font-size: 20px;
    font-weight: bold;
    text-decoration: none;
    color: #fff;
    background-color: lightsalmon;
    border-radius: 15px;
    transition: background-color 0.3s ease;
}

.link:hover {
    background-color:lavenderblush;
    color:#aaa;
}

.link:focus {
    outline: none;
}

</style>
<h1><em>投票明細管理</em></h1>
<div class="container">
    <?php
    $subjects = $pdo->query("SELECT * FROM `topics`");
    foreach ($subjects as $sub) {
        echo "<div class='item'>";
        echo    "<a class='link' href='?do=vote_items&sub_id={$sub['id']}'>";
        echo        $sub['subject'];
        echo    "</a>";
        echo "</div>";
    }
    ?>
</div>
