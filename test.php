<!-- <?php
  // Initialize the session
  // session_start();
  
  // // Check if the user is already logged in, if yes then redirect him to welcome page
  // if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  //     header("location: test_index.php");
  //     exit;  //記得要跳出來，不然會重複轉址過多次
  // }
  
?> -->
<!DOCTYPE html>
<html>
<body>

<h1>The input REGISTER</h1>

<!-- 註冊 -->
<form action="php-member/register.php" method="POST">
  <label for="fname">sId:   </label>
  <input type="text" name="sId"><br><br>
  <label for="fname">sAdder:   </label>
  <input type="text" name="sAdder"><br><br>
  <label for="lname">sPhone:</label>
  <input type="text" name="sPhone"><br><br>
  <input type="submit" value="Submit">
</form>

<h2>The input LOGIN</h2>
<!-- 登入 -->
<form action="php-member/Login.php" method="POST">
  <label for="fname">sId:   </label>
  <input type="text" name="sId"><br><br>
  <label for="lname">sPhone:</label>
  <input type="text" name="sPhone"><br><br>
  <input type="submit" value="Submit">
</form>

<h3>The input PUBLISHER</h3>
<!-- 新增供應商 -->
<form action="php-publisher/publisherInsert_API.php" method="POST">
  <label for="fname">supId:   </label>
  <input type="text" name="supId"><br><br>
  <label for="lname">supAdder:</label>
  <input type="text" name="supAdder"><br><br>
  <label for="lname">supPhone:</label>
  <input type="text" name="supPhone"><br><br>
  <input type="submit" value="Submit">
</form>

<h3>The Delete PUBLISHER</h3>
<!-- 刪除供應商 -->
<form action="php-publisher/publisherDelete_API.php" method="POST">
  <label for="fname">supId:   </label>
  <input type="text" name="supId"><br><br>
  <input type="submit" value="Submit">
</form>

<div id = "menu"></div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        //get all publisher
        $.getJSON("php-publisher/publisherQuery_API.php", function (data) {
            for (let item in data) {
                let content = data[item].supId + "<br>";
                    // "<tr>" +
                    // "<td>" + data[item].fld + "</td>" +
                    // "<td>" + data[item].type + "</td>" +
                    // "<td>" + data[item].color + "</td>" +
                    // "<td>" + data[item].material + "</td>" +
                    // "</tr>";
                $("#menu").append(content);
            }
        });


        //get one publsiher
        $.ajax({
            url : "php-publisher/getPublisher_query.php",
            Type: "GET",
            dataType: "json",
            data: {supId : "廷洋"},
            success: function (data) {
              for (let item in data) {
                  let content = data[item].supId + "<br>";
                      // "<tr>" +
                      // "<td>" + data[item].fld + "</td>" +
                      // "<td>" + data[item].type + "</td>" +
                      // "<td>" + data[item].color + "</td>" +
                      // "<td>" + data[item].material + "</td>" +
                      // "</tr>";
                  $("#menu").append(content);
              }
            }

        });
    </script> 

</body>
</html>

