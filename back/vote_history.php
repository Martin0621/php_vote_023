<style>

h1 {
   margin: 20px;
   color: darkred;
}

.vote-record {
  max-width: 600px;
  margin: 0 auto;

}

.vote-record div {
  padding: 10px;
  border: 1px solid lightsalmon;
  margin-bottom: 10px;
  border-radius: 15px;
  background-color: lavender;
}

.vote-record a {
  text-decoration: none;
  color: #007bff;
  font-weight: bold;
}

.vote-record a:hover {
  text-decoration: underline;
}

.vote-record time {
  display: block;
  margin-top: 5px;
  color: #777;
}

</style>

<?php

$user=$pdo
        ->query("select * from `members` where `acc`='{$_SESSION['login']}'")
        ->fetch(PDO::FETCH_ASSOC);

$logs=$pdo
        ->query("select * from `logs` where `mem_id`='{$user['id']}'")
        ->fetchAll(PDO::FETCH_ASSOC);
/*         echo "<pre>";
        print_r($logs);
        echo "</pre>"; */

?>

</div>
<div class="container">
    <h1><em>投 票 紀 錄</em></h1>

    <div class="vote-record">
        <?php
        foreach($logs as $log){
            $topic=$pdo
                    ->query("select `id`, `subject` from `topics` where `id`='{$log['topic_id']}'")
                    ->fetch(PDO::FETCH_ASSOC);
            echo "<div><a href='?do=vote_detail&log_id={$log['id']}&sub_id={$topic['id']}'>";
            echo $topic['subject'];
            echo "</a>";
            echo "<time>{$log['vote_time']}</time>";
            echo "</div>";
        }
        ?>
    </div>
</div>