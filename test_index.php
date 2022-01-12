<?php
    session_start();  //很重要，可以用的變數存在session裡
    $user=$_SESSION["sId"];
    echo "<h1>你好 ".$user."!!</h1>";
    echo "<a href='php-member/logout.php'>登出</a><br>";
    
?>

<?xml version = "1.0" encoding = "utf-8"?>
<html>

<head>
    <meta charset="utf-8">
    <type>Furniture Creator</type>
    <style type="text/css">
        body {
            font-family: Helvetica, "Microsoft YaHei", "LiHei Pro", TW-Kai;
        }

        pre {
            font-size: 1.2em;
        }
    </style>
</head>

<body>
    <h2>Add a New Furniture</h2>
    <pre>
        <b>fId      </b><input type="text" id="fId">
        <b>type     </b><input type="text" id="type">
        <b>color    </b><input type="text" id="color">
        <b>material </b><input type="text" id="material">
        <b>amount   </b><input type="text" id="amount">
        <b>supId    </b><input type="text" id="supId" value="晨皓">
        <br>
        <button id="insert">Add Furniture</button>
    </pre>
    
    <h2>Delete Furniture</h2>
    <pre>
        <b>fId      </b><input type="text" id="fId">
        <b>type     </b><input type="text" id="type">
        <b>color    </b><input type="text" id="color">
        <b>material </b><input type="text" id="material">
        <b>sId      </b><input type="text" id="sId" value=<?php echo '"'.$user.'"'?>>
        <br>
        <button id="delete">Delete Furniture</button>
    </pre>

    <!-- <h2>Update Furniture</h2>
    <pre>
        <b>fId      </b><input type="text" id="fId">
        <b>type     </b><input type="text" id="type">
        <b>color    </b><input type="text" id="color">
        <b>material </b><input type="text" id="material">
        <b>amount   </b><input type="text" id="amount">
        <br>
        <button id="update">Update Furniture</button>
    </pre> -->

    <h2>Furniture List</h2>
    <table border="1">
        <tbody id="menu">
            <tr>
                <th>fId</th>
                <th>type</th>
                <th>color</th>
                <th>material</th>
            </tr>
        </tbody>
    </table>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script type="text/javascript">
        //新增
		$("#insert").click(insertBook);
        function insertBook() {
            
            let obj = {};
            obj["fId"] = $("#fId").val();
            obj["type"] = $("#type").val();
            obj["color"] = $("#color").val();
            obj["material"] = $("#material").val();
            obj["supId"] = $("#supId").val();
            obj["amount"] = $("#amount").val();
            obj["sId"] = <?php echo '"'.$user.'";';?>

            $.post("php-furniture/insert_API.php", obj)
                .done(function (data) {
                    window.alert(data);
                });
        }

        //刪除
		$("#delete").click(deleteBook);
        function deleteBook() {
            
            let obj = {};
            obj["fId"] = $("#fId").val();
            obj["type"] = $("#type").val();
            obj["color"] = $("#color").val();
            obj["material"] = $("#material").val();
            obj["sId"] = $("#sId").val();

            $.post("php-furniture/delete_API.php", obj)
                .done(function (data) {
                    window.alert(data);
                });

        }

        //更新
        $("#update").click(updateBook);
        function updateBook() {
            let obj = {};
            obj["fId"] = $("#fId").val();
            obj["type"] = $("#type").val();
            obj["color"] = $("#color").val();
            obj["material"] = $("#material").val();
            obj["amount"] = $("#amount").val();
            obj["sId"] = <?php echo '"'.$user.'";';?>
            console.log(obj);
            $.post("php-furniture/update_API.php", obj)
                .done(function (data) {
                    window.alert(data);
                });
        }


        //查詢
        let search ={};
        search["sId"] = <?php echo '"'.$user.'";';?>

        $.getJSON("furniture/query_API.php", search, function (data) {
            for (let item in data) {
                let content =
                    "<tr>" +
                    "<td>" + data[item].fId + "</td>" +
                    "<td>" + data[item].type + "</td>" +
                    "<td>" + data[item].color + "</td>" +
                    "<td>" + data[item].material + "</td>" +
                    "</tr>";
                $("#menu").append(content);
            }
        });
    </script>
</body>

</html>