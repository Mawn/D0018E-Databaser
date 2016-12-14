<?php
  include("../connect.php");
  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    $userid = $_POST['userid'];
    $productid = $_POST['orderid'];
    $sql = "DELETE FROM orders WHERE userid = '$userid' and productid = '$orderid'";
    mysqli_query($conn, $sql);
  }
?>