<style>
    .container {
    text-align: center;
}

h1 {
    margin: 20px;
    color: darkred;
}

.vote-items {
    border-collapse: collapse;
    width: 500px;
    margin: auto;
    background-color: lavender;
}

.vote-items th,
.vote-items td {
    padding: 10px 25px;
    border: 1px solid #ccc;
}

.vote-items th {
  font-size: 25px;
  background-color: lavenderblush;
}

button {
    padding: 5px 10px;
    font-size: 14px;
    font-weight: bold;
    text-decoration: none;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

button:focus {
    outline: none;
}

</style>


<?php

$sql="select * from `logs` where `topic_id`='{$_GET['sub_id']}'";
$logs=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$subject=$pdo
            ->query("select `subject` from `topics` where `id`='{$_GET['sub_id']}'")
            ->fetchColumn();
?>
<style>
.vote-items{
    border-collapse: collapse;
    width:500px;
    margin:auto;
}
.vote-items div{
    padding:10px 25px;
    border:1px solid #ccc;
}

</style>
<h1><?=$subject;?></h1>
<table class="vote-items">
    <tr>
        <th>會員</th>
        <th>投票時間</th>
        <th>操作</th>
    </tr>
    <?php
    foreach($logs as $log){
        $sql_name="select `name` from `members` where `id`='{$log['mem_id']}'";
        $name=$pdo->query($sql_name)->fetchColumn();
        if($name==''){
            $name="一般訪客";
        }
    ?>
    <form action="./api/del_log.php" method="post">
        <tr>
            <td><?=$name;?></td>
            <td><?=$log['vote_time'];?></td>
            <td>
                <input type="hidden" name="topic_id" value="<?=$log['topic_id'];?>">
                <input type="hidden" name="id" value="<?=$log['id'];?>">
                <button type="submit">刪除</button>
            </td>
        </tr>
    </form>
    <?php
    }
    ?>
</table>