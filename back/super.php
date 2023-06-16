
<style>
*{
    border-radius: 15px;
}


.system-admin tr:nth-child(1) td {
    border: 1px solid #ccc;
    padding: 5px 150px;
    background: lightgreen;
    font-weight: 600;
    border-radius: 15px;
    }

.system-admin td {
    border: 1px solid #ccc;
    padding: 20px 10px;
    background-color: pink;
    font-size: 30px;
}

.system-admin select {
    width: 70%;
    padding:10px;
    border-radius: 15px;
    background-color: lavender;
    font-size: 30px;
}

.system-admin button {
    margin-top: 10px;
    padding: 15px 10px;
    border: none;
    border-radius: 5px;
    background-color: blue;
    color: #fff;
}

.system-admin button:hover {
    background-color: #0056b3;
}

</style>

<br>
<h1 style="color:darkred"><em>會員權限管理</em></h1><br>
<?php
$sql = "SELECT * FROM `members`";
$mems = $pdo->query($sql)->fetchAll();
?>
<table class="system-admin">
    <tr>
        <td>會員</td>
        <td>權限</td>
        <td>操作</td>
    </tr>
    <?php
    foreach($mems as $mem) {
    ?>
    <form action="./api/change_pr.php" method="post">
        <tr>
            <td><?=$mem['name'];?></td>
            <td>
                <select name="pr">
                    <option value="super" <?=($mem['pr']=='super')?'selected':'';?>>超級管理員</option>
                    <option value="admin" <?=($mem['pr']=='admin')?'selected':'';?>>管理員</option>
                    <option value="member" <?=($mem['pr']=='member')?'selected':'';?>>會員</option>
                </select>
            </td>
            <td>
                <input type="hidden" name="id" value="<?=$mem['id'];?>">
                <button type="submit">更新</button>
            </td>
        </tr>
    </form>
    <?php
    }
    ?>
    <br>
    
    
</table>

