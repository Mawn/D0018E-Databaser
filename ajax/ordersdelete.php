<?php
  include("../connect.php");
  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    $orderid = $_POST['orderid'];
    $sql = "DELETE FROM orders WHERE id = '$orderid'";
    mysqli_query($conn, $sql);
  }
?>