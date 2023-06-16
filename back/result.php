<style>
    .vote-result {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 1000px;
  margin: 20px auto;
}

.vote-option-title {
  display: flex;
  background-color: lavenderblush;
  font-weight: bold;
  padding: 10px;
  border-radius: 15px;
  border: 1px solid lightsalmon;
  margin-top: 20px;
}

.vote-option {
  display: flex;
  align-items: center;
  background-color: lavender;
  padding: 5px;
  border-radius: 15px;
  border-radius: 15px;
  border: 1px solid lightsalmon;
  margin-top: 5px;
}

.vote-item {
  flex: 1;
  padding: 5px;
}

.vote-item:first-child {
  flex-basis: 10%;
}

.vote-item:nth-child(2) {
  flex-basis: 60%;
}

.vote-item:nth-child(3) {
  flex-basis: 20%;
}

.vote-item:last-child {
  flex-basis: 10%;
}

button {
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
  border-radius: 15px;
  margin-top: 5px;
}

button:hover {
  background-color:pink;
  color: #aaa;
}
.btn{
    background-color: red;
  color: #fff;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
  border-radius: 15px;
  margin-top: 5px;
}

</style>
<?php 
$id=$_GET['id'];
$options=$pdo->query("select * from `options` where `subject_id`=$id")->fetchAll(PDO::FETCH_ASSOC);
$subject=$pdo->query("select * from `topics` where `id`=$id")->fetch(PDO::FETCH_ASSOC);

?>
<br>
<h1 style="color: darkred;" ><em>投票結果</em></h1>
<h2 style="color: #0056b3;">主題 : <?=$subject['subject'];?></h2>
<ul class="vote-result">
    <li class="vote-option-title">
        <div class="vote-item">序號</div>
        <div class="vote-item">項目</div>
        <div class="vote-item">票數</div>
        <div class="vote-item">操作</div>
    </li>
    <?php 
    foreach($options as $idx => $option){
    ?>
    <li class="vote-option">
        <div class="vote-item"><?=$idx+1;?>. 
    </div>
        <div class="vote-item"><?=$option['description'];?></div>
        <div class="vote-item"><?=$option['total'];?></div>
        <div class="vote-item">
            <button>更改票數</button>
            <button class="btn" onclick="location.href='./api/del_option.php?id=<?=$option['id'];?>'">刪除</button>
        </div>
    </li>
    <?php
    }
    ?>
</ul>