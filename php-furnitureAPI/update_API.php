<?php // insert_API.php

  require_once '../login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die("Fatal Error");
  
  if (
    isset($_POST['fId'])   &&
    isset($_POST['type'])  &&
    isset($_POST['color']) &&
    isset($_POST['material'])&&
    isset($_POST['sId']) &&
    isset($_POST['supId']) &&
    isset($_POST["amount"]) 
  ) {
    $fId   = get_post($conn, 'fId');
    $type = get_post($conn, 'type');
    $color = get_post($conn, 'color');
    $material = get_post($conn, 'material');
    $amount = get_post($conn, 'amount');
    $supId = get_post($conn, 'supId');
    $sId = get_post($conn, 'sId');
    // echo "i.";
    // echo $fId;
    // .$type.$material.$sId.$amount
    $query    = "UPDATE furniture SET type = '".$type."' , color = '".$color."' , supId = '".$supId."' ,material = '".$material."' WHERE fId='".$fId."'";
    $result   = $conn->query($query);
    if (!$result) echo "UPDATE failed<br><br>";
    else echo "Successful!!";

    $query2    = "UPDATE have SET amount = '".$amount."' WHERE fId='".$fId."' AND sId='".$sId."'";
    $result2   = $conn->query($query2);
    if (!$result2) echo "UPDATE failed<br><br>";
    else echo "Successful!!";
  }

  $conn->close();

  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }

?>