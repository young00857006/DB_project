<?php // query_API.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die("Fatal Error");
  $tag = $_POST["tag"];
  $query  = "SELECT * FROM furniture NATURAL JOIN have WHERE type='".$tag."' OR  color='".$tag."' OR  fId='".$tag."' OR material='".$tag."' OR  supId='".$tag."' OR  amount='".$tag."'";
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
