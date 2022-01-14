<?php
    require_once("../login.php");
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Fatal Error");

    if (
        isset($_POST['fId'])   &&
        isset($_POST['sId'])
      ) 
    {
        $fId   = get_post($conn, 'fId');
        $sId = get_post($conn, 'sId');

        $query    = "DELETE FROM furniture WHERE fId='$fId' AND sId='$sId'";
        $result   = $conn->query($query);
        if (!$result) echo "DELETE failed<br><br>";
        else echo "Successful delete!!";

        $query2    = "DELETE FROM have WHERE fId='$fId' and sId='$sId'";
        $result2   = $conn->query($query2);
        if (!$result2) echo "DELETE failed<br><br>";
        else echo "Successful delete!!";
    }

    $conn->close();

    function get_post($conn, $var)
    {
      return $conn->real_escape_string($_POST[$var]);
    }
?>