<?php
  include("../connect.php");
  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    $amount = $_POST['amount'];
    $productid = $_POST['productid'];
    $id = $_POST['id'];
    $sql = "UPDATE cart SET amount = '$amount' WHERE userid = '$id' AND productid = '$productid'";
    mysqli_query($conn, $sql);
  }
?>