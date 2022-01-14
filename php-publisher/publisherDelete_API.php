<?php
    require_once("../login.php");
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Fatal Error");

    if ( isset($_POST['supId']) ) 
    {
        $supId   = get_post($conn, 'supId');

        $query    = "DELETE FROM publisher WHERE supId='$supId'";
        $result   = $conn->query($query);
        if (!$result) echo "DELETE failed<br><br>";
        else echo "<script type='text/javascript'>alert('Successful Delete!!'); window.history.back()</script>";
    }

    $conn->close();

    function get_post($conn, $var)
    {
      return $conn->real_escape_string($_POST[$var]);
    }
?>