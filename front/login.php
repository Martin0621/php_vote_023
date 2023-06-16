
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-size: 20px;
}

    </style>
  </head>

    <h3 style="color:#cc0">會 員 登 入</h3><br>

<?php
if (isset($_GET['error'])) {
    echo "<span style='color:red'>";
    echo "帳號或密碼錯誤";
    echo "</span>";
}
if (isset($_GET['msg'])) {
    echo "<span style='color:orange'>";
    echo $msg[$_GET['msg']];
    echo "</span>";
}

?>
   <form action="./api/login.php" method="post">
      <div class="mb-5 w-50">
      <label for="acc"><em>帳號</em> </label>
        <input type="text" name="acc" id="acc">
       
      </div>
      <div class="mb-5">
        <label for="pw"><em>密碼</em> </label>
        <input type="password" name="pw" id="pw">
      </div>
     
      <button type="submit" class="btn btn-primary">登入</button>
    </form>
    
</html>
      
      
