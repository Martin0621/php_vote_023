
<style>
  

h1 {
    font-size: 40px;
    font-weight: bold;
    margin: 20px;
    text-align: center;
    color: darkred;
}

form {
    max-width: 650px;
    margin: 0 auto;
    padding: 20px;
    background-color: lavender;
    border-radius: 15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

label {
    font-size: 20px;
    font-weight: bold;
    
}

input[type="text"],
input[type="datetime-local"],
input[type="radio"],
input[type="submit"] {
    flex: auto;
    margin-top: 10px;
    padding: 10px;
    border: 1px solid pink;
    border-radius: 15px;
    width: 280px;
    
}

.options div {
    display: flex;
    align-items: center;    
}

.options label {
    margin-right: 10px;
    
   
}

.options span {
    margin-left: 10px;
    padding: 5px;
    font-size: 14px;
    color: #fff;
    background-color: #007bff;
    border-radius: 3px;
    cursor: pointer;
}

.options span:hover {
    background-color: #0056b3;
}

input[type="hidden"] {
    display: none;
    
}

input[type="submit"] {
    padding: 10px 20px;
    font-weight: bold;
    text-transform: uppercase;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 15px;
    cursor: pointer;
        
}

input[type="submit"]:hover {
    background-color: #0056b3;
    
}

input[type="submit"]:focus {
    outline: none;
   
}

</style>

<?php
$topic=$pdo->query("select * from `topics` where `id`='{$_GET['id']}'")
           ->fetch(PDO::FETCH_ASSOC);

$options=$pdo->query("select * from `options` where `subject_id`='{$_GET['id']}'")
             ->fetchAll(PDO::FETCH_ASSOC);

?>
 
    <h1><em>編 輯 主 題</em></h1>
    <form action="./api/edit_vote.php" method="post">
        <div>
            <label for="subject">主題說明：</label>
            <input type="text" 
                   name="subject" 
                   id="subject" 
                   class="subject-input" 
                   value="<?=$topic['subject'];?>">
        </div>
        <div class="time-set">
            <div class="time-item">
                <label for="open_time">開放時間：</label>
                <input type="datetime-local" name="open_time" id="open_time" value="<?=$topic['open_time'];?>">
            </div>
            <div class="time-item">
                <label for="close_time">關閉時間：</label>
                <input type="datetime-local" name="close_time" id="close_time" value="<?=$topic['close_time'];?>">
            </div>
        </div>
        <div>
            <label for="type">單複選：</label>
            <input type="radio" name="type" value="1" <?=($topic['type']==1)?'checked':'';?>>單選/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="type" value="2" <?=($topic['type']==2)?'checked':'';?>>複選&nbsp;&nbsp;
        </div>
        <div>
            <label for="type">是否公開：</label>
            <input type="radio" name="login" value="0" <?=($topic['login']==0)?'checked':'';?>>是/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="login" value="1" <?=($topic['login']==1)?'checked':'';?>>否&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <hr>
    <div class="options">
    <?php 
        foreach($options as $opt){
    ?>
        <div>
            <label for="description">項目：</label>
            <input type="text" name="description[]"  class="description-input" value="<?=$opt['description'];?>">
            <span onclick="addOption()">+</span>
            <span onclick="removeOption(this)">-</span>
            <input type="hidden" name="opt_id[]" value="<?=$opt['id'];?>" > 
        </div>

    <?php 
    }
    ?>        
    </div>
        <div>
            <input type="hidden" name="subject_id" value="<?=$topic['id'];?>">
            <input type="submit" value="送出">
        </div>
    </form>


<script>
function addOption(){
    let opt=`<div>
                <label for="description">項目：</label>
                <input type="text" name="description[]"  class="description-input">
                <span onclick="addOption()">+</span>
                <span onclick="removeOption(this)">-</span>
            </div>`
    $(".options").append(opt);    
}

function removeOption(el){
    let dom=$(el).parent()
    $(dom).remove();
}


</script>