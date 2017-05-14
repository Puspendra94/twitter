<?php
  function search($val){
    require("config.php");
    $sql = "SELECT * FROM user WHERE name = '%".$val."%'";
    $result = $conn->query($sql);
    return $result;
  }
?>
