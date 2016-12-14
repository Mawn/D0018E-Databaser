<?php
  include("../connect.php");
  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    $userid = $_POST['userid'];
    $productid = $_POST['productid'];
    $sql = "DELETE FROM cart WHERE userid = '$userid' and productid = '$productid'";
    mysqli_query($conn, $sql);
  }
?>