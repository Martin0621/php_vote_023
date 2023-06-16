<style>
    .register-form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: lavender;
    border-radius: 5px;
    border-radius: 20px;
}

.form-group {
    margin-bottom: 5px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    font-size: 20px;
    color: palevioletred;
}

input[type="text"],
input[type="password"] {
    width: 90%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 15px;
}

input[type="submit"] {
    background-color: #333;
    color: #fff;
    padding: 20px;
    border-radius: 15px;

}


</style>
<?php

if(isset($_GET['error'])){
    echo "<span style='color:red'>";
    echo "帳號或密碼不可為空";
    echo "</span>";
}

?>

<form action="./api/reg.php" method="post" class="register-form">
    <div class="form-group">
        <label for="acc">帳號</label>
        <input type="text" name="acc" id="acc">
    </div>
    <div class="form-group">
        <label for="pw">密碼</label>
        <input type="password" name="pw" id="pw">
    </div>
    <div class="form-group">
        <label for="name">姓名</label>
        <input type="text" name="name" id="name">
    </div>
    <div class="form-group">
        <label for="addr">地址</label>
        <input type="text" name="addr" id="addr">
    </div>
    <div class="form-group">
        <label for="email">信箱</label>
        <input type="text" name="email" id="email">
    </div>
    <br>
    <div class="form-group">
        <input type="submit" value="註冊">
    </div>
</form>

    </body>
</form>


