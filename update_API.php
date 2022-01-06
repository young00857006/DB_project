<?php // insert_API.php

  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die("Fatal Error");

  if (
    isset($_POST['fld'])   &&
    isset($_POST['type'])  &&
    isset($_POST['color']) &&
    isset($_POST['material']) 
  ) {
    $fld   = get_post($conn, 'fld');
    $type = get_post($conn, 'type');
    $color = get_post($conn, 'color');
    $material = get_post($conn, 'material');
  

    $query    = "UPDATE furniture SET type = '".$type."' , color = '".$color."',material = '".$material."' WHERE fld='".$fld."'";
    $result   = $conn->query($query);
    if (!$result) echo "UPDATE failed<br><br>";
    else echo "Successful!!";
  }

  $conn->close();

  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }

?>