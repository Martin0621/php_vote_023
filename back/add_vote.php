<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增主題</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.7.0.min.js"></script>
    <style>

    

        main {
            
            max-width: 500px;
            margin: 50 auto;
            background-color: lavenderblush;
            padding: 5px;
            border-radius: 15px;
            box-shadow: 0 0 5px rgba(0, 0, 255, 0.6 );
        }

        h1 {
            margin-top: 0;
            color: darkred;
        }

        form div {
            margin-bottom: 10px;
        }

        .time-set {
              padding-left: 20px;         
            
        }

        .time-item {
            padding-left: 10px; 
        }

        label {
            font-weight: bold;
        }

        .options {
            margin-bottom: 10px;
        }

        .options div {
            display: flex;
            align-items: center;
        }


        .description-input {
            flex: 1px;
        }

        .options span {
            display: inline-block;
            width: 20px;
            height: 20px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            line-height: 20px;
            margin-left: 0.5px;
        }

        .options span:hover {
            background-color: #0056b3;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: blue;
            color: #fff;
            border: none;
            border-radius: 15px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: pink;
            
        }
        
    </style>
</head>
<body>
<main>
    <h1><em> 新 增 主 題</em></h1><br>
    <form action="./api/add_vote.php" method="post">
        <div>
            <label for="subject">主題說明：</label>
            <input type="text" name="subject" id="subject" class="subject-input">
        </div>
        <table>
        <div class="time-set">
            <div class="time-item">
                <label for="open_time">開放時間：</label><br>
                <input type="datetime-local" name="open_time" id="open_time">
            </div>
            </table>
            <div class="time-item">
                <label for="close_time">關閉時間：</label><br>
                <input type="datetime-local" name="close_time" id="close_time">
            </div><br>
        </div>
        <div>
            <label for="type">單複選：</label>
            <input type="radio" name="type" value="1">單選&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="type" value="2">複選
        </div>
        <div>
            <label for="type">是否公開：</label>
            <input type="radio" name="login" value="0">是&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="login" value="1">否&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <hr><br>
    <div class="options">        
        <div>
            <label for="description">項目：</label>
            <input type="text" name="description[]"  class="description-input">
            <span onclick="addOption()">+</span>
            <span onclick="removeOption(this)">-</span>
        </div>
    </div>
        <div>
            <input type="submit" value="新增">
        </div>
    </form>
</main>
</body>
</html>

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