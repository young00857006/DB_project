<?php
    session_start();  //很重要，可以用的變數存在session裡
    $user=$_SESSION["sPhone"];
    echo "<h1>你好 ".$user."!!</h1>";
    echo "<a href='php-member/logout.php'>登出</a>";
    echo $_SESSION["sPhone"];
?>