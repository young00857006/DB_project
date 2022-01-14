<?php // insert_API.php

  require_once '../login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die("Fatal Error");
  
  if (
    isset($_POST['fId'])   &&
    isset($_POST['type'])  &&
    isset($_POST['color']) &&
    isset($_POST['material'])&&
    isset($_POST['supId']) &&
    isset($_POST["amount"]) && 
    isset($_POST["sId"])
  ) {
    
    $fId   = get_post($conn, 'fId');
    $type = get_post($conn, 'type');
    $color = get_post($conn, 'color');
    $material = get_post($conn, 'material');
    $supId = get_post($conn, 'supId');
    $amount = get_post($conn, 'amount');
    $sId = get_post($conn, 'sId');

    $query    = "INSERT INTO furniture VALUES" .
      "('$fId','$sId', '$type', '$color', '$material', '$supId')";
    $result   = $conn->query($query);
    if (!$result) echo "INSERT failed";
    else echo "Successful!!";

    $query2   = "INSERT INTO have VALUES" .
      "('$amount', '$fId', '$sId')";
    $result2   = $conn->query($query2);
    if (!$result2) echo "INSERT failed";
    else echo "Successful!!";
  }

  $conn->close();

  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }

?>