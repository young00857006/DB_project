<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: test_index.php");
    exit;  //記得要跳出來，不然會重複轉址過多次
}
?>
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
</body>
</html>

