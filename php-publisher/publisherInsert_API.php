<?php // insert_API.php

  require_once '../login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die("Fatal Error");
  
  if (
    isset($_POST['supId'])   &&
    isset($_POST["supAdder"]) && 
    isset($_POST["supPhone"])
  ) {
    
    $supId   = get_post($conn, 'supId');
    $supAdder = get_post($conn, 'supAdder');
    $supPhone = get_post($conn, 'supPhone');

    $query    = "INSERT INTO publisher VALUES" .
      "('$supId', '$supAdder', '$supPhone')";
    $result   = $conn->query($query);
    if (!$result) echo "<script type='text/javascript'>alert('Insert Faild!!'); window.history.back();</script>";
    else echo "<script type='text/javascript'>alert('Successful!!'); window.history.back();</script>";
  }

  $conn->close();

  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }

?>