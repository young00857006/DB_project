<?php
    require_once("../login.php");
    $supId=$_POST["supId"];
    $conn = new mysqli($hn, $un, $pw, $db);
    
    if ($conn->connect_error) die("Fatal Error");

        $query = "SELECT * FROM publisher WHERE supId='".$supId."'";
        $result = $conn->query($query);
    if (!$result) die("Fatal Error");

    
    $rows = $result->num_rows;
    
    $arr = array();

    for ($j = 0 ; $j < $rows ; ++$j)
    {
        $result->data_seek($j);
        $row = $result->fetch_assoc();
        array_push($arr,$row);
    }
    
    //set encoding
    header("content-Type: application/json; charset=utf-8");

    //convert to json
    echo json_encode($arr, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT);

    $result->close();
    $conn->close();
?>